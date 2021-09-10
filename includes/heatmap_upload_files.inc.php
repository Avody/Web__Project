<?php
session_start();
require_once('db.inc.php');
require_once('functions.inc.php');





$id = $_SESSION['userid'];
$uname = $_SESSION['useruid'];


if(isset($_POST['submit'])) {


	/*** Isp track ***/

	//$response = file_get_contents('https://api.ipdata.co/?api-key=e0565ee9be214f97f5e12d53de0b908676676b9d8e275f8a71b23f92');

	
	//$response = curl_get_contents('http://api.ipapi.com?access_key=13ab572acc8be2c3a96c26c846f8b19b');

	$response = curl_get_contents('https://api.ipdata.co/?api-key=efc602f8507785408c4ff17cf5380c0eaa106ffc99113a79fccfca91');
	
	$x = json_decode($response,true);

	$isp = $x['asn']['name'];
	$home_ip = $x['ip'];
	$response2 = file_get_contents('http://api.ipstack.com/'.$home_ip.'?access_key=e02c71c25691f86c19ac24ccaee78e3b');

	
	$x2 = json_decode($response2,true);
	
	$myip = $x2['ip'];
	$mylat = $x2['latitude'];
	$mylng = $x2['longitude'];
	
	

	$query_to_database = "UPDATE users
	SET ISP = \"".$isp."\",myip = \"".$myip."\" , lat = \"".$mylat." \", lng = \"".$mylng ."\" WHERE usersId = $id";
	

	mysqli_query($conn,$query_to_database);
	
	
	

	/*** Upload the data ***/
	$file = $_FILES['file'];
	$fileTmpName = $file['tmp_name'];
	$fileName = $file['name'];

	if(empty($fileTmpName)){
		header("location:../heatmap.php?error=noSelectedFile");
		exit();
	}

		/****clean cookies from files***/

	$file_to_clean = file_get_contents($fileTmpName);
	$file_to_clean = json_decode($file_to_clean, true);

	$entries_to_clean = count($file_to_clean['log']['entries']);
	
	
	for($j=0; $j<$entries_to_clean; $j++){


		$num_cook = count($file_to_clean['log']['entries'][$j]['request']['cookies']);
		for($i=0; $i<= $num_cook; $i++){
			$file_to_clean['log']['entries'][$j]['request']['cookies'][$i]['value'] = "ERASED FROM IP FINDER";
		
		}
	}

	for($j=0; $j<$entries_to_clean; $j++){
		for($p=0; $p< count($file_to_clean['log']['entries'][$j]['response']['headers']); $p++){
	
			if($file_to_clean['log']['entries'][$j]['response']['headers'][$p]['name']=='set-cookie'){
				$file_to_clean['log']['entries'][$j]['response']['headers'][$p]['value'] = "ERASED FROM IP FINDER";
				
			} 
			if($file_to_clean['log']['entries'][$j]['response']['headers'][$p]['name']=='cookie'){
				$file_to_clean['log']['entries'][$j]['response']['headers'][$p]['value'] = "ERASED FROM IP FINDER";
			}
		}
	}
	for($j=0; $j<$entries_to_clean; $j++){
		for($p=0; $p< count($file_to_clean['log']['entries'][$j]['request']['headers']); $p++){
	
			if($file_to_clean['log']['entries'][$j]['request']['headers'][$p]['name']=='set-cookie'){
				$file_to_clean['log']['entries'][$j]['request']['headers'][$p]['value'] = "ERASED FROM IP FINDER";
				
			} 
			if($file_to_clean['log']['entries'][$j]['request']['headers'][$p]['name']=='cookie'){
				$file_to_clean['log']['entries'][$j]['request']['headers'][$p]['value'] = "ERASED FROM IP FINDER";
			}
		}
	}



	


	file_put_contents($fileTmpName, json_encode($file_to_clean));

	
	
	
		/*****End of cleaning*****/
	
	
	
	$target_dir = "../har_files/".$uname."/";

	$destination = $target_dir.$fileName;

	

	$type = explode('.', $fileName );
	$typeImported = end($type);



	if( $typeImported !== "har"){
		header("location:../heatmap.php?error=wrongFileType");
		exit();
	}

	if (file_exists($destination)) {
		header("location:../heatmap.php?error=fileExists");
		exit();
	}


	


	move_uploaded_file($fileTmpName, $destination);
	


	/**** Read the uploaded json file ****/
	
	$jsondata = file_get_contents($destination);
	$json = json_decode($jsondata, true);
	$entries = count($json['log']['entries']);

	function month_to_number($string){
		$month="";
		if($string == 'Jan'){
			$month = '01';
		}else if($string == 'Feb'){
			$month = '02';	
		}else if($string == 'Mar'){
			$month = '03';	
		}else if($string == 'Apr'){
			$month = '04';	
		}else if($string == 'May'){
			$month = '05';	
		}else if($string == 'Jun'){
			$month = '06';	
		}else if($string == 'Jul'){
			$month = '07';	
		}else if($string == 'Aug'){
			$month = '08';	
		}else if($string == 'Sep'){
			$month = '09';	
		}else if($string == 'Oct'){
			$month = '10';	
		}else if($string == 'Nov'){
			$month = '11';	
		}else if($string == 'Dec'){
			$month = '12';	
		}
		return $month;
		
	}

	$last_upload = date('Y-m-d');
	$sql_date = "UPDATE users SET  last_upload = \"".$last_upload."\" WHERE usersId = $id";
	mysqli_query($conn,$sql_date);
	
	
	for($i = 0; $i<$entries; $i++){

		
		$method =$json['log']['entries'][$i]['request']['method'];
		$status =$json['log']['entries'][$i]['response']['status'];




		/*** ipAdrress ***/
		if (!isset($json['log']['entries'][$i]['serverIPAddress'])) {
			
			continue;
		}else{
			$ipAddress=$json['log']['entries'][$i]['serverIPAddress'];

		}
		
		/*** Content type ***/
		
		$content_type_before = $json['log']['entries'][$i]['response']['headers'];
		

		for($p=0; $p< count($content_type_before); $p++){

			if($content_type_before[$p]['name']=='content-type'){
				$content_type_after = $content_type_before[$p]['value'];
				break;
			}else if($content_type_before[$p]['name']=='Content-Type'){
				$content_type_after = $content_type_before[$p]['value'];
				break;
			}else{
				$content_type_after="-";
			}
		};


		$load_time = $json['log']['entries'][$i]['time'];
		$startedDateTime = $json['log']['entries'][$i]['startedDateTime'];
		$day_string = $json['log']['entries'][$i]['response']['headers'];

		$day = "";
		for($g=0; $g< count($day_string); $g++){

			if($day_string[$g]['name']=='Date' ) {
				$day = $day_string[$g]['value'];

			}else if ($day_string[$g]['name']=='date'){
				$day = $day_string[$g]['value'];
			}
		}
		
		
		$day = substr($day, 0,3);
		
		
		
		
		
		/*** last modified, expires ***/

		
		$last_modified_before = $json['log']['entries'][$i]['response']['headers'];
		$expires_before = $json['log']['entries'][$i]['response']['headers'];

		$last_modified_after = NULL;
		$expires_after = NULL;
		

		for($h=0; $h< count($last_modified_before); $h++){
			if($last_modified_before[$h]['name']=='last-modified'){
				$last_modified_after = $last_modified_before[$h]['value'];
				break;
			}else if($last_modified_before[$h]['name']=='Last-Modified'){
				$last_modified_after = $last_modified_before[$h]['value'];
				break;
			}
		};

		
		for($l=0; $l< count($expires_before); $l++){
			if($expires_before[$l]['name']==='expires'){
				$expires_after = $expires_before[$l]['value'];
				break;
			}else if($expires_before[$l]['name']==='Expires'){
				$expires_after = $expires_before[$l]['value'];
				break;
			}
		};
		
	

		if($last_modified_after !== NULL){
			$last_modified_day = substr($last_modified_after,5,2);
			$last_modified_string_month = substr($last_modified_after,8,3);
			$last_modified_year = substr($last_modified_after,12,4);
			$last_modified_hour = substr($last_modified_after,17,8);
			$last_modified_month = month_to_number($last_modified_string_month);
			$last_modified = "$last_modified_year-$last_modified_month-$last_modified_day $last_modified_hour";
		}else{
			$last_modified=0;
		}
		if($expires_after !== NULL){
			$expires_day = substr($expires_after,5,2);
			$expires_string_month = substr($expires_after,8,3);
			$expires_year = substr($expires_after,12,4);
			$expires_hour = substr($expires_after,17,8);
			$expires_month = month_to_number($expires_string_month);
			$expires = "$expires_year-$expires_month-$expires_day $expires_hour";

		}else{
			$expires=0;
		};

		
		/****** Cache directives ******/


	$cache_directive_before = $json['log']['entries'][$i]['response'];

	$public = 0;
	$private = 0;
	$no_cache = 0;
	$no_store = 0;

	
	foreach($cache_directive_before['headers'] as $key){
		if($key['name'] == 'cache-control'){
			$cache_directive = $key['value'];
			if(strpos($cache_directive, "public") !== false){
				
				$public+=1;
			}
			if(strpos($cache_directive, "private") !== false){
				
				$private+=1;
			}
			if(strpos($cache_directive, "no-cache") !== false){
				
				$no_cache+=1;
			}
			if(strpos($cache_directive, "no-store") !== false){
				
				$no_store+=1;
			}
			
		}


	}
	

	$sql_cache_directives = "INSERT INTO cache_directives(usersId,public,private,no_cache,no_store,content_type) values (\"".$id."\",\"".$public."\",\"".$private."\",\"".$no_cache."\",\"".$no_store."\",\"".$content_type_after."\")";

	mysqli_query($conn,$sql_cache_directives);
		

		
		
		/********** Find the coordinates of the ipAddress ***********/
		
		$regex = '/^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$/';
		
		
		
		if( preg_match($regex, $ipAddress) ){
			$coordinates = curl_get_contents("https://api.ipdata.co/".$ipAddress."?api-key=efc602f8507785408c4ff17cf5380c0eaa106ffc99113a79fccfca91");
			$coordinates = json_decode($coordinates,true);
			$lat = $coordinates['latitude'];
			$lng = $coordinates['longitude'];
			
			
		}else{
			$ipAddress = substr($ipAddress, 1, -1);
			$coordinates = curl_get_contents("https://api.ipdata.co/".$ipAddress."?api-key=efc602f8507785408c4ff17cf5380c0eaa106ffc99113a79fccfca91");
			$coordinates = json_decode($coordinates,true);
			$lat = $coordinates['latitude'];
			$lng = $coordinates['longitude'];
			
		}
		
		

		/*** Insert data in database ***/

		
		
		$sql = "INSERT INTO uploaded_files(usersId,ipAddress,method,status,lat,lng,content_type,load_time,startedDateTime,day,last_modified,expires) VALUES ( $id,\"".$ipAddress."\",\"".$method."\",\"".$status."\",\"".$lat."\",\"".$lng."\",\"".$content_type_after."\",\"".$load_time."\",\"".$startedDateTime."\",\"".$day."\",\"".$last_modified."\",\"".$expires."\");";
		
		
		
		mysqli_query($conn,$sql);
		
	}
	header('location:../heatmap.php');
	

	
}else{
	echo"something bad is happenning bro";
}
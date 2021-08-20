<?php
session_start();
require_once('db.inc.php');
require_once('functions.inc.php');





$id = $_SESSION['userid'];



if(isset($_POST['submit'])) {
	/*** Isp track ***/

	$response = file_get_contents('https://api.ipdata.co/?api-key=e0565ee9be214f97f5e12d53de0b908676676b9d8e275f8a71b23f92');

  	$x = json_decode($response,true);
  	$isp = $x['asn']['name'];

	$query_to_database = "UPDATE users
						  SET ISP = \"".$isp."\"
						  WHERE usersId = $id";


	mysqli_query($conn,$query_to_database);
	
		
		

/*** Upload the data ***/
	$file = $_FILES['file'];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	
	$target_dir = "../har_files/";

	$destination = $target_dir . $fileName;

	$check = 1 ;

	$type = explode('.', $fileName );
	$typeImported = end($type);

	if(empty($fileTmpName)){
		header("location:../heatmap.php?error=noSelectedFile");
		exit();
	}

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
	
	$entries = sizeof($json['log']['entries']);

	for($i = 0; $i<$entries; $i++){


		$method =$json['log']['entries'][$i]['request']['method'];
		$status =$json['log']['entries'][$i]['response']['status'];
		$ipAddress=$json['log']['entries'][$i]['serverIPAddress'];

		/********** Find the coordinates of the ipAddress ***********/
		

		$coordinates = file_get_contents("https://api.ipdata.co/".$ipAddress."?api-key=e0565ee9be214f97f5e12d53de0b908676676b9d8e275f8a71b23f92");
		$coordinates = json_decode($coordinates,true);
		$lat = $coordinates['latitude'];
		$lng = $coordinates['longitude'];
		

		
		
		$sql = "INSERT INTO uploaded_files(usersId,ipAddress,method,status,lat,lng) VALUES ( $id,\"".$ipAddress."\",\"".$method."\",\"".$status."\",\"".$lat."\",\"".$lng."\");";
		
		
		
		if(mysqli_query($conn,$sql)){
			header("location:../heatmap.php?error=none");
		}else{
			echo("Something wrong happened <br>");
			
		}
		
		
		
		}
		$last_upload = date('Y-m-d');
		$sql_date = "UPDATE users SET  last_upload = \"".$last_upload."\" WHERE usersId = $id";
		mysqli_query($conn,$sql_date);

		



	
}else{
	echo"something bad is happenning bro";
}
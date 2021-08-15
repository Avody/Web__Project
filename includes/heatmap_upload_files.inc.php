<?php
session_start();
require_once('db.inc.php');
require_once('functions.inc.php');





$id = $_SESSION['userid'];



if(isset($_POST['submit'])) {
	

/*** Upload the data ***/
	$file = $_FILES['file'];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	print_r($file);
	$target_dir = "../har_files/";

	$destination = $target_dir . $fileName;

	$check = 1 ;

	$type = explode('.', $fileName );
	$typeImported = end($type);

	if( $typeImported !== "har"){
		header("location:../heatmap.php?error=wrongFileType");
		$check = 0;
	}

	if (file_exists($destination)) {
  		header("location:../heatmap.php?error=fileExists");
  		$check = 0;
	}


	if($check !== 0 ){


	move_uploaded_file($fileTmpName, $destination);
	


	/**** Read the uploaded json file ****/
	
	$jsondata = file_get_contents($destination);
	$json = json_decode($jsondata, true);
	
	$entries = sizeof($json['log']['entries']);

	for($i = 0; $i<$entries; $i++){


		$method =$json['log']['entries'][$i]['request']['method'];
		$status =$json['log']['entries'][$i]['response']['status'];
		$ipAddress=$json['log']['entries'][$i]['serverIPAddress'];
		
		
		
		$sql = "INSERT INTO uploaded_files(usersId,ipAddress,method,status) VALUES ( $id,\"".$ipAddress."\",\"".$method."\",\"".$status."\")";
		
		if(mysqli_query($conn,$sql)){
			header("location:../heatmap.php?error=none");
		}else{
			echo("Something wrong happened <br>");
			
		}
		
	
		
		}
	}else{
		echo("<br> Try again!");
	}
}else{
	echo"something bad is happenning bro";
}
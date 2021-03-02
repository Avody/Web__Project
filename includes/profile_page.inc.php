<?php 
	
	session_start();


	if( !isset($_SESSION['useruid'])){
		header("location: ../home.php");
		exit();	
	}else{
		header("location:../profile_page.php");
		exit();
		
	}


 ?>
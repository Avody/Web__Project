<?php 
	
	session_start();
	if(!isset($_SESSION['userid'])){
		header('location:../sign_up.php?error=YOU');
		exit();
	}
	require_once('db.inc.php');
	$id = $_SESSION['userid'];

	if(isset($_POST['delete'])){
		$sql = "DELETE from uploaded_files WHERE usersid = $id";
		$sql2 = "DELETE from cache_directives WHERE usersid = $id";

		mysqli_query($conn,$sql);
		mysqli_query($conn,$sql2);

		header('location:../profile_page.php?error=none');
	}





 ?>
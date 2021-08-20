<?php 
	
	session_start();

	require_once('db.inc.php');
	$id = $_SESSION['userid'];

	if(isset($_POST['delete'])){
		$sql = "DELETE from uploaded_files WHERE usersid = $id";
		mysqli_query($conn,$sql);
		header('location:../profile_page.php?error=none');
	}


 ?>
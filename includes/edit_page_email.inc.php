<?php 
	session_start();
	if(isset($_POST['submit'])){


	$pwd = $_POST['password'];
	$email = $_POST['email'];
	$id = $_SESSION['userid'];

	require_once('db.inc.php');
	require_once('functions.inc.php');

	
	
	if(invalidEmail($email) !==false){
		header("location:../edit_page.php?error=notAcceptedEmail");
		exit();
	}
	

	

	if (wrong_pwd_check($conn,$pwd,$id) === false){
		header("location:../edit_page.php?error=wrongPassword");
		exit();
	}


	update_email($conn,$email,$id);
	

	header("location:../edit_page.php?error=none ");

	
}
	else{
	header("location: ../sign_in.php");
	exit();
}

?>
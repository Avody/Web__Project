<?php 

if(isset($_POST['submit'])){


	$uname = $_POST['Username'];
	$pwd = $_POST['password'];

	require_once('db.inc.php');
	require_once('functions.inc.php');

	if (emptyInputSignin($uname,$pwd) !== false){
		header("location: ../sign_in.php?error=emptyinput");
		exit();
	}

	if (signinUser($conn,$uname,$pwd) !== false){
		header("location: ../sign_in.php?error=accountNotExists");
		exit();
	}


}

else{
	header("location: ../sign_in.php");
	exit();
}
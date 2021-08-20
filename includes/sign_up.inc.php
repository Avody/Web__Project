<?php


if (isset($_POST["submit"])) {

	$uname = $_POST["uname"];
	$fname = $_POST["fname"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];

	require_once 'db.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputSignup($uname,$fname,$email,$pwd) !== false){
		header("location:../sign_up.php?error=emptyinput");

		exit();
	}

	if( invalidUname($uname) !== false){
		header("location:../sign_up.php?error=invalidUname");
		exit();
	}

	if(invalidEmail($email) !== false){
		header("location:../sign_up.php?error=invalidEmail");
		exit();
	}

	if(invalidPwd($pwd) !== false){
		header("location:../sign_up.php?error=invalidPwd");
		exit();
	}
	if(unameExists($conn, $uname, $email) !== false){
		header("location:../sign_up.php?error=usernametaken");
		exit();
	}

	createUser($conn,$fname,$uname,$email,$pwd);
	


}

else{
	header("location:../sign_in.php?error=sign_up");

}
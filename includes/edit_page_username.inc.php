<?php 
	session_start();
	if(isset($_POST['submit'])){

	$uname = $_POST['Username'];
	$pwd = $_POST['password'];
	$id = $_SESSION['userid'];
	$username = $_SESSION['useruid'];
	
	

	require_once('db.inc.php');
	require_once('functions.inc.php');

	if($username == 'Admin'){
		header("location: ../edit_page.php?error=YOU_ARE_THE_ADMIN");
		exit();
	}
	
	if (emptyInputSignin($uname,$pwd) !== false){
		header("location: ../edit_page.php?error=emptyinput");
		exit();
	}


	if( invalidUname($uname) !== false){
		header("location:../edit_page.php?error=invalidUname");
		exit();
	}

	if(usernameExistsEdit($conn, $uname) !== false){
		header("location:../edit_page.php?error=usernametaken");
		exit();
	}
	

	if (wrong_pwd_check($conn,$pwd,$id) === false){
		header("location:../edit_page.php?error=wrongPassword");
		exit();
	}


	update_username($conn,$uname,$id);

	rename("../har_files/$username", "../har_files/$uname");
	

	header("location:../edit_page.php?error=none ");

	
}
	else{
	header("location: ../sign_in.php");
	exit();
}

?>
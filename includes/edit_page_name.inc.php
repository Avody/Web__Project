<?php 
	session_start();
	if(isset($_POST['submit'])){

	$surname = $_POST['Surname'];
	$name = $_POST['name'];
	$pwd = $_POST['password'];
	$id = $_SESSION['userid'];

	require_once('db.inc.php');
	require_once('functions.inc.php');

	
	
	if (emptyInputNameSurname($surname,$name,$pwd) !== false){
		header("location: ../edit_page.php?error=emptyinput");
		exit();
	}

	

	if (wrong_pwd_check($conn,$pwd,$id) === false){
		header("location:../edit_page.php?error=wrongPassword");
		exit();
	}


	update_name($conn,$surname,$name,$id);
	

	header("location:../edit_page.php?error=none ");

	
}
	else{
	header("location: ../sign_in.php");
	exit();
}

?>
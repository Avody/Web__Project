<?php 
	session_start();
	if(isset($_POST['submit'])){

	$new_pwd = $_POST['new_password'];
	$pwd = $_POST['old_password'];
	$id = $_SESSION['userid'];

	require_once('db.inc.php');
	require_once('functions.inc.php');

	
	
	
if (invalidPwd($new_pwd) !== false ){
	header("location:../edit_page.php?error=invalidPassword");
		exit();
}
	

	if (wrong_pwd_check($conn,$pwd,$id) === false){
		header("location:../edit_page.php?error=wrongPassword");
		exit();
	}


	update_password($conn,$new_pwd,$id);
	

	header("location:../edit_page.php?passwordChanged ");

	
}
	else{
	header("location: ../sign_in.php");
	exit();
}

?>
<?php 

session_start();

if(!isset($_SESSION['userid'])){
	header('location:../sign_up.php?error=YOU');
	exit();
}

require_once('db.inc.php');

$id = $_SESSION['userid'];
$uname = $_SESSION['useruid'];

$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];




$target_dir = "../img/profile_img/$uname/";

$destination = $target_dir.$fileName;

$type = explode('.', $fileName );
$typeImported = end($type);

$allowed = array("jpg","jpeg","png");



if( !in_array($typeImported, $allowed)){
	header("location:../profile_page.php?error=wrongImgType");
	exit();
}

move_uploaded_file($fileTmpName,$destination);


$sql = "UPDATE users SET profile_img = \"$fileName\" where usersId = $id";

mysqli_query($conn,$sql);




header("location:../profile_page.php?imgChanged");
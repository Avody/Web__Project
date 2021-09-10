<?php 

session_start();
require_once('db.inc.php');

$id = $_SESSION['userid'] ;

$sql_coordinates = "SELECT lat,lng FROM uploaded_files WHERE  lat !=' ' or lat !='-' and lng !=' ' ";

$sql_my_coordinates = "SELECT lat,lng from users where usersId = ".$id."";



$result = mysqli_query($conn,$sql_coordinates);

$result2 = mysqli_query($conn,$sql_my_coordinates);


$my_coord = '';
while($row = mysqli_fetch_assoc($result2)){

	$my_coord = "[".$row['lat'].",".$row['lng']."]";
}





$text = '';
while($row = mysqli_fetch_assoc($result)){

	$text .= ",[".$row['lat'].",".$row['lng']."]";
}
 $a = substr($text,1);
	$text = '['.$my_coord.",".$a.']';
	



print_r($text);





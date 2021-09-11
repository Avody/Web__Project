<?php 

session_start();

if(!isset($_SESSION['userid'])){
        header('location:../sign_up.php?error=YOU');
        exit();
}

require_once('db.inc.php');



$sql_load_time = "SELECT content_type,AVG(load_time) FROM uploaded_files where content_type !='-' and content_type != ' ' GROUP BY content_type";

$result = mysqli_query($conn,$sql_load_time);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

print json_encode($data);
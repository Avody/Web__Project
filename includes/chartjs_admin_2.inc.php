<?php 

session_start();

if(!isset($_SESSION['userid'])){
        header('location:../sign_up.php?error=YOU');
        exit();
}

require_once('db.inc.php');



$sql_load_time = "SELECT AVG(load_time),substring(startedDateTime,12,12) as TimeOfDay FROM uploaded_files GROUP BY TimeOfDay";


$result = mysqli_query($conn,$sql_load_time);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

echo json_encode($data);






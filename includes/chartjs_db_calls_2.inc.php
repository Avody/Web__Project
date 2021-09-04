<?php 

session_start();


require_once('db.inc.php');



$sql_status = "SELECT DISTINCT status, count(status) from uploaded_files group by status";

$result = mysqli_query($conn,$sql_status);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

print json_encode($data);

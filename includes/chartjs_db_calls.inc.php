<?php 

session_start();


require_once('db.inc.php');



$sql_method = "SELECT DISTINCT method, count(method) from uploaded_files group by method";

$result = mysqli_query($conn,$sql_method);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

print json_encode($data);

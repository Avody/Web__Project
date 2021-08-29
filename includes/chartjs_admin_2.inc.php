<?php 

session_start();


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "users_project";


$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);


if(!$conn){

	die("Connection failed: " . mysql_connect_error());
};



$sql_load_time = "SELECT AVG(load_time),substring(startedDateTime,12,12) as TimeOfDay FROM uploaded_files GROUP BY TimeOfDay";


$result = mysqli_query($conn,$sql_load_time);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

echo json_encode($data);






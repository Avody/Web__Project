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



$sql_method = "SELECT DISTINCT method, count(method) from uploaded_files group by method";

$result = mysqli_query($conn,$sql_method);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

print json_encode($data);

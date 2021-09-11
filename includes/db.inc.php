<?php


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "users_project";


$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);


if(!$conn){

	die("Connection failed: " . mysql_connect_error());
}
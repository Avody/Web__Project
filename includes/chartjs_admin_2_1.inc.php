<?php 





$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "users_project";


$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);


if(!$conn){

	die("Connection failed: " . mysql_connect_error());
};






$tag = $_POST['tag'];
$option = $_POST['option'];



if(isset($option)){


if($tag !== "ISP" ){
	

if($option === "All" ){
	$sql_load_time = "SELECT AVG(load_time),substring(startedDateTime,12,12) as TimeOfDay FROM uploaded_files GROUP BY TimeOfDay";
}else{
	$sql_load_time = "SELECT AVG(load_time),substring(startedDateTime,12,12) as TimeOfDay FROM uploaded_files Where ".$tag."='$option' GROUP BY TimeOfDay";
}

}else{
	if($option !=="All"){
	$sql_load_time = "SELECT AVG(load_time),substring(startedDateTime,12,12) as TimeOfDay from uploaded_files right JOIN users ON users.usersId=uploaded_files.usersId AND users.ISP=\"$option\" GROUP BY startedDateTime";
	}else{
		$sql_load_time = "SELECT AVG(load_time),substring(startedDateTime,12,12) as TimeOfDay FROM uploaded_files GROUP BY TimeOfDay";
	}
}



$result = mysqli_query($conn,$sql_load_time);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

print json_encode($data);
}





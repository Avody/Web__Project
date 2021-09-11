<?php  
session_start();
if(!isset($_SESSION['userid'])){
        header('location:../sign_up.php?error=YOU');
        exit();
}

require_once('db.inc.php');


$sql_ttl="SELECT content_type,AVG(TIMESTAMPDIFF(hour, last_modified, expires)) AS TTL FROM uploaded_files WHERE not last_modified='0' AND NOT expires='0' AND NOT content_type = '-' GROUP BY content_type";


$result = mysqli_query($conn,$sql_ttl);

$data = array();
while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

print json_encode($data);


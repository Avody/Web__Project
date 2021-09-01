<?php 


require_once('db.inc.php');

$sql_coordinates = "SELECT lat,lng FROM uploaded_files WHERE NOT lat='' ";



$result = mysqli_query($conn,$sql_coordinates);



$text = '';
while($row = mysqli_fetch_assoc($result)){

	$text .= ",[".$row['lat'].",".$row['lng']."]";
}
 $a = substr($text,1);
	$text = '['.$a.']';
	



echo ($text);





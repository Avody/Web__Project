<?php 

require_once('db.inc.php');
$option = $_POST['option'];

if(!isset($option)){
	
	header('location:../home.php?vre pou pas?');
	exit();
}else{
	if($option=='All'){
		$sql_ppcs = "SELECT sum(public)/count(content_type) as public, sum(private)/count(content_type) as private, sum(no_cache)/count(content_type) as no_cache, sum(no_store)/count(content_type) as no_store FROM cache_directives WHERE content_type !='-' ";
	}else{
	$sql_ppcs = " SELECT sum(public)/count(content_type) as public, sum(private)/count(content_type) as private, sum(no_cache)/count(content_type) as no_cache, sum(no_store)/count(content_type) as no_store from cache_directives where content_type!='-' and content_type='$option' ";
}
}


$result = mysqli_query($conn,$sql_ppcs);

$data = array();

while($row = mysqli_fetch_assoc($result)){
	$data[]=$row;
}


print_r(json_encode($data));
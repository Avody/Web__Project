<?php 

require_once('db.inc.php');



	$sql_ppcs = " SELECT sum(public)/count(content_type) as public, sum(private)/count(content_type) as private, sum(no_cache)/count(content_type) as no_cache, sum(no_store)/count(content_type) as no_store from cache_directives where content_type!='-' ";




$result = mysqli_query($conn,$sql_ppcs);

$data = array();

while($row = mysqli_fetch_assoc($result)){
	$data[]=$row;
}


print_r(json_encode($data));
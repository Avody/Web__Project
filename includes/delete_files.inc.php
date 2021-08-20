<?php 

if(isset($_POST['files'])){
        $files = $_POST['files'];
        
        foreach($files as $key => $value) {
        	
        	unlink('../har_files/'.$value.'');
        }
        header("location:../heatmap.php");
    }else{
    	echo("select something");
    }
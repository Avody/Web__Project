<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uploaded_files_page">
    <title></title>
</head>
<body>
<h1 class="h1">Uploaded files</h1>

<form method="post" action="./delete_files.inc.php"  >
    <input type="checkbox" onClick="toggle(this)" id="check_all" /> Select all<br/><br/>
    <?php 
        session_start();

    	$dir = "C:\wamp64\www\Avody_Project\har_files\\".$_SESSION['useruid'];

            
        if ($handle = opendir($dir)) {
            while ($entry = readdir($handle)) {
                if ($entry != "." && $entry != "..") {
                    
                    echo "<input type='checkbox' value='$entry' name='files[] ' /> $entry <br/>";

                }
            }
            closedir($handle);
        }
    
    
    ?>
<p>
<input type="submit" class="delete" name="submit" value="Delete" onclick="return Warning_Sign()"/>
<input  type="button" class="return" name="return" value="Return" onclick="window.location.href='../heatmap.php'">
</p>
</form/>

<?php 
    if(isset($_GET['error'])){
        if($_GET['error']=='noFileSelected'){
            echo("No file selected");
        }
    }

 ?>
 <p style=" font-size:12px;" >*That won't delete the uploaded records.<br/>
   For doing so go to the profile page. 
 </p>

 

<script type="text/javascript">

    function Warning_Sign() {
        if(confirm('By deleting your files you may end up having duplicate records.\nAre you sure you want to proceed?')==true){
            return true;
        }else{
            return false;
        }
    }

    document.getElementById('check_all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

    

</body>
</html>
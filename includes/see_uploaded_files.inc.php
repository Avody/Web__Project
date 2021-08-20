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


    	$dir = 'C:\wamp64\www\Github_Project\har_files';

            
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
<input type="submit" class="delete" name="submit" value="Delete"/>
<input  type="button" class="return" name="return" value="Return" onclick="window.location.href='../heatmap.php'">
</p>
</form/>

<script type="text/javascript">

    document.getElementById('check_all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

    

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>HeatMap</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/heatmap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Leaflet-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin="">
   	
   </script>

</head>
<body>

	<?php include("NAVBAR.php");
	
	 ?>

	<div class="main">

		<div class="top">
			<div id="mapid"></div>
			
		</div>

		<div class="mid">
			
			<div class="store">
				 Store locally your files<br>
				<form class="store_loc" action="../includes/upload.locally.inc.php">
					<input type="file" name="">
				</form>
			</div>

			<div class="upload">

				<p class="up">Upload your files</p> <br>
				<form method="POST" action="includes/heatmap_upload_files.inc.php" enctype="multipart/form-data" class="upload_form">
					<div class = "upload_down">
						<input type="file" name="file"  >
						<input type="submit" name="submit" class="upload_submit_left" value="Upload new file">
						
						
					</div>
					<?php if(isset($_GET['error'])){
									if($_GET['error']=="none"){
										echo("<p style='margin-top:5px;'><b>File Uploaded successfully.</b></p>");
									}
									if($_GET['error']=="wrongFileType"){
										echo("<p style='margin-top:5px;'><b>Only har files are allowed.</b> </p>");
									}
									if($_GET['error']=="fileExists"){
										echo("<p style='margin-top:5px;'><b>File already exists.</b> </p>");
									}
								}

						 ?>
				</form>
			</div>
		</div>


		<div class="footer">Copyright &copy 2021 Odysseas Avramopoulos
		</div>

	</div>

	<script type="text/javascript" src="js/heatmap.js"></script>
	<script type="text/javascript" src="js/ip_find.js"></script>
	
</body>
</html>
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
	<?php include("NAVBAR.php") ?>

	<div class="main">

		<div class="top">
			<div id="mapid"></div>
		</div>

		<div class="mid">
			<div class="buttons">
				Upload your files 
				<input type="file" name="">
			</div>
		</div>

		<div class="footer">Copyright &copy 2021 Odysseas Avramopoulos
		</div>

	</div>

	<script type="text/javascript" src="js/heatmap.js"></script>
	
</body>
</html>
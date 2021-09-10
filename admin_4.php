<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/admin_4.css">
	<!--Leaflet-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin="">
</script>
<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>


</head>
<body>
	<?php include("NAVBAR.php") ?>
	<div class="all">
		<div class="top">
			
			
			<b>DATA VISUALISATION</b>
			<p style="font-size: 17px;">Ip addresses connected with lines with your home ip. <br>
			Line is thicker if the communication with that ip is more frequent. </p>
			
			
		</div>
		
		<div class="mid">
			
			<div id="mapid"></div>
			
		</div>
		<div class="bot">
			
		</div>

		<div class="footer">Copyright &copy 2021 Odysseas Avramopoulos</div>

	</div>
	<script type="text/javascript" src="js/admin_4_map.js" >

		
	</script>
</body>
</html>
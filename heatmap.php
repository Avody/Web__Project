<!DOCTYPE html>
<html>
<head>
	<title>IP FINDER - Heatmap</title>
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
   <script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/hea
	tmap.js"> </script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>
	

</head>
<body>

	<?php 
	include("NAVBAR.php");
	require_once('includes/db.inc.php');
	$id = $_SESSION['userid'];

	$sql = "SELECT * from uploaded_files where usersId = $id and not lat = '' and not lat='-' ";
	$result = mysqli_query($conn,$sql);

	if(!$result){
		echo("SQL query failed!");
	}

	$a = '';
	while($row = mysqli_fetch_assoc($result)){

		$lat = $row['lat'];
		$lng = $row['lng'];
		$a .= ',{"lat":'.$lat.',"lng":'.$lng.',"count":0}';
	
	}
	$a = substr($a,1);
	$text = '['.$a.']';
	
?>

	<div class="main">


		<div class="top">
			<div id="mapid"></div>

		</div>

		<div class="mid">
			
			<div class="uploaded_files_div">
				<p  class="up">See your uploaded files</p><br>
				<form class="store_loc" action="includes/see_uploaded_files.inc.php">
					<input type="submit" name="submit" class="uploaded_files_submit" value="See the uploaded files">
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
									if($_GET['error']=="noSelectedFile"){
										echo("<p style='margin-top:5px;'><b>Select a file.</b></p>");
									}
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


		<div class="footer">
			Copyright &copy 2021 Odysseas Avramopoulos
		</div>

	</div>	


	<script type="text/javascript" >
/*** Map display ***/
		let mymap = L.map('mapid');
		let attribution = '&copy; <a href= "https://www.openstreetmap.org/copyright">OpenStreetMap</a>contributors ';
		let tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		let tiles = L.tileLayer(tileUrl,{attribution});
		tiles.addTo(mymap);
		mymap.setView([42, 21], 4);

/*** Marker ***/
		
		let marker = L.marker([37.946593, 23.664675], 
		{ draggable: "true" });
		marker.addTo(mymap);

/*** IPs in proper form ***/
		var text = '<?= $text ?>';
		var table =  text ;
		console.log(JSON.parse(table));
	
	

/*** Heatmap***/

		var testData = {
		  max: 25,
		  data: JSON.parse(table)
		};

		var cfg = {
		  
		  "radius": 25,
		  "maxOpacity": 0.8,
		  "scaleRadius": false, 
		  "useLocalExtrema": false,
		  latField: 'lat', 
		  lngField: 'lng',
		  valueField: 'count'
		};

		var heatmapLayer = new HeatmapOverlay(cfg);
		mymap.addLayer(heatmapLayer);

		heatmapLayer.setData(testData);

</script>
	

	
	
</body>
</html>
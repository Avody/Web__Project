

<!DOCTYPE html>
<html>
<head>
	<title>IP FINDER</title>
	
	<link rel="stylesheet" type="text/css" href="css/home_main_body.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script
 	 src="https://code.jquery.com/jquery-3.6.0.min.js"
 	 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
 	 crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

</head>
<body>
	<?php include("NAVBAR.php") ?>
	


	<div class="all">

		
		<div class="upper" > 

			<div class = "txt">

				<p style=" font-size: 45px;">Welcome</p>
				<p><span style="font-size:20px">IP FINDER</span> is an online platform that can help you analyze and see many interesting things about your searches across the internet.<p>Upload your har files below and start your journey. </p>	</p>
			</div>
		</div>
		<div class="mid">

			<div class="mid_1">
				<h3>With the power of leaflet we can locate every http request on a heatmap</h3>

			</div>

			<div class="mid_2 button" >
				<h3>Upload new files OR have a look at the already uploaded</h3>
				<div class="button_left" onclick="location.href = 'heatmap.php';"> Let's go</div>

			</div>

			<div class="mid_3">
				<h3>Edit your profile page and also see some stats about your uploaded files.</h3>
				<div class="button_right" onclick="location.href = 'profile_page.php';"> Manage</div>
			</div>

		</div>
		
		<div class="footer"> Copyright &copy 2021 Odysseas Avramopoulos</div>


		
		

	</div>

	<script type="text/javascript" src="js/home.js"></script>

</body>
</html>
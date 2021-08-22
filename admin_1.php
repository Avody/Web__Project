<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admin_1.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js" defer></script>
	<script type="text/javascript" src="js/chart.js" defer></script>
	<title></title>
</head>
<body>
	<?php include("NAVBAR.php") ?>
	<div class="all">
		<div class="top">
			
			<p> IP FINDER provides plenty of usefull imformation so admin can track and analyze networks.</p>
			<p>Limits are meant to be broken.</p>

		</div>

		<div class="mid">
			
			<div class="container">

				<div class="chart_div">
					<div>Methods</div>
					<div>
						<canvas id="myChart" ></canvas>
					</div>
				</div>

				<div class="chart_div_2">
					<div>Status</div>
					<div>
						<canvas id="myChart2" ></canvas>
					</div>
				</div>

				
			</div>



			
			
		</div>

		<div class="bot">

		</div>

		<div class="footer">
			Copyright &copy 2021 Odysseas Avramopoulos
		</div> 

		
	</div>
	<form method="post" action="includes/chartjs_db_calls.inc.php">
		<input type="submit" name="submit">
	</form>
	


</body>
</html>
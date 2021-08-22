<?php 
	require_once('includes/db.inc.php');


	$sql_num_users = "SELECT COUNT(usersId) FROM users";
	$sql_num_users = mysqli_query($conn,$sql_num_users);
	$result_1 = mysqli_fetch_assoc($sql_num_users);

	$sql_uni_isp = "SELECT COUNT(DISTINCT(ISP)) FROM users WHERE NOT ISP ='Not provided yet' ";
	$sql_uni_isp = mysqli_query($conn,$sql_uni_isp);
	$result_2 = mysqli_fetch_assoc($sql_uni_isp);
	
	$sql_uni_ip = "SELECT COUNT(DISTINCT(ipAddress)) FROM uploaded_files WHERE NOT ipAddress = '' ";
	$sql_uni_ip = mysqli_query($conn,$sql_uni_ip);
	$result_3 = mysqli_fetch_assoc($sql_uni_ip);
 ?>




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
			
			<div class= "table">
				<table>
					<tr >
						<th >Number of clients: </th>
						<td><?php echo($result_1['COUNT(usersId)']);?></td>
					</tr>
					
					<tr>
						<th >Unique ISPs from our clients: </th>
						<td><?php echo($result_2['COUNT(DISTINCT(ISP))']);?></td>
					</tr>
					<tr>
						<th >Unique IPs tracked in har files: </th>
						<td><?php echo($result_3['COUNT(DISTINCT(ipAddress))']);?></td>
					</tr>
				</table>

			</div>
			<div class="text">
				<p> <b>IP FINDER</b> provides plenty of usefull imformation so admin can track and analyze networks.<br>
					Limits are meant to be broken.</p>
			</div>
			

		</div>

		<div class="mid">
			<div style=" text-align: center; display: flex; flex-direction: column; align-items: center; padding-bottom:10px;"><h3 style="width:55%">Types of methods and statuses from all uploaded files in the database.</h3>
				
			</div>
			
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
			<div class="chart_div_3">
					<div style=" text-align: center; display: flex; flex-direction: column; align-items: center;
					margin-top: 80px; margin-bottom: 10px; padding-bottom:10px;"><h3 style="width:70%">The graph below shows the average load-time of every content-type element in a page.</div>
					<div>
						<canvas id="myChart3" ></canvas>
					</div>
				</div>

		</div>

		<div class="footer">
			Copyright &copy 2021 Odysseas Avramopoulos
		</div> 

		
	</div>

	


</body>
</html>
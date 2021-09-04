<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/admin_3.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js" defer></script>
	<script type="text/javascript" src="js/admin_3_chart_1.js" defer></script>
	<script type="text/javascript" src="js/admin_3_chart_2.js" defer></script>
	
	
</head>
<body>
	<?php 	include('NAVBAR.php');
			require_once('includes/db.inc.php');
			$sql_cache_directives = "SELECT sum(public)/count(content_type)as public, sum(private)/count(content_type) as private, sum(no_cache)/count(content_type)as no_cache, sum(no_store)/count(content_type)as no_store FROM cache_directives WHERE content_type !='-'  ";


			$result = mysqli_query($conn,$sql_cache_directives);

			$data = array();
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}


	 ?>

	<div class="all">

		<div class="top">
			<b>CACHE ANALYTICS</b>
			<p style="font-size: 17px;">Analytics about cached objects in the visited pages.</p>
		</div>
		<div class="mid">
				<div class="mid_up"><b>Graph showing the time that content-type elements in the page are cached.</b></div>
				<div class="chart_1" id="chart_1">
					<canvas id="myChart_1"></canvas>
				</div>

		</div>
		<div class="bot">

			<div class="bot_left_chart">
				
				 <div class="table">

				 	<p style="margin-bottom:1px; font-size: 17px;"><b>Presentages about the total cache directives by content-type in the pages.</b></p>
				 	<p style="font-size:13px;">Directives define whether a response/request can be cached.</p>

				 	<table>
					<tr >
						<th >Public: </th>
						<td><?php echo(substr($data[0]['public'], 2,2)."%"); ?></td>
					</tr>
					
					<tr>
						<th >Private: </th>
						<td><?php echo(substr($data[0]['private'], 2,2)."%"); ?></td>
					</tr>
					<tr>
						<th >No Cache: </th>
						<td><?php echo(substr($data[0]['no_cache'], 2,2)."%"); ?></td>
					</tr>
					<tr>
						<th >No Store: </th>
						<td><?php echo(substr($data[0]['no_store'], 2,2)."%"); ?></td>
					</tr>
				</table>

				 	
				 </div>


				
			</div>

			

		</div>
		<div class="bot_time_two">
			<p style="font-size:17px; margin-bottom: 4px;margin-top: 10px;"><b>See the percentage of every content-type</b></p>
			<div class="chart_2" id="chart_2">
				
				<canvas id="myChart_2"></canvas>
				
			</div>
			<div class="dropdown">
				<select id="options" name="options" onchange="change_data()">
				<?php 
					$sql = "SELECT DISTINCT(content_type) from cache_directives where content_type != '' and content_type != '-'";
						$result = mysqli_query($conn, $sql);
						
						echo("<optgroup label='Select Content-type'>");
						while( $row = mysqli_fetch_assoc($result)){
							$row = $row['content_type'];
							echo("<option value='$row'>$row</option>");
						}
						echo("<option value='All'selected=''>All</option>");
						echo("<optgroup/>");
				 ?>
				 </select>
			</div>
		</div>
		<div class="footer">Copyright &copy 2021 Odysseas Avramopoulos</div>


	</div>

	<script type="text/javascript">
		
		function change_data(){
			$.ajax({
				url:"includes/chartjs_admin_3_2_1.inc.php",
				method: "POST",
				dataType: "JSON",
				data: {

					option:document.getElementById('options').value,


				},
				success: function(data) {
					

					var json =data;
					
					var presentage = [];

					presentage.push(json[0]['public']);
		            presentage.push(json[0]['private']);
		            presentage.push(json[0]['no_cache']);
		            presentage.push(json[0]['no_store']);
  
					



					var chartdata2 = {
						labels: ['public','private','no-cache','no-store'],
						datasets : [
						{
							label: document.getElementById('options').value ,
							backgroundColor:[
							'rgba(1,    9,   3,  0.2)',
							'rgba(104, 162, 235, 0.2)',
							'rgba(255, 106, 6, 0.4)',
							'rgba(75, 192, 192, 0.4)',
							'rgba(153, 102, 255, 0.4)',
							'rgba(255, 159, 64, 0.4)'
							],
							borderColor: 'rgba(0,0,55,.7)',
							hoverBackgroundColor:'lightblue',
							data:presentage

							
						}

						]

					};
					

					
					
					$('#myChart2').remove();
					
 					document.getElementById('chart_2').innerHTML= "<canvas id='myChart_2'></canvas>";
  				
					

					var ctx2 = $("#myChart_2");

					var myChart2 = new Chart(ctx2,{
						type: 'bar',
						data:chartdata2

					}); 
					
					
					





				}
			})
		}
	</script>
</body>
</html>
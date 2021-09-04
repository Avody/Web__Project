<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admin_2.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js" defer></script>
	<script type="text/javascript" src="js/chart_2.js" defer></script>
	
	<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
	
</head>
<body>
	<?php include('NAVBAR.php') ?>
	<?php include('includes/db.inc.php') ?>

	<div class="all">
		<div class="top">
			<b>RESPONSE TIME ANALYSE</b>
			<p style="font-size:17px;">Analyze the response time of the websites based on day, week, ISP.</p>
			

		</div>

		<div class="mid">
			<div id="chart_div" class="chart_div">
				<canvas id="myChart"></canvas>
			</div>
		</div>

		<div class="mid_right">
			<div class="dropdown">
				<label for="options">Choose to analyze the response time.</label>
				<select id="options" name="options" onchange="populate(this.id,'options_2')">
					<option value ="--Analyze--">--Analyze--</option>
					<option value ="content_type">Content-type</option>
					<option value="day">Day of week</option>
					<option value="method">HTTP method</option>
					<option value ="ISP">ISP</option>
				</select>
			</div>
			<div class="dropdown_2">
				<label for="options_2">Select the view of depection.</label>
				<select id="options_2" name="options_2" onchange="on_change()">

					
					

					
				</select>
			</div>
			
		</div>

		<div class="bot">
			
			
		</div>
		
		<div class="footer">
			Copyright &copy 2021 Odysseas Avramopoulos
		</div>
		
	</div>
	<script type="text/javascript">
		function populate(s1,s2){
				var s1 = document.getElementById(s1);
				var s2 = document.getElementById(s2);
				
				if (s1.value=="content_type"){
					s2.innerHTML="<?php 

						$sql = "SELECT DISTINCT(content_type) from uploaded_files where content_type != '' and content_type != '-'";
						$result = mysqli_query($conn, $sql);
						
						echo("<optgroup label='Select Content-type'>");
						while( $row = mysqli_fetch_assoc($result)){
							$row = $row['content_type'];
							echo("<option value='$row'>$row</option>");
						}
						echo("<option value='All'selected='' >All</option>");
						echo("<optgroup/>");


					 ?>";
					
				}
				else if(s1.value == "day"){
					s2.innerHTML = "<option value ='Mon'>Monday</option><option value ='Tue'>Tuesday</option><option value ='Wed'>Wednesday</option><option value ='Thu'>Thursday</option><option value ='Fri'>Friday</option><option value ='Sat'>Saturday</option><option value ='Sun'>Sunday</option><option value ='All' selected=''>All</option>";

				}
				else if(s1.value=="method"){
					s2.innerHTML="<?php 

						$sql = "SELECT DISTINCT(method) from uploaded_files where not method = ''  ";
						$result = mysqli_query($conn, $sql);
						
						while( $row = mysqli_fetch_assoc($result)){
							$row = $row['method'];
							echo("<option value='$row'>$row</option>");
						}
						echo("<option value='All' selected=''>All</option>");


					 ?>";
				}
				else if(s1.value=="ISP"){
					s2.innerHTML="<?php 

						$sql = " SELECT DISTINCT(ISP) from users where not ISP = 'Not provided yet'   ";
						$result = mysqli_query($conn, $sql);
						
						while( $row = mysqli_fetch_assoc($result)){
							$row = $row['ISP'];
							echo("<option value='$row'>$row</option>");
						}
						echo("<option value='All' selected=''>All</option>");


					 ?>";

				}
		};
		
		
	</script>
	<script type="text/javascript">
		function on_change()
		{            

			$.ajax({
				url:"includes/chartjs_admin_2_1.inc.php",
				method: "POST",
				dataType: "JSON",
				data: {
					tag:document.getElementById('options').value,
					option:document.getElementById('options_2').value,


				},
				success: function(data) {
					var json =data;
					var time_of_day = [];
					var avg_time = [];
					for(var i=0; i<json.length; i++){
						time_of_day.push(json[i]['TimeOfDay']);
						avg_time.push(json[i]['AVG(load_time)']);
					}



					var chartdata = {
						labels: time_of_day,
						datasets : [
						{
							label: document.getElementById('options_2').value ,
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
							data:avg_time


						}
						]
					};


					 $('#myChart').remove();

					
 					document.getElementById('chart_div').innerHTML= "<canvas id='myChart'></canvas>";
					

					var ctx = $("#myChart");

					var myChart = new Chart(ctx,{
						type: 'line',
						data:chartdata

					}); 
					

					





				}
			})

		}

</script>
	

</body>
</html>
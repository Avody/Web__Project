<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/admin_1.css">
	<title></title>
</head>
<body>
	<?php include("NAVBAR.php") ?>
	<div class="all">
		<div class="top">
			<div class="left">
				<canvas id="myChart" width="50px" height="50px"></canvas>
			</div>
			<div class="right"></div>
		</div>

		<div class="mid">
			<div class="left"></div>
			<div class="right"></div>
		</div>

		<div class="bot">
			<div class="left"></div>
			<div class="right"></div>		
		</div>

		<div class="footer">
			Copyright &copy 2021 Odysseas Avramopoulos
		</div> 

		
	</div>
	<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Blue', 'Yellow'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                
            }
        }
    }
});
</script>

</body>
</html>
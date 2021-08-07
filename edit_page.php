<!DOCTYPE html>
<html>
<head>
	<title>IP FINDER</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/edit_page.css">
	
</head>

<body>
		<?php include("navbar.php") ?> 

		<div class="data_class">
			<div class="old_data">
				<ul>
					<li><u>Current Username</u>: <?php echo $_SESSION['useruid'];?></li>
					<li><u>Current Name</u>: <?php echo $_SESSION['fullname']; ?> </li>
					<li><u>Current Email</u>: <?php echo $_SESSION['email']; ?> </li>
					<li><u>Password</u>: ********</li>
				</ul>		
				
			</div>
			<div class="buttons">

				<div class="new_data">
				<ul>
					<li class="l1">Change Username</li>
					<li class="l2">Change Name</li>
					<li class="l3">Change Email </li>
					<li class="l4">Change Password</li>
				</ul>		
				
			</div>
				
			</div>
			<div class="form">
				<div class="username_change">
					<div class="close">+</div>

				</div>


			</div>
		</div>
 </div>



</body>
</html>
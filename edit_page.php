<!DOCTYPE html>
<html>
<head>
	<title>IP FINDER - Edit profile</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	
	<script
 	 src="https://code.jquery.com/jquery-3.6.0.min.js"
 	 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
 	 crossorigin="anonymous"></script>
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
					<li id="button1" class="l1">Change Username</li>
					<li id="button2" class="l2">Change Name</li>
					<li id="button3" class="l3">Change Email </li>
					<li id="button4" class="l4">Change Password</li>
				</ul>	
					
				
			</div>
				
			</div>
		
			<div class="form">
				<div class="username_change">
					<div id="close" class="close">+</div>
					<form method="post" action="includes/edit_page_username.inc.php">
						<label><p style="font-size:25px;"><b>New Username</b></p></label>

						<input type="text" placeholder=" New username" name="Username">
						<input type="password" placeholder=" Password" name="password">

						<button class="submit" name="submit" type="submit" >Save Changes</button>
					</form>


				</div>

			</div>
			<div class="form2">
				
				<div class="name_change">
					<div id="close2" class="close2">+</div>
					<form method="post" action="includes/edit_page_name.inc.php">
						<label><p style="font-size:25px;"><b>New Name</b></p></label>
						<input type="text" placeholder=" Surname" name="Surname" required>
						<input type="text" placeholder=" Name" name="name" required>
						<input type="password" placeholder=" Password" name="password" required>
						<button class="submit" name="submit" type="submit" >Save Changes</button>
					</form>

				</div>

			</div>
			<div class="form3">
				
				<div class="email_change">
					<div id="close3" class="close3">+</div>
					<form method="post" action="includes/edit_page_email.inc.php">
						<label><p style="font-size:25px;"><b>New Email</b></p></label>
						<input   type="text" placeholder=" Email" name="email" required>
						<input type="password" placeholder=" Password" name="password" required>
						<button class="submit" name="submit" type="submit" >Save Changes</button>
					</form>

				</div>

			</div>
			<div class="form4">
				
				<div class="password_change">

					<div id="close4" class="close4">+</div>

					<form method="post" action="includes/edit_page_password.inc.php">

						<label><p style="font-size:25px;"><b>New Password</b></p></label>

						<input type="password" placeholder=" New Password" name="new_password" required>

						<input type="password" placeholder=" Old Password" name="old_password" required>

						<button class="submit" name="submit" type="submit" >Save Changes</button>

					</form>

				</div>

			</div>

		</div>

 </div>



<script type="text/javascript" src="js/edit_page.js"></script>
</body>
</html>
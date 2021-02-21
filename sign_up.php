<?php

	session_start();
?>



<!DOCTYPE html>
<html>

<head>

	<title>HTTP ANALYSIS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/signup.css "/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel="stylesheet"> 
	
<body>
</head>

<body>


	<main>
		<div class ="page" >

			<div class="upper_body">
				<h2></h2>
			</div>
			<div class="log-in-form">
				<h4> Sign up form</h4>
				

					<form class="container" action="includes/sign_up.inc.php" method="post">
					  <p>
					  <label>Username</label>
					  <input class="inputs" name="uname" placeholder="Username..." type="text">
					  
					  </p>

					  <p>
					  <label>Full Name</label>	
					  <input class="inputs" name="fname" placeholder="Full Name..." type="text">
					  
					  <p>
					  	<label>Email</label>
					  <input class="inputs" name="email" placeholder="Email..." type="text">
					  </p>

					  <p>
					  	<label>Password</label>
					  <input class="inputs" name="pwd" placeholder="Password..." type="password">
					  </p>
					<?php
						if (isset($_GET["error"])){

							if($_GET["error"] == "emptyinput"){
								echo "<p class='error_message'>You must fill in all fields first !</p>";
							}

							else if($_GET["error"] == "invalidUname"){
								echo "<p class = 'error_message'>Choose a proper username !</p>";
							}
							else if($_GET["error"] == "invalidEmail"){
								echo "<p class = 'error_message'>Choose a proper email !</p>";
							}
							else if($_GET["error"] == "invalidPwd"){
								echo "<div class = 'error_message'><p><u>Your password must have:</u> <p><ul><li> at least 8 characters</li><li> 1 special character</li><li> 1 number</li><li> 1 capital letter</li><ul></p></p></div>";
							}
							else if($_GET["error"] == "usernametaken"){
								echo "<p class = 'error_message'>Username already exists !</p>";
							}
							

						}


					 ?>

					 
					 
					  <button class="submit" name="submit" type="submit" >Sign up</button>
					 

					  <a href="sign_in.php">Already have an account?</a>
					 

					</form>



				

				 </div>
			</div>

			
		

		<img class="image" src="img/back-photo.jpg">
	</main>
		<div class="footer">
			<h1 >Copyright &copy;</h1>
		</div>
</body>

</html>
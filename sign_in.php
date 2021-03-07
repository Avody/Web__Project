<?php session_start();

 ?>

<!DOCTYPE html>
<html>

<head>

	<title>IP FINDER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/signup.css "/>
	<link rel="stylesheet" type="text/css" href="css/sign_in.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	
<body>
</head>

<body>


	<main>
		<div class ="page" >

			<div class="upper_body">
				<h2></h2>
			</div>
			<div class="log-in-form">
				<h4> Sign In Form</h4>
				

					<form class="container" method="post" action="includes/sign_in.inc.php" >
						<p>
					  	<label>Username / Email</label>
					  <input class="inputs" type="text" name = "Username" placeholder="Username / Email">
					  </p>

					  <p>
					  	<label>Password</label>
					  <input class="inputs" name="password" type="password" placeholder="Password">
					  </p>
					  <?php 
					  	if(isset($_GET['error'])){
					  		if($_GET['error'] == "none"){
					  			echo "<p class = 'error_message'>You can now sign in !</p>";
					  		}
					  		if($_GET["error"] == "emptyinputs"){
					  			echo "<p class='error_message'>You must fill in all the fields !</p>";
					  		}
					  		if($_GET["error"] == "wronglogin"){
					  			echo "<p class='error_message'>Incorrect login information !</p>";
					  		}
					  	}
					   ?>

					 <div class="down">
					 
					 <div>
					  <button class="submit" name="submit" type="submit" >Sign in</button>
					</div>
					 </div>

					

					  <a href="sign_up.php">Don't you have an account?</a>
					 

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
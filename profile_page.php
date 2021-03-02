<?php session_start();

	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	
</head>
<body>
	<nav class='nav-main'>

		<div class="btn-nav" onclick="toggleNav()">
			<div class="btn_move"> </div>
		</div>

		<div class="logo">IP FINDER</div>
		<div class="signin"  >
			<?php 
			if(isset($_SESSION['useruid'])){

				echo 
					"<div class = 'profile' onmouseover='mouseOver()' onmouseout='mouseOut()'  >
					".$_SESSION['useruid']."
					</div>";

				echo "  <div class='profile2' id='profile2' onmouseover='mouseOver()' onmouseout='mouseOut()'>
					 		<ul>
					 			<li class='grammh_profil'><a = href='includes/profile_page.inc.php'> Profile </a></li>
					 			<li><a = href='includes/sign_out.inc.php'> Log off </a></li>
					 		</ul>	
					 	</div>";
				
				}
				else{
					echo "  <div class='profile'>
					 			<a class='sign_in_out' href='sign_in.php'> 	Sign in </a>
					 		</div>";
			}
		?>
		</div>
		


	</nav>
	<aside class="sidebar">
		<ul>
			<li><span href="">Home</span></li>
			<li><a href="">Portfolio</a></li>
			<li><a href="">About Us</a></li>
			<li><a href="">Contact</a></li>
		</ul>
	</aside>
	
<?php
	
		
	if(isset($_SESSION['useruid'])){

		include("profPage_in_prof_page.php");

	}else{
		echo "Log in first";
	}	
		

	
	
?>
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/chart.js"></script>

</body>
</html>


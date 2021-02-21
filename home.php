<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
	<nav class='nav-main'>

		<div class="btn-nav" onclick="toggleNav()"></div>
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
					 			<li class='grammh_profil'><a = href=''> Profile </a></li>
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
	<div class="all">

		<div class="upper" > 
				<h1>EDW EIMASTE</h1>

		</div>


	</div>

	<script type="text/javascript" src="js/home.js"></script>

</body>
</html>
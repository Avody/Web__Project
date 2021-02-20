<?php session_start();?>
<link rel="stylesheet" type="text/css" href="css/header.css "/>
<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous">
			  	
 </script>
<header>
	<button class="menu-button" value=""  >Menu</button>
		
		<nav class="navbar">
			<ul class = "nav_links">
				
				<li> <a class="nav_link" href="#">Home</a> </li>
				<li> <a class="nav_link" href="#">About</a> </li>
				<li> <a class="nav_link" href="#">Contact</a> </li>
				<?php 
				if(isset($_SESSION['useruid'])){
					echo "<li> <a class='nav_link' href='profile.php'>Profile</a> </li>";
					echo "<li> <a class='nav_link' href='includes/sign_out.inc.php'>Log off</a> </li>";
				}
				else{
					echo "<li> <a class='nav_link' href='sign_in.php'>Sign in </a> </li>";

				}



				?>
				
			</ul>
		</nav>	
		<div class="cart">
			<img src="#" alt="cart-image"/>
			
		</div>

	
</header> 

		<?php

			if(isset($_SESSION['useruid'])){
				echo ("Welcome, ");
				echo $_SESSION['useruid'].'.';				
			}
		?>


<script>

	$(".menu-button").click(function(){
		$('.navbar').toggle(500);
	});
</script>
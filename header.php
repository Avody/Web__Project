<?php session_start();

echo( $_SESSION['useruid'] );

?>

<header>
		<div class="logo-container">
			<img src="#" alt="logo"/>
			<h4 class="logo">Logo</h4>
		</div>
		<nav>
			<ul class = "nav_links">
				<li> <a class="nav_link" href="#">Home</a> </li>
				<li> <a class="nav_link" href="#">About</a> </li>
				<li> <a class="nav_link" href="#">Contact</a> </li>
				<?php 
				if(isset($_SESSION['useruid'])){
					echo "<li> <a class='nav_link' href='profile.php'>Profile</a> </li>";
					echo "<li> <a class='nav_link' href='log_off.php'>Log off</a> </li>";
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
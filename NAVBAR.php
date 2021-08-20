<?php session_start();
	
	if(!isset($_SESSION['useruid'])){
		header("location:sign_in.php");
	}
	
 ?>



<head>
	

	<!--
	<link rel="stylesheet" type="text/css" href="css/home.css"> -->

	<link rel="stylesheet" type="text/css" href="css/NAVBAR.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<script
 	 src="https://code.jquery.com/jquery-3.6.0.min.js"
 	 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
 	 crossorigin="anonymous"></script>
	<script type="text/javascript">

		$(window).on('scroll', function(){
			if($(window).scrollTop()){
				$('nav').addClass('black');
				
			}
			else{
				$('nav').removeClass('black');
				
			}
		})
	</script>	
</head>
<body>
	<nav class='nav-main'>
		<div class="date_or_navbar">

		<?php 
		if( !isset($_SESSION['useruid']) || $_SESSION['useruid'] !="Admin" ){
			echo date("F j, Y");
		}elseif($_SESSION['useruid'] =="Admin" ){
			echo "
		<div class='btn-nav' onclick='toggleNav()'>
			<div class='btn_move'> </div>
		</div>			"; 
		} ?>
		</div>

		<div class="logo" onclick="location.href = 'home.php';" >IP FINDER</div>
		<div class="signin"  >
			<?php 
			if(isset($_SESSION['useruid'])){

				echo 
					"<div class = 'profile' onmouseover='mouseOver()' onmouseout='mouseOut()'  >
					".$_SESSION['useruid']."
					</div>";

				echo "  <div class='profile2' id='profile2' onmouseover='mouseOver()' onmouseout='mouseOut()'>
					 		<ul>
					 			<li class='grammh_profil'><a = href='profile_page.php'> Profile </a></li>
					 			<li><a = href='includes/sign_out.inc.php'> Log off </a></li>
					 		</ul>	
					 	</div>";
				
				}
				else{
					echo "  <div class='profile' onclick='location.href = `sign_in.php`;'>
					 				Sign in
					 		</div>";
			}
		?>
		</div>
		


	</nav>


	<script type="text/javascript" src="js/home.js"></script>
	

</body>
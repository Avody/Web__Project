<?php session_start();
	
	if(!isset($_SESSION['useruid'])){
		header("location:sign_in.php");
	}


	

	if (isset($_SESSION['LAST_ACTIVITY'])){

		if(time() - $_SESSION['LAST_ACTIVITY'] > 900){ //15 lepta session
			session_unset();      
    		session_destroy();
    		header("location:sign_in.php?Session time out");

		}else if(time() - $_SESSION["LAST_ACTIVITY"] > 60){
			$_SESSION["LAST_ACTIVITY"] = time();
    	   
		}
	}
	
 ?>
		
		



<head>
	

	<!--
	<link rel="stylesheet" type="text/css" href="css/home.css"> -->
	<link rel="icon" href="img/ip.png">
	<link rel="stylesheet" type="text/css" href="css/NAVBAR.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/p5@1.4.0/lib/p5.js"></script>
	<title>IP FINDER</title>
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
	<?php
		if($_SESSION['useruid']=="Admin"){
			echo"<aside class='sidebar'>
				
					<ul>
						<li style='margin-bottom:20px cursor:pointer;'><span><a href='home.php' style='text-decoration:none; color:white;'>IP FINDER</a></span></li>
						<li><a href='admin_1.php'>Basic Information</a></li>
						<li><a href='admin_2.php'>Response Time Analyze</a></li>
						<li><a href='admin_3.php'>Cache Analytics</a></li>
						<li><a href='admin_4.php'>Data Visualisation</a></li>
						<li><div class='timer' id='timer' style='color:white; opacity:0.2; font-size:14px; overflow: hidden;'> </div></li>
					</ul>
				
			</aside>";
	}?>
	<script type="text/javascript" src="js/home.js"></script>

	<script type="text/javascript">
		var counter=0;

		
		

		function setup(){
			
			noCanvas();
			var timer = select('#timer');
			var session_time = 900; //minutes
				
			function sec_to_mins(s){
				var mins = floor(s/60);
				var secs = s % 60;
				var time = nf(mins,2)+":"+nf(secs,2);
				return (time);
			}
			timer.html("Session time: "+sec_to_mins(session_time));

			var interval = setInterval(time_update,1000);

			function time_update(){
				counter++;
				timer.html("Session time: "+sec_to_mins(session_time-counter));

				if(session_time== counter){
				clearInterval(interval);
				counter =0;
			}
			}
			
			

			
		}
	</script>
	

</body>


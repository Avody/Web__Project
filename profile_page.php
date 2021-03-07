
<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	
</head>
<body>
	<?php include("navbar.php") ?>

<?php
	
		
	if(isset($_SESSION['useruid'])){

		include("profPage_in_prof_page.php");

	}else{
		echo "<div class='no_signed_up_message' >
				GREEDINGS USER. SIGN UP OR LOG IN FIRST TO CONTINUE.
		</div>";
	}	
		

	
	
?>
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/chart.js"></script>

</body>
</html>


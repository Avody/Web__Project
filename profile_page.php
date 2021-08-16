
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

	<?php 

	include("navbar.php");
	require_once('includes/db.inc.php');
	$id = $_SESSION['userid'];
	$sql_isp = "SELECT ISP FROM users WHERE usersId = $id ";
	$sql_num_rec = "SELECT COUNT(usersId) FROM uploaded_files WHERE usersId = $id ";
	$sql_last_upload = "SELECT ISP FROM users WHERE usersId = $id ";
	$result_isp = mysqli_query($conn,$sql_isp);
	$result_isp = mysqli_fetch_assoc($result_isp);
	
	$result_num_rec = mysqli_query($conn,$sql_num_rec);
	$result_num_rec = mysqli_fetch_assoc($result_num_rec);

	 ?>

	<div class="container">

	<div class="image">

			<div class="round_image">
				
				<img src="img/bob_img.jpg">

			</div>
	</div>
	<div class="top">
		
		<div class="data_class">
			<div class="data">
				<ul>
					<li><u>Username:</u><br/><?php echo $_SESSION['useruid'];?></li>
					<li><u>Name:</u><br/><?php echo $_SESSION['fullname']; ?> </li>
					<li><u>Email:</u><br/><?php echo $_SESSION['email']; ?> </li>
					<li><u>Password:</u><br/>********</li>
				</ul>		
				<div class="edit_btn" onclick="location.href = 'edit_page.php';" > <a> Edit </a> </div>
			</div>
		</div>

		<div class="talk_class">
			<div class="talk">
				<h3>This is your profile page. Here you can see your data, modify them and also see some stats about your activity in our page.</h3>
			</div>
		</div>
		

	</div>

	<div class="mid">

		<div class="user_data">
			<table >
  				<tr >
  				    <th>Information</th>
   					 <th></th>
   				 
  				</tr>
  				<tr >
   					<td>Last Upload</td>
   				    <td> August 15, 2021</td>
    			 
  				</tr>
 				<tr >
    				<td>Number of records uploaded</td>
    				<td><?php print_r($result_num_rec['COUNT(usersId)']); ?></td>
    			
  				</tr>
  				<tr >
   				    <td>Your ISP</td>
   				    <td><?php print_r($result_isp['ISP'])?></td>
   				 
  				</tr>
			</table>
		</div>
	</div>
	<div class="bottom"> Copyright &copy 2021 Odysseas Avramopoulos</div>


</div>

	<script type="text/javascript" src="js/home.js"></script>
	<!--<script type="text/javascript" src="js/chart.js"></script> -->

</body>
</html>


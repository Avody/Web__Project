
<!DOCTYPE html>
<html>
<head>
	<title>IP FINDER - Profile Page</title>
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
	$uname = $_SESSION['useruid'];

	$sql_isp = "SELECT ISP FROM users WHERE usersId = $id ";
	$result_isp = mysqli_query($conn,$sql_isp);
	$result_isp = mysqli_fetch_assoc($result_isp);

	$sql_num_rec = "SELECT COUNT(usersId) FROM uploaded_files WHERE usersId = $id ";
	$result_num_rec = mysqli_query($conn,$sql_num_rec);
	$result_num_rec = mysqli_fetch_assoc($result_num_rec);

	$sql_last_upload = "SELECT last_upload FROM users WHERE usersId = $id ";
	$result_date = mysqli_query($conn,$sql_last_upload);
	$result_date = mysqli_fetch_assoc($result_date);



	$sql_image = "SELECT profile_img FROM users where usersId = $id";
	$result_image = mysqli_query($conn,$sql_image);
	$result_image = mysqli_fetch_assoc($result_image);  
	$image_name= $result_image["profile_img"];
	 ?>

	<div class="container">

	<div class="image">

			<div class="round_image">
				<?php
				if($result_image['profile_img'] == "" ) {
					echo("<img src='img/bob_img.jpg'>");
				}else{
					echo("<img src='img/profile_img/$uname/$image_name'>");
				}
				


				?>
				<div class="photo_upload">
					<form action="includes/upload_img.inc.php" method="post" enctype="multipart/form-data">
						<label class="for_img_label" for="upload_btn"> 	&#128247;

						</label>
						<input type="file"  name="file" onchange="this.form.submit()" id="upload_btn">
					</form>
					
				</div>

			</div>
	</div>
	<div class="top">
		
		<div class="data_class">
			<div class="data">
				<ul>
					<li style="margin-bottom: 5px;"><u>Username:</u><br/><?php echo $_SESSION['useruid'];?></li>
					<li style="margin-bottom: 5px;"><u>Name:</u><br/><?php echo $_SESSION['fullname']; ?> </li>
					<li style="margin-bottom: 10px;"><u>Email:</u><br/><?php echo $_SESSION['email']; ?> </li>
					
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
   				    <td> <?php print_r($result_date['last_upload'] ) ?></td>
    			 
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
		<div style="align-items: center; border-top:1px solid black ;display:flex; width:500px;">
			<div style="flex-grow: 1;">DELETE UPLOADED RECORDS ?</div>
			<div style="flex-grow:1; margin-top:5px;">
			
			<form method="post" action="includes/profile_page.inc.php">
			<input  class="delete" type="submit" name="delete" value="Delete" >
			</form>	
			
			</div>
		</div>
		
	</div>
	<div class="bottom"> Copyright &copy 2021 Odysseas Avramopoulos</div>


</div>

	<script type="text/javascript" src="js/home.js"></script>
	<!--<script type="text/javascript" src="js/chart.js"></script> -->
	<script>
		function myFunction() {
  	confirm("Are you sure you want to proceed?");

}
	</script>

</body>
</html>


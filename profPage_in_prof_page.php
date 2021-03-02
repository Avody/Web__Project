
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
				<div class="edit_btn"> <a href="#"> Edit </a> </div>
			</div>
		</div>

		<div class="talk_class">
			<div class="talk">
				<h3>This is your profile page. Here you can see your data, modify them and also see some stats about your activity in our page.</h3>
			</div>
		</div>
		

	</div>

	<div class="mid">

		<div class="chart">
			<div class="myChart_class">
			<canvas id="myChart" class="myChart">
				
			</canvas>
			</div>
		</div>
	</div>
	<div class="bottom"> Copyright &copy 2021 Odysseas Avramopoulos</div>


</div>


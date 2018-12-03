<?php 
	session_start();
	if(!isset($_SESSION['login'])){	
		header('location:../form.php');
	}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Lucy's Pet Service</title>
	<script src="../js/mobile.js" type="text/javascript"></script>
</head>
<body>
  <div id ="placeholder" style="background-color: pink">
	<div id="page">
		<div id="header">
			<div id="navigation">
				<span id="mobile-navigation">&nbsp;</span>
				<a href="index.html" class="logo"><img src="../imgs/Petlogo.jpg" alt=""></a>
				
						<a href="dashboard.php">Home</a> |
					
						<a href="bookings.php">Booking</a> |
					
						<a href="profile.php">Profile</a> |
					
						<a href="mypets.php">Pets</a> |
					
						<a href="contact.php">Contact</a>
				
			</div>
			<ul id="login">
				<a href="profile.php">WELCOME <?php echo $_SESSION['user']; ?> <br /><br />
				<a href="../action/logout.php">Logout Here</a>					
			</ul>
		</div>

		<div id="body" class="dashboard">
			<div >
				<h1>My Profile</h1>
			</div>
			<div>
				<?php 
					include("../action/connection.php");
					$id = $_SESSION['uid'];
					$sqluser = "SELECT * FROM users WHERE user_id='$id'";
					$user = mysqli_query($conn, $sqluser);
					$row = mysqli_fetch_array($user);
				 ?>
				<h3><?php echo $row['full_name']; ?></h3>
				<h4>Address: <?php echo $row['address']; ?></h4>
				<h4>Contact Number: <?php echo $row['contact_number']; ?></h4>
				<h4>Member since: <?php 
									$timestamp =strtotime($row['registered_date']); 
									echo date('d-m-Y',$timestamp); 
								?></h4>
			</div>
		</div>
	
				<p>&copy; 2016 by Lucy. All rights reserved.</p>
	</div>

</body>
</html>
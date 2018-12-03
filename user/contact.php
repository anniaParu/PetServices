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
	<title>Lucy's Pet Service</title>
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

		<div id="body" class="contact">
			<div>
				<h1>Contact us</h1>
				<fieldset>
				<h2>Your Feedback</h2>
				<form action="../action/feedback.php" method="post">
					<textarea name="message" cols="50" rows="7" placeholder="Message"></textarea>
					<input type="submit" value="Send" id="submit" name="send" required="">
				</form>
				<h2>ADDRESS</h2>
				<p>Twin Cities, Minneapolis - St Paul, Minnesota</p>
				<h2>NUMBERS</h2>
				<a href="index.html">+11 3452-87543 or +11 2341-23415</a>
				<h2>Email</h2>
				<a href="index.html">service@lucyservice.com</a>
			</div>
			</fieldset>
		</div>
		
				<p>&copy; 2016 by Lucy. All rights reserved.</p>
			
	</div>
</body>
</html>

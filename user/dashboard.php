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
				<a href="profile.php">WELCOME <?php echo $_SESSION['user']; ?><br /><br />
				<a href="../action/logout.php">Logout Here</a>					
			</ul>
		</div>
		<div id="body" class="dashboard">
			<div>
				<h1>DASHBOARD</h1>
			</div>
			<div id ="placeholder" style="background-color: pink">
            <fieldset>
			<div>
				<form action="../action/book.php" method="post" >
				<h2>Book a service Here </h2>
				Pet Name: <input type="text" name="pet" placeholder="Pet's Name" required autofocus><br />
				Pet Age: <input type="text" name="age" placeholder="Pet's Age" required> <br><br />
					<label><h3>SELECT SERVICES</h3></label>
					<label>Pet Walking</label> 
					<select name="service1">
						<option></option>
						<option>20</option>
						<option>30</option>
						<option>50</option>
						<option>60</option>
					</select><label>Mins.</label><br />

					&nbsp<input type="checkbox" name="service2" value="1">
					<label>Puppy Socialization</label> 
					<br>
					
					<label>Play Sessions</label> 
					<select name="service3">
						<option></option>
						<option>20</option>
						<option>30</option>
						<option>60</option>
					</select><label>Mins.</label><br />
					<label>Feeding pets</label> 
					<select name="service4">
						<option></option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select><label>times</label><br/>
	
	                <label>DATE:</label>
	                <input type="date" name="date" placeholder="DD/MM/YYYY" required><br />
	                <label>TIME(24-hour):</label>
	                <input type="time" name="time" placeholder="HH:MM" required>
	                <input type="submit" value="book" name="book" id="submit" >
				</form>
				
			</div>
			</fieldset>

		</div>

				<p>&copy; 2016 by Lucy. All rights reserved.</p>
		</div>
	</div>
</body>
</html>
<?php 
include('../action/location.php');
 ?>
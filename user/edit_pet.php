<?php
	session_start();
	if(!isset($_SESSION['login']))
	{	
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
				<a href="index.html" class="logo"><img src="../imgs/petlogo.jpg" alt=""></a>
				
						<a href="dashboard.php">Home</a> |
					
						<a href="bookings.php">Booking</a> |
					
						<a href="profile.php">Profile</a> |
					
						<a href="mypets.php">Pets</a> |
					
						<a href="contact.php">Contact</a>
				
			</div>
			<ul id="login">
				<a href="profile.php">WELCOME <?php echo $_SESSION['user']; ?> <br /><br />
				<a href="../action/logout.php">Logout</a>					
			</ul>
		</div>

		<div id="body" class="dashboard">
			<div >
				<h1>Update Pets</h1>
			</div>
			
			<?php
				include("../action/connection.php");
				$id = $_SESSION['uid'];
				$pid = $_GET['pid'];
				$_SESSION['pid'] = $pid;
				$query = "SELECT * FROM pets WHERE pet_id='$pid'";
		   	    $sql = mysqli_query($conn, $query);
	            $i=1;
	            while($row = mysqli_fetch_array($sql)){
		    ?>
		    <div>
		    	<form action="../action/update_pets.php" method="post">        	
				Pet Name: <input type="text" name="pet" placeholder="pet name" 
				          required value="<?php echo $row['name']?>"><br /><br />
				Pet Age: <input type="text" name="age" placeholder="Pet Age" required value="<?php echo $row['age']?>">
					<input type="submit" name="edit" value="Edit" id="submit">
					<input type="submit" name="cancel" value="cancel" id="submit">
				</form>
		    </div>
				<?php 
				}
				 ?>
				
		</div>
				<p>&copy; 2016 by Lucy. All rights reserved.</p>
	</div>
		
</body>
</html>
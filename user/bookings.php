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
				<h1>My Bookings</h1>
			</div>
			
			<div style="overflow-x:auto;">
				<table border="2px">
					<tr>
						<th>SN</th> <th>Pet Name</th> <th>Age</th> <th>Pet Walking</th> 
						<th>Puppy Socialization</th> <th>Play Sessions</th> <th>Feeding Pets</th> 
						<th>Date</th> <th>Time</th> <th>Costs</th> <th>Actions</th>
					</tr>
					<?php
						include("../action/connection.php");
						$id = $_SESSION['uid'];
						$query = "SELECT * FROM bookings WHERE user_id='$id'";
	 		   	        $sql = mysqli_query($conn, $query);
			            $i=1;
			            while($row = mysqli_fetch_array($sql)){
			            	$bid = $row['booking_id'];
			        ?>
						<tr>
							<td><?php echo $i++;?></td> 
							<td><?php echo $row['pet'];?></td> 
							<td><?php echo $row['age']; ?></td>
							<td><?php echo "".$row['pet_walking']." mins";  ?></td>
							<td><?php echo "".$row['puppy_socialization']." mins";?></td> 
							<td><?php echo "".$row['play_session']." mins";?></td> 
							<td><?php echo "".$row['feeding_pets']." times";?></td>
							<td><?php echo $row['date'];?></td> 
							<td><?php echo $row['time'];?></td> 
							<?php 
							echo"<td><a href='cost.php?bid=".$row['booking_id']."'>Cost</a>";
							echo"<td><a href='../action/cancel_booking.php?bid=".$row['booking_id']."'>Cancel 
							</a>|<a href='update.php?bid=".$row['booking_id']."'> Edit</a></td>";
							?>
						</tr>
						<?php
				            }
				        ?>				   
				</table>
			</div>

		</div>

				<p>&copy; 2016 by Lucy. All rights reserved.</p>
	</div>
		
</body>
</html>
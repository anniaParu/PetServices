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
	<title> Lucy's Pet Service</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/mobile.css">
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
			<div >
				<h1>Total Cost</h1>
			</div>
			<div style="overflow-x:auto;">
			<?php 
				include("../action/connection.php");
				$id = $_SESSION['uid'];
				$bid = $_GET['bid'];
				$query ="SELECT * FROM `bookings` WHERE `booking_id` = '$bid'";
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_array($result);
				$walking = $row['pet_walking'];
				$socialization = $row['puppy_socialization'];
				$play = $row['play_session'];
				$feeding =$row['feeding_pets'];
				$walkingcost =  ($walking/15) * 1;
				$socializationcost = $socialization*8;
				$playcost = ($play/30) * 3;
				$feedingcost = $feeding * 3;
				$totalcost =$walkingcost + $socializationcost + $playcost + $feedingcost;
			 	$distance = $_SESSION['distance'];
			 	$service = array($walkingcost,$socializationcost,$playcost,$feedingcost);
			 ?>

 	<table border =2px SOLID >
 		<tr>
 			<th>Pet's Name</th><th>Pet Walking</th> <th>Puppy Socialization</th> 
			<th>Play Session</th> <th>Feeding Pets</th> <th>Distance</th> <th>Total Cost</th>
 		</tr>

 		<tr>
 			<td><?php echo $row['pet']; ?></td><td><?php echo "&pound".$walkingcost."" ?></td>
			<td><?php echo "&pound".$socializationcost.""; ?></td> <td><?php echo "&pound".$playcost.""; ?>
			</td> <td><?php echo "&pound".$feedingcost.""; ?></td> <td>
 			<?php
 			if ($distance>10) {
 			 	$extradistance=$distance-10;
 			 	echo "10 + ".$extradistance." miles";
 			 }else{
 			 	echo "".$distance." miles";
 			 } 
 			 
 			?></td> <td><?php 
 			if ($distance>10) {
 			foreach ($service as $extracost ) {
 				$extracost=$extracost+0.5;
 			} 
 			$total = $totalcost+$extracost;
 			echo "".$totalcost." + ".$extracost." (".$total.")";
 		}else{

 				
 			echo "&pound".$totalcost."";

 			}
 			?></td>
 		</tr>
 	</table>

			</div>

		</div>
				<p>&copy; 2016 by Lucy. All rights reserved.</p>	
	</div>
		
</body>
</html>

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
				<a href="index.html" class="logo"><img src="../imgs/Petlogo.jpg" alt=""></a>
				
						<a href="dashboard.php">Home Page</a>|
					
						<a href="profile.php">My Profile</a>|
					
						<a href="message.php">Messages</a> |
						
						<a href="../php/logout.php">Logout</a>	
				
			</div>
			<ul id="login">
				<a href="profile.php">ADMIN</a><br /><br />					
			</ul>
		</div>
		<div id="body" class="dashboard">
			<div >
				<h1>Bookings</h1>
			</div>
			<div style="overflow-x:auto;">
				<table border="2px">
					<tr>
						<th>SN</th> <th>Pet Name</th> <th>Age</th> <th>Pet Walking</th> <th>Puppy Socialization</th> <th>Play Sessions</th> <th>Feeding Pets</th> <th>Date</th> <th>Time</th> <th>User ID</th> <th>Actions</th>
					</tr>
					<?php
						include("../action/connection.php");
						$id = $_SESSION['uid'];
						$query = "SELECT * FROM bookings";
	 		   	        $sql = mysqli_query($conn, $query);
			            $i=1;
			            while($row = mysqli_fetch_array($sql)){
			            	$bid = $row['booking_id'];
			        ?>
						<tr>
							<td ><?php echo $i++;?></td> 
							<td><?php echo $row['pet'];?></td> 
							<td><?php echo $row['age']; ?></td>
							<td><?php echo "".$row['pet_walking']." mins";  ?></td>
							<td><?php echo "".$row['puppy_socialization']." mins";?></td> 
							<td><?php echo "".$row['play_session']." mins";?></td> 
							<td><?php echo "".$row['feeding_pets']." times";?></td>
							<td><?php echo $row['date'];?></td> 
							<td><?php echo $row['time'];?></td> 
							<td><?php echo $row['user_id']; ?></td>
							<?php 
							echo"<td><a href='../action/admin_cancel.php?bid=".$row['booking_id']."'>Cancel</a></td>";
							
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

<?php 	
	if(isset($_POST['book'])){		
		$pet = $_POST['pet'];
		$service = implode(', ',$_POST['service']);
		echo $service; 
	}
 ?>
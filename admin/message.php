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
					
						<a href="profile.php">My Profile</a> |
			
						<a href="message.php">Messages</a> |
						
						<a href="../action/logout.php">Logout</a>	
			</div>		
			
	</div>

				<div id="body" class="dashboard">
			<div >
				<h1>New Messages</h1>
			</div>
			<div style="overflow-x:auto;">
				<table border="2px">
					<tr>
						<th>SN</th> <th>Message From</th> <th>Address</th> <th>Email</th> <th>Message</th> <th>Date received</th>
					</tr>
					<?php
						include("../action/connection.php");
						$id = $_SESSION['uid'];
						$query = "SELECT * FROM messages";
	 		   	        $sql = mysqli_query($conn, $query);
			            $i=1;
			            while($row = mysqli_fetch_array($sql)){
			            	
			        ?>
				
						<tr>
							<td><?php echo $i++;?></td> 
							<td><?php echo $row['user_name'];?></td> 
							<td><?php echo $row['address']; ?></td>
							<td><?php echo $row['email'];?></td> 
							<td><?php echo $row['message'];?></td> 
							<td><?php echo $row['date_received']; ?></td>
							<?php 
							echo"<td><a href='../action/delete_message.php?bid=".$row['message_id']."'>Delete</a></td>";
							
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

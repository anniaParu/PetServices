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
				<h1>Update</h1>
			</div>
			
			<?php
				include("../action/connection.php");
				$id = $_SESSION['uid'];
				$bid = $_GET['bid'];
				$_SESSION['bid'] = $bid;
				$query = "SELECT * FROM bookings WHERE booking_id='$bid'";
		   	    $sql = mysqli_query($conn, $query);
	            $i=1;
	            while($row = mysqli_fetch_array($sql)){
		    ?>
		    <div>
		    	<form action="../action/update_booking.php" method="post">        	
					Pet Name:<input type="text" name="pet" placeholder="pet name" required 
					value="<?php echo $row['pet']?>" ><br /> <br />
					Pet Age:<input type="text" name="age" placeholder="Pet Age" required
					value="<?php echo $row['age']?>"> <br /><br />
					<label>SELECT SERVICES</label> <br/> 
					<label>Pet Walking</label> 
					<?php 
						if ($row['pet_walking']==15) {
							$option1= "selected";
						}else{
							$option1= "";
						}
						if ($row['pet_walking']==30) {
							$option2="selected";
						}else{
							$option2="";
						}
						if ($row['pet_walking']==45) {
							$option3="selected";
						}else{
							$option3="";
						}
						if ($row['pet_walking']==60) {
							$option4="selected";
						}else{
							$option4="";
						}
					?>
					<select name="service1">		
						<option></option>
						<option <?php echo $option1;?>>15</option>
						<option <?php echo $option2;?>>30</option>
						<option <?php echo $option3;?>>45</option>
						<option <?php echo $option4;?>>60</option>
					</select><label>mins.</label>

					<label>Puppy Socialization</label>
					<?php 
						if ($row['puppy_socialization']==15) {
							$option1= "selected";
						}else{
							$option1= "";
						}
						if ($row['puppy_socialization']==30) {
							$option2="selected";
						}else{
							$option2="";
						}
						if ($row['puppy_socialization']==45) {
							$option3="selected";
						}else{
							$option3="";
						}
						if ($row['puppy_socialization']==60) {
							$option4="selected";
						}else{
							$option4="";
						}
			 		?>
					<select name="service2">
						<option></option>
						<option <?php echo $option1;?>>15</option>
						<option <?php echo $option2;?>>30</option>
						<option <?php echo $option3;?>>45</option>
						<option <?php echo $option4?>>60</option>
					</select><label>mins.</label>

					<label>Play Sessions</label>
					<?php 
						if ($row['play_session']==30) {
							$option1= "selected";
						}else{
							$option1= "";
						}
						if ($row['play_session']==60) {
							$option2="selected";
						}else{
							$option2="";
						}
						if ($row['play_session']==90) {
							$option3="selected";
						}else{
							$option3="";
						}
						if ($row['play_session']==120) {
							$option4="selected";
						}else{
							$option4="";
						}
			 		?>					
					<select name="service3">
						
						<option <?php echo $option1;?>>30</option>
						<option <?php echo $option2;?>>60</option>
						<option <?php echo $option3;?>>90</option>
						<option <?php echo $option4	;?>>120</option>
					</select><label>mins.</label>
					
					<label>Feeding pets</label> 
					<?php 
						if ($row['feeding_pets']==1) {
							$option1= "selected";
						}else{
							$option1= "";
						}
						if ($row['feeding_pets']==2) {
							$option2="selected";
						}else{
							$option2="";
						}
						if ($row['feeding_pets']==3) {
							$option3="selected";
						}else{
							$option3="";
						}
			 		?>	
					<select name="service4">
						<option <?php echo $option1;?>>1</option>
						<option <?php echo $option2;?>>2</option>
						<option <?php echo $option3;?>>3</option>
					</select><label>times</label><br/>

					<label>DATE:</label>
					<input type="date" name="date" placeholder="YYYY/MM/DD" required value="<?php echo $row['date']?>">	
					<label>Time(24-hour):</label>
					<input type="time" name="time" placeholder="HH:MM" required value="<?php echo $row['time']?>">
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
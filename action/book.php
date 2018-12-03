<?php 
	session_start();
	include("connection.php");
	$id = $_SESSION['uid'];
	if(isset($_POST['book']))
	{
		$pet = $_POST['pet'];
		$age = $_POST['age'];
		$walking = $_POST['service1'];
		$socialization = $_POST['service2'];
		$play = $_POST['service3'];
		$feeding = $_POST['service4'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$query ="INSERT INTO `bookings` 
		VALUES(NULL,'$pet','$age','$walking','$socialization', '$play', '$feeding', '$date','$time','$id')";
		$query2 = "INSERT INTO `pets`(`pet_id`,`name`,`age`,`user_id`) VALUES(NULL, '$pet', '$age','$id')";
		$result = mysqli_query($conn,$query);
		$result2 = mysqli_query($conn,$query2);
		echo "<SCRIPT type='text/javascript'>
        alert('Pet registerd successfully');
        window.location.replace('../user/dashboard.php');
    	</SCRIPT>";	
	}
 ?>
 
<?php 
	session_start();
	include("../action/connection.php");
	if(isset($_POST['edit']))
	{   $id = $_SESSION['uid'];
		$bid = $_SESSION['bid'];
		$pet = $_POST['pet'];
		$age = $_POST['age'];
		$walking = $_POST['service1'];
		$socialization = $_POST['service2'];
		$play = $_POST['service3'];
		$feeding = $_POST['service4'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$query ="UPDATE `bookings` 
		SET `pet`='$pet',
		`age`='$age',
		`pet_walking`='$walking',
		`puppy_socialization`='$socialization',
		`play_session`='$play',
		`feeding_pets`='$feeding',
		`date`='$date',
		`time`='$time' WHERE `booking_id`='$bid'";
		$result = mysqli_query($conn,$query);
		echo "<SCRIPT type='text/javascript'>
        alert('Edit success');
        window.location.replace('../user/bookings.php');
    	</SCRIPT>";		
	}
	if(isset($_POST['cancel'])){
		header("location:../user/bookings.php");
	}?>
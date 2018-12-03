<?php 
	session_start();
	include("../action/connection.php");
	$id = $_SESSION['uid'];
	$bid = $_GET['bid'];
	$query ="DELETE FROM `bookings` WHERE `booking_id` = '$bid'";
	$result = mysqli_query($conn,$query);

	echo "<SCRIPT type='text/javascript'>
        alert('delete success');
        window.location.replace('../user/bookings.php');
    	</SCRIPT>";	

 ?>

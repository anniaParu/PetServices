<?php 
	session_start();
	include("../action/connection.php");
	$mid = $_GET['bid'];
	$query ="DELETE FROM `messages` WHERE `message_id` = '$mid'";
	$result = mysqli_query($conn,$query);

	echo "<SCRIPT type='text/javascript'>
        alert('delete success');
        window.location.replace('../user/bookings.php');
    	</SCRIPT>";	

 ?>

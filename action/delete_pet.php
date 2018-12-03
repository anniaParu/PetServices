<?php 
	session_start();
	include("../action/connection.php");
	$id = $_SESSION['uid'];
	$pid = $_GET['pid'];
	$query ="DELETE FROM `pets` WHERE `pet_id` = '$pid'";
	$result = mysqli_query($conn,$query);

	echo "<SCRIPT type='text/javascript'>
        alert('delete success');
        window.location.replace('../user/mypets.php');
    	</SCRIPT>";	
 ?>

<?php 
	session_start();
	include("connection.php");
	$id = $_SESSION['uid'];
	$pid = $_SESSION['pid'];
	if(isset($_POST['edit']))
	{
		$pet = $_POST['pet'];
		$age = $_POST['age'];
		$query ="UPDATE `pets` SET `name`='$pet',
		`age`='$age' WHERE `pet_id`='$pid'";		
		$result = mysqli_query($conn,$query);
		echo "<SCRIPT type='text/javascript'>
        alert('Pet edit successfull');
        window.location.replace('../user/mypets.php');
    	</SCRIPT>";	
	}
	if(isset($_POST['cancel'])){
		header("location:../user/mypets.php");
	}
 ?>
 
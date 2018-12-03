<?php 
	session_start();
	include("connection.php");
	$id = $_SESSION['uid'];
	$query = "SELECT * FROM users WHERE user_id = '$id'";
	$sql = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($sql);
	echo $id;
	
	if(isset($_POST['send'])){
		$user = $row['full_name'];
		$address = $row['address'];
		$email = $row['email'];
		$message = $_POST['message'];
		$query2 = "INSERT INTO `messages`(`message_id`,`user_name`,`address`,`email`,`message`) 
		VALUES(NULL, '$user', '$address','$email','$message',CURRENT_TIMESTAMP)";
		$result2 = mysqli_query($conn,$query2);
		echo "<SCRIPT type='text/javascript'>
        alert('Thank you for your feedback.');
        window.location.replace('../admin/message.php');
    	</SCRIPT>";	
	}
 ?>
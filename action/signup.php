<?php
include("connection.php");
if(isset($_POST['signup'])){
	$fullname = $_POST['full_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$checkemail="SELECT * FROM users WHERE email = '$email'";
	$resemail=mysqli_query($conn,$checkemail);
	$dataemail = mysqli_fetch_array($resemail, MYSQLI_NUM);
	$checkusername="SELECT * FROM users WHERE username = '$username'";
	$resusername=mysqli_query($conn,$checkusername);
	$datausername = mysqli_fetch_array($resusername, MYSQLI_NUM);	
	if ($dataemail[0]>1){
		echo "<SCRIPT type='text/javascript'>
		    	alert('This email is already registered.');
		    	window.location.replace('../form.php');
			</SCRIPT>";
	}elseif ($datausername[0]>1) {
		echo "<SCRIPT type='text/javascript'>
		    	alert('This username is already registered.');
		    	window.location.replace('../form.php');
			</SCRIPT>";
	}else{
	$query ="INSERT INTO `users`
	(`user_id`,`full_Name`,`username`,`password`,`email`,`address`,`contact_number`,`registered_date`) 
	VALUES(NULL,'$fullname','$username','$password', '$email','$address','$contact',CURRENT_TIMESTAMP)";
	$result = mysqli_query($conn,$query);
	echo "<SCRIPT type='text/javascript'>
    	alert('Succeesfully Registered.');
    	window.location.replace('../form.php');
		</SCRIPT>";
	}
}
?>


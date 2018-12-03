<?php
	session_start();
	include("connection.php");
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'"; 
		$result = mysqli_query($conn, $query); 
		$num = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result); 
		if($num==1){
			$_SESSION['login'] ="login"; 
			$_SESSION['uid'] = $row['user_id']; 
			$_SESSION['user']=$username;
			if ($row['user_type']==0) {
				echo "<SCRIPT type='text/javascript'>
	        window.location.replace('../user/dashboard.php');
	        alert('Login Success');
	    	</SCRIPT>";
			}elseif ($row['user_type']==1) {
				echo "<SCRIPT type='text/javascript'>
	       	window.location.replace('../admin/dashboard.php');
	        alert('Login Success');
	    	</SCRIPT>";
			}
		}else{
			echo "<SCRIPT type='text/javascript'>
		    	alert('username or password invalid.');
		    	window.location.replace('../form.php');
			</SCRIPT>";
		}
	}
?>


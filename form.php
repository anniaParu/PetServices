<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login and Signup</title>
	<script src="js/mobile.js" type="text/javascript"></script>

</head>
<body>
<div id ="placeholder" style="background-color: gray">
	<div id="page">
		<div id="header">
			<div id="navigation">
				<span id="mobile-navigation">&nbsp;</span>
				<a href="index.html" class="logo"><img src="imgs/petlogo.jpg" alt=""></a>
						<h2><a href="index.html">Home</a>|
						<a href="about.html">About Us</a>|
						<a href="services.html">Services</a>|
						<a href="contact.html">Contact Us</a></h2>
			</div>
		</div>
		<div id="body" class="form">
			<div>
			<div id ="placeholder" style="background-color: pink">
			<fieldset>
				<h1>Login Here</h1>
				<form action="action/login.php" method="post">
				User Name: <br>
				<input type="text" name="username"  placeholder="Enter Username" required><br /><br />
				Password: <br>
				<input type="password" name="password" placeholder="Enter Password" required><br />
					<input type="submit" value="login" id="submit" name="login">

				</form>
				</fieldset>
			</div>

			<div>
			<div id ="placeholder" style="background-color: pink">
			<fieldset>
				<h1>Register Here</h1>
				<form action="action/signup.php" method="post" id="signup">
				Full Name: <input type="text" name="full_name" placeholder="Full Name" required>
				User Name: <input type="text" name="username" placeholder="Enter Username" required><br /><br />
				Password: <input type="password" name="password" id="password" placeholder="Enter Password" required>
				Re-enter Pwd: <input type="password" name="repassword" id="repassword" placeholder="Re-enter password" 
					onkeyup="checkPassword();" required ><br /><br />
				Email: <input type="email" name="email" placeholder="Email" required>					
				Address: <input type="text" name="address" placeholder="Address" required><br></br>
				Contact No: <input type="text" name="contact" placeholder="Phone Number" required><br /><br />
					<input type="submit" value="Signup" id="submit" name="signup">
				</form>
				</fieldset>
			</div>

			<script type="text/javascript"> 
				function checkPassword(){
				    var password = document.getElementById('password');
				    var repassword = document.getElementById('repassword');
				    var correctColor = "purple";
				    var wrongColor = "yellow";
				   
				    if(password.value == repassword.value){
				        repassword.style.backgroundColor = correctColor;
				        message.style.color = correctColor;
				     
				    }else{
				        repassword.style.backgroundColor = wrongColor;
				        message.style.color = wrongColor;
				    }
				}  
			</script>
	
		</div>
				<p>&copy; 2016 by Lucy. All rights reserved.</p>
		</div>
	</div>
</body>
</html>


<?php
	include "connection.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Library Management System
	</title>
	<link rel="stylesheet" type = "text/css" href = "style.css">
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
</head>
<body>
<header style = "height 90px;">
	<div class = "header_image">
			<img src = images/book.jpeg>
			<h1 style = "color:red">User Login</h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "user.php">User-Login</a></li>
				<li><a href = "feedback.php">Feedback</a></li>
				<li><a href = "logout.php">Logout</a></li>
			</ul>
		</nav>
</header>
<section>
	<div class = "user_login_img">
	<br><br><br>
			<div class = "user_box">
				<br><br>
				<h1 style = "text-align: center; font-size: 30px;">Welcome to the Library</h1><br>
				<h1 style = "text-align: center; font-size: 20px;">User Login</h1><br><br>
				<form name = "login" action ="" method ="POST" style = "padding = 20px">
					<div class = "login">
						<input class = "large" type ="text" name = "username" placeholder = "Username"><br><br>
						<input class = "large" type ="password" name = "password" placeholder = "Password"><br><br>
						<input class = "button" type = "submit" name ="login" value = "Login">
						<button onclick = "location.href='register.php'" type ="button">Register</button>&nbsp &nbsp
						<a href = "forgot.php" style = "color:white">Forgot Password?</a>
					</div>
				</form>
			</div>
	</div>
</section>
<?php

	if(isset($_POST['login']))
	{
		$count = 0;
		$result = mysqli_query($conn,"SELECT * FROM `user` WHERE username ='$_POST[username]' && password='$_POST[password]';");
		$count = mysqli_num_rows($result);
		
		if($count == 0)
		{
			?>
			<!--
			<script type = "text/javascript">
				alert("The username or password doesn't match.");
			</script>
			-->
			<div class = "alert" style = "height: 50px; width: 450px; margin-left: 450px; 
										  background-color:red; text-align:center;">
				<strong><br>The username or password does not match</strong>
			</div>
			<?php
		}else
		{
			$_SESSION['login_user'] = $_POST['username'];
			
			?>
			<script type = "text/javascript">
				window.location = "homepage.php"
			</script>
			<?php
		}
	}

?>
</body>
</html>
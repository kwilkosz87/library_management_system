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
			<h1 style = "color:red">Library Management System</h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "user.php">User-Login</a></li>
				<li><a href = "register.php">Register</a></li>
				<li><a href = "feedback.php">Feedback</a></li>
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
						<button onclick = "location.href='register.html'" type ="button">Register</button>&nbsp &nbsp
						<a href = "forgot.html" style = "color:white">Forgot Password?</a>
					</div>
				</form>
			</div>
	</div>
</section>

<?php

	if(isset($_POST['']))

?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<title>
		User Registration
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
	<div class = "user_login_img"><br>
			<div class = "register_box">
				<h1 style = "text-align: center; font-size: 30px;">Welcome to the Library</h1><br>
				<h1 style = "text-align: center; font-size: 20px;">User Registration</h1><br>
				<form name = "registration" action ="insert.php" method ="POST" style = "padding = 20px">
					<div class = "login">
						<input class = "large" type ="text" name = "username" placeholder = "Username"><br><br>
						<input class = "large" type ="password" name = "password" placeholder = "Password"><br><br>
						<input class = "large" type ="text" name = "fname" placeholder = "First"><br><br>
						<input class = "large" type ="text" name = "lname" placeholder = "Last"><br><br>
						<input class = "large" type ="text" name = "email" placeholder = "Email"><br><br>
						<input class = "large" type ="text" name = "address" placeholder = "Address"><br><br>
						<input class = "medium" type ="text" name = "city" placeholder = "City"> &nbsp
						<input class = "small" type ="text" name = "state" placeholder = "State"> &nbsp
						<input class = "small" type ="text" name = "zip" placeholder = "Zip"><br><br>
						<input type = "submit" name = "register">
					</div>
				</form>
			</div>
	</div>
</section>

</body>
</html>
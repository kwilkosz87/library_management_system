<?php
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
	<div class = "wrapper">
		<header>
		<div class = "header_image">
			<img src = images/book.jpeg>
			<h1 style = "color:red">Library Management System</h1>
		</div>
		
		<?php
			if(isset($_SESSION['login_user']))
			{
				?>
			<nav>
				<ul>
					<li><a href = "media.php">Media</a></li>
					<li><a href = "logout.php">Logout</a></li>
					<li><a href = "feedback.php">Feedback</a></li>
					<li><a href = "user_info.php">User-Info</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li><a href = "request.php">Request-Media</a></li>
					<li><a href = "issue_info.php">Issued-Media</a></li>
					<li style = "color:white;"><?php echo "Welcome ".$_SESSION['login_user'];?></li>
				</ul>
			</nav>
			<?php
			} else
			{?>
			<nav>
				<ul>
					<li><a href = "homepage.php">Home</a></li>
					<li><a href = "user.php">User-Login</a></li>
					<li><a href = "../admin/admin.php">Admin-Login</a></li>
					<li><a href = "register.php">Register</a></li>
					<li><a href = "feedback.php">Feedback</a></li>
				</ul>
			</nav>
			<?php
			}
			?>
		</header>
		<section>
		<div class = "home_img">
			<br><br><br>
			<div class = "box">
				<br><br><br><br>
				<h1 style = "text-align: center; font-size: 30px;">Welcome to the Library</h1><br><br>
				<h1 style = "text-align: center; font-size: 20px;">Open Every Day from 9:00am to 9:00pm</h1><br>
			</div>
		</div>
		</section>
		<footer>
			<p style = "color:white; text-align:center;">
				<br>
				Email: &nbsp kwilkosz@iu.edu <br><br>&nbsp
				Phone: &nbsp 614-555-1234 <br>
			</p>
		</footer>	

	</div>
</body>
</html>
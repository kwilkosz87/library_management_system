<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Change Password
	</title>
	<link rel="stylesheet" type = "text/css" href = "style.css">
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
</head>
<body style = "height:650px; width: 100%; background-color:green;">
<header style = "height 90px;">
	<div class = "header_image">
			<img src = images/book.jpeg>
			<h1 style = "color:red">Change/Update Password</h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "admin.php">Admin-Login</a></li>
			</ul>
		</nav>
</header>
<div class = "user_box">
	<div style = "text-align: center;">
		<h1 style = "font-size: 25px;">Change Your Password</h1><br><br>
	</div>
	<form method ="POST" style = "text-align:center;">
		<input type = "text" name ="username" placeholder = "Username" required=""><br><br>
		<input type = "text" name ="email" placeholder = "Email" required =""><br><br>
		<input type = "text" name ="password" placeholder = "New Password" required = ""><br><br>
		<button type ="submit" name = "submit">Update</button>
	</form>
</div>
<?php
	if(isset($_POST['submit']))
	{
		if(mysqli_query($conn, "UPDATE admin SET password = '$_POST[password]' WHERE
									username = '$_POST[username]' AND email = '$_POST[email]';"));
		{
			?>
				<script type="text/javascript">
					alert("The password has been updated successfully!")
				</script>
			<?php
		}
	}
?>
</body>
</html>
<?php
	include "connection.php";
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
			<nav>
				<ul>
					<li><a href = "homepage.php">Home</a></li>
					<li><a href = "media.php">Media</a></li>
					<li><a href = "user.php">User-Login</a></li>
					<li><a href = "admin.php">Admin-Login</a></li>
					<li><a href = "register.php">Register</a></li>
					<li><a href = "feedback.php">Feedback</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<div class = "home_img"><br>
				<div class = "comments"><br>
					<h1 style = "text-align: center">Let us know if you have any questions or comments!</h1><br>
					<form style ="" action = "" method = "POST">
						<input class = "comment1" type =  "text" name = "comment" placeholder = "Write your feedback here">
						<input type = "submit" name = "submit" value = "Reply" style = "margin-left: 20px;">
					</form><br>
			<div>
			<div class = "scroll">
			<h1>Previous comments by users.</h1><br>
				<?php
					if(isset($_POST['submit']))
					{
						$sql="INSERT INTO `feedback` VALUES (NULL ,'$_POST[comment]');";
						if (mysqli_query($conn,$sql))
						{
							$query = "SELECT * FROM `feedback` ORDER BY `feedback`.`id` DESC";
							$result = mysqli_query($conn,$query);
						
							echo "<table class = 'table'>";
							while($row = mysqli_fetch_assoc($result))
							{
								echo "<tr>";
									echo "<td>"; echo $row['comment']; echo "</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
					
					
					}else
					{
						$query = "SELECT * FROM `feedback` ORDER BY `feedback`.`id` DESC";
						$result = mysqli_query($conn,$query);
					
						echo "<table class = 'table'>";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
								echo "<td>"; echo $row['comment']; echo "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
				?>
			</div>
			</div>
			</div>
		</div>
		</section>
</body>
</html>
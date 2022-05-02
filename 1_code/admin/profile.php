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
<style>
table
{
	border: 2px solid white;
}
tr
{
	border: 2px solid white;
}
td
{
	border: 2px solid white;
}
</style>
</head>
</html>
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
					<li><a href = "logout.php">Logout</a></li>
					<li><a href = "feedback.php">Feedback</a></li>
					<li><a href = "admin_info.php">Admin-Info</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li style = "color:white;"><?php echo "Welcome ".$_SESSION['login_user'];?></li>
				</ul>
		</nav>
		</header>
	<section  style = "height:650px;">
	<div class = "container">
		<form action = "" method = "POST" style = "float:right; margin-right: 20px;  margin-top: 5px;" >
			<button name = "submit1">Edit</button>
		</form><br>
		<div class = "user_box" style = "margin:0 auto; height:500px;">
			<?php
				if(isset($_POST['submit1']))
				{
					?>
					<script type ="text/javascript">
						window.location = "edit.php"
					</script>
					<?php
				}
			
				$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$_SESSION[login_user]';");
			?>
			<h2 style = "text-align:center;">Profile Information</h2>
			<?php
				$row = mysqli_fetch_assoc($query);
				
				echo "<table class = 'table'>";
					echo "<tr>"; 
						echo "<td>"; 
							echo "<b> First Name: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['fname'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>"; 
						echo "<td>"; 
							echo "<b> Last Name: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['lname'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>"; 
						echo "<td>"; 
							echo "<b> Username: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['username'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>"; 
						echo "<td>"; 
							echo "<b> Password: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['password'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>"; 
						echo "<td>"; 
							echo "<b> Email: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['email'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>"; 
						echo "<td>"; 
							echo "<b> Contact: </b>";
						echo "</td>";

						echo "<td>";
							echo $row['contact'];
						echo "</td>";
					echo "</tr>";
				echo "</table>";
			?>
		</div>
	</div>
	</section>
	</div>			
</body>
</html>


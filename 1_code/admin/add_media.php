<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!----------------HEADER-------------------->
	<title>Media</title>
	<link rel="stylesheet" type = "text/css" href = "style.css">
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
	<!----------------TABLE STYLING-------------------->
	<style>
		table {
		border-collapse: collapse;
		width: 100%;
		color: #5a2727;
		font-family: monospace;
		font-size: 25px;
		text-align: left;
		}
		th {
		background-color: #af5f00;
		color: white;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
		</style>
</head>
<body>
	<header style = "height 90px;">
	<div class = "header_image">
			<img src = images/book.jpeg>
			<h1 style = "color:red; margin-left: 65px;">Add Media</h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "admin_info.php">Directory</a></li>
				<li><a href = "add_media.php">Add-Media</a></li>
				<li><a href = "delete_media.php">Delete-Media</a></li>
				<li><a href = "feedback.php">Feedback</a></li>
			</ul>
		</nav>
	</header><br>
	<div class = "container" style = "text-align:center">
		<h1 style = "text-align:center; font-size: 30px;">Add New Media</h1>
		<form name = "registration" action ="" method ="POST" style = "padding = 20px">
			<div class = "login">
				<input class = "large" type ="text" name = "name" placeholder = "Title"> <br><br>
				<input class = "large" type ="text" name = "authors" placeholder = "Authors"><br><br>
				<input class = "large" type ="text" name = "edition" placeholder = "Edition"><br><br>
				<input class = "large" type ="text" name = "availability" placeholder = "Availability"><br><br>
				<input class = "large" type ="text" name = "quantity" placeholder = "Quantity"><br><br>
				<input class = "large" type ="text" name = "category" placeholder = "Category"><br><br>
				<button type = "submit" name = "submit">Add Media</button>
			</div>
		</form>
	</div>

	<?php
		if(isset($_POST['submit']))//Submit button has been pressed
		{
			if(isset($_SESSION['login_user']))//User is logged in
			{
				mysqli_query($conn, "INSERT INTO media VALUES (NULL,'$_POST[name]','$_POST[authors]',
									 '$_POST[edition]','$_POST[availability]','$_POST[quantity]','$_POST[category]');");
				?><!----------------INSERTING NEW MEDIA-------------------->
				<script type = "text/javascript">
				alert ("Media has been added successfully!");
				</script>
				<?php
			}else
			{
				?>
				<script type = "text/javascript">
				alert ("Admin must be logged in");
				</script>
				<?php
			}
			
		}
	?>
</body>
</html>

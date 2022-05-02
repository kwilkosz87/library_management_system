<?php
	include "connection.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Media</title>
	<link rel="stylesheet" type = "text/css" href = "style.css">
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
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
			<h1 style = "color:red; margin-left: 65px;">Media List</h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "admin.php">Admin-Login</a></li>
				<li><a href = "admin_info.php">Directory</a></li>
				<li><a href = "logout.php">Logout</a></li>
				
			</ul>
		</nav>
	</header><br>
	<div class = "searchbar" style = "margin-left: 1100px;">
		<form method ="post" name = "form1">
			<div>
				<input type="text" name = "search" placeholder ="Search by first or last name..." style = "width: 250px;" required = ""><br>
				<input type ="submit" name = "submit" value = "Search">
			</div>
		</form>
	</div>
	<br><br><br>
	<table>
	<tr>
	<th>Username</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Contact</th>
	<?php
		if(isset($_POST['submit']))
		{
			$query = mysqli_query($conn, "SELECT * FROM admin WHERE fname LIKE '%$_POST[search]%'
																	lname LIKE '%$_POST[search]%' ");
			
			
			
			if(mysqli_num_rows($query) == 0)
			{
				echo "Sorry, there are no titles found with that name.";
			}else
			{
				while($row = mysqli_fetch_assoc($query)) 
				{
					echo "<tr><td>" . $row["username"]. "</td>
						  <td>" . $row["fname"] . "</td>
						  <td>" . $row["lname"] . "</td>
						  <td>" . $row["email"] . "</td>
						  <td>" . $row["contact"] . "</td></tr>";
				}
			
					echo "</table>";
			
			}
		}else
		{
			$result = mysqli_query($conn, "SELECT * FROM admin ORDER BY admin.lname ASC;");
			
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td>" . $row["username"]. "</td>
						  <td>" . $row["fname"] . "</td>
						  <td>" . $row["lname"] . "</td>
						  <td>" . $row["email"] . "</td>
						  <td>" . $row["contact"] . "</td></tr>";
				
			}
			echo "</table>";
		}
		
		
		
		
	

	?>
</body>
</hmtl>
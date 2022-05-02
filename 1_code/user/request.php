<?php
	include "connection.php";
	session_start();
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
				<li><a href = "user_info.php">Directory</a></li>
				<li><a href = "logout.php">Logout</a></li>
				<li><a href = "feedback.php">Feedback</a></li>
			</ul>
		</nav>
	</header><br>
	<div class = "searchbar" style = "margin-left: 1100px;">
		<form method ="post" name = "form1">
			<div>
				<input type="text" name = "search" placeholder ="Search requested media..." style = "width: 250px;" required = ""><br>
				<input type ="submit" name = "submit" value = "Search">
			</div>
		</form>
	</div>
	<br><br><br>
	<table>
	<tr>
	<th>Media ID</th>
	<th>Approve Status</th>
	<th>Issue Date</th>
	<th>Due Date</th>
	</tr>
	<?php
	
		if(isset($_SESSION['login_user']))
		{
			$query = mysqli_query($conn, "SELECT * FROM issue_media WHERE username = '$_SESSION[login_user]' ;");
			
			
			
			if(mysqli_num_rows($query) == 0)
			{
				echo "You have not requested any media";
			}else
			{
				while($row = mysqli_fetch_assoc($query)) 
				{
					echo "<tr><td>" . $row["id"]. "</td>
						  <td>" . $row["approval"] . "</td>
						  <td>" . $row["issueDate"] . "</td>
						  <td>" . $row["returnDate"] . "</td></tr>";
				}
			
					echo "</table>";
			
			}
		}else
		{
			echo "</br></br></br>";
			echo "<h2>";
			echo "Please login first to request the information";
			echo "</h2>";
		}
		
		
		
		
	

	?>
</body>
</html>
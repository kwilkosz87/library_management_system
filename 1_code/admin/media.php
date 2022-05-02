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
				<li><a href = "admin_info.php">Directory</a></li>
				<li><a href = "add_media.php">Add-Media</a></li>
				<li><a href = "feedback.php">Feedback</a></li>
			</ul>
		</nav>
	</header><br>
	<div class = "searchbar" style = "margin-left: 1100px;">
		<form method ="post" name = "form1">
			<div>
				<input type="text" name = "search" placeholder ="What are you looking for?" style = "width: 250px;" required = "">
				<input type ="submit" name = "submit" value = "Search">
			</div>
		</form><br>
		<form method ="post" name = "form1">
			<div>
				<input type="text" name = "id" placeholder ="Enter Book ID number" style = "width: 250px;" required = ""><br>
				<input type ="submit" name = "delete" value = "Delete">
			</div>
		</form>
	</div>
	<br><br><br>
	<table>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Authors</th>
	<th>Edition</th>
	<th>Availability</th>
	<th>Quantity</th>
	<th>Category</th>
	</tr>
	<?php
		if(isset($_POST['submit']))
		{
			$query = mysqli_query($conn, "SELECT * FROM media WHERE name LIKE '%$_POST[search]%' OR
																	category LIKE '%$_POST[search]%' OR
																	authors LIKE '%$_POST[search]%' ");
			
			
			
			if(mysqli_num_rows($query) == 0)
			{
				echo "Sorry, there are no titles found with that name.";
			}else
			{
				while($row = mysqli_fetch_assoc($query)) 
				{
					echo "<tr><td>" . $row["id"]. "</td>
						  <td>" . $row["name"] . "</td>
						  <td>" . $row["authors"] . "</td>
						  <td>" . $row["edition"] . "</td>
						  <td>" . $row["availability"] . "</td>
						  <td>" . $row["quantity"] . "</td>
						  <td>" . $row["category"] . "</td></tr>";
				}
			
					echo "</table>";
			
			}
		}else
		{
			$result = mysqli_query($conn, "SELECT * FROM media ORDER BY media.name DESC;");
		
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr><td>" . $row["id"]. "</td>
					  <td>" . $row["name"] . "</td>
					  <td>" . $row["authors"] . "</td>
					  <td>" . $row["edition"] . "</td>
					  <td>" . $row["availability"] . "</td>
					  <td>" . $row["quantity"] . "</td>
					  <td>" . $row["category"] . "</td></tr>";
			
			}
			echo "</table>";
		}
		if(isset($_POST['delete']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($conn, "DELETE FROM media WHERE id = '$_POST[id]' ;");
				?>
				<script type = "text/javascript">
					alert("Successfully deleted");
				</script>
				<?php
			}else
			{
				?>
				<script type = "text/javascript">
					alert("Please login before attempting to delete media");
				</script>
				<?php
			}
		}
		
		
		
		
	

	?>
</body>
</html>
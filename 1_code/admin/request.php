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
			<h1 style = "color:red; margin-left: 65px;">Requested Media</h1>
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
				<input type="text" name = "username" placeholder = "Enter username" style = "width: 250px;" required = ""><br>
				<input type ="text" name = "id" placeholder = "Media ID"><br>
				<button type = "submit" name = "submit">Submit</button>
			</div>
		</form>
	</div>
	<br><br><br>
	<table>
	<tr>
	<th>Student Username</th>
	<th>Media ID</th>
	<th>Title</th>
	<th>Authors Name</th>
	<th>Edition</th>
	<th>Availability</th>
	</tr>
	<?php
	
		if(isset($_SESSION['login_user']))
		{
			$query = "SELECT user.username,media.id, name, authors, edition, availability 
					  FROM user INNER JOIN issue_media ON user.username=issue_media.username 
					  INNER JOIN media ON issue_media.id=media.id WHERE issue_media.approval = ''";
			
			$result = mysqli_query($conn, $query);
			
			if(mysqli_num_rows($result) == 0)
			{
				echo "There are no requests for any media";
			}else
			{
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr><td>" . $row["username"]. "</td>
					  <td>" . $row["id"] . "</td>
					  <td>" . $row["name"] . "</td>
					  <td>" . $row["authors"] . "</td>
					  <td>" . $row["edition"] . "</td>
					  <td>" . $row["availability"] . "</td></tr>";
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
		if(isset($_POST['submit']))
		{
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $_POST['id'];
			
			?>
				<script type ="text/javascript">
					window.location="approve.php"
				</script>
			<?php
			
		}
		
		
		
		
	

	?>
</body>
</html>
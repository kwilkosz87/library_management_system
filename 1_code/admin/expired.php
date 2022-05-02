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
			<h1 style = "color:red; margin-left: 65px;">Expired Media List</h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "logout.php">Logout</a></li>
				<li><a href = "profile.php">Profile</a></li>
				<li><a href = "admin_info.php">Admin-Info</a></li>
				<li><a href = "request.php">Requested-Media</a></li>
				<li><a href = "issue_info.php">Issue-Info</a></li>
				<li><a href = "expired.php">Expired-Media</a></li>
			</ul>
		</nav>
	</header><br>
	<div class = "searchbar">
			<form method ="POST">
				<button style ="margin-left:20px; color:white; background-color: green;" name = "returned">RETURNED</button>
				<button style ="margin-left:20px; color:yellow; background-color: red;" name = "expired">EXPIRED</button>
			</form>
			<form method ="POST" name = "form1" style = "margin-left: 1100px; overflow:auto;">
				<div>
					<input type="text" name = "username" placeholder ="Username" style = "width: 250px;" required = "">
					<input type="text" name = "id" placeholder ="Media ID" style = "width: 250px;" required = "">
					<input type ="submit" name = "submit" value = "Update">
				</div>
			</form>
		
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			$var1 ='<p style="color:white; background-color: green;">RETURNED</p>';
			mysqli_query($conn, "UPDATE issue_media SET issue_media.approval = '$var1'
											 WHERE username = '$_POST[username]' AND id = '$_POST[id]'");
			mysqli_query($conn,"UPDATE media SET quantity = quantity + 1 WHERE id = '$_POST[id]'");
											 
		}
	?>
	<br><br><br>
	<table>
	<tr>
	<th>Username</th>
	<th>ID</th>
	<th>Title</th>
	<th>Authors</th>
	<th>Edition</th>
	<th>Issue Date</th>
	<th>Return Date</th>
	<th>Status</th>
	</tr>
	<?php
		$count = 0;
		if(isset($_SESSION['login_user']))
		{
			$exp ='<p style="color:yellow; background-color: red;">EXPIRED</p>';
			$ret ='<p style="color:white; background-color: green;">RETURNED</p>';
			
					  
			if(isset($_POST['returned']))
			{
				$sql = "SELECT user.username,media.id, name, authors, edition, issueDate, returnDate ,approval
						  FROM user INNER JOIN issue_media ON user.username=issue_media.username 
						  INNER JOIN media ON issue_media.id=media.id WHERE issue_media.approval = '$ret'
						  ORDER BY returnDate DESC";
				$result = mysqli_query($conn,$sql);
			}elseif(isset($_POST['expired']))
			{
				$sql = "SELECT user.username,media.id, name, authors, edition, issueDate, returnDate ,approval
						  FROM user INNER JOIN issue_media ON user.username=issue_media.username 
						  INNER JOIN media ON issue_media.id=media.id WHERE issue_media.approval = '$exp'
						  ORDER BY returnDate DESC";
				$result = mysqli_query($conn,$sql);
			}else
			{
				$sql = "SELECT user.username,media.id, name, authors, edition, issueDate, returnDate ,approval
						  FROM user INNER JOIN issue_media ON user.username=issue_media.username 
						  INNER JOIN media ON issue_media.id=media.id WHERE issue_media.approval != ''
						  AND issue_media.approval != 'Yes' ORDER BY returnDate DESC";
						  
				$result = mysqli_query($conn,$sql);
			}
			
			
			while($row = mysqli_fetch_assoc($result)) 
				{
					
					echo "<tr><td>" . $row["username"]. "</td>
						  <td>" . $row["id"] . "</td>
						  <td>" . $row["name"] . "</td>
						  <td>" . $row["authors"] . "</td>
						  <td>" . $row["edition"] . "</td>
						  <td>" . $row["issueDate"] . "</td>
						  <td>" . $row["returnDate"] . "</td>
						  <td>" . $row["approval"] . "</td></tr>";
				}
					echo "</div>";
					echo "</table>";
					echo "</div>";
		}else
		{
			?>
			
			<?php
		}
			
			
			
	?>
</body>
</html>
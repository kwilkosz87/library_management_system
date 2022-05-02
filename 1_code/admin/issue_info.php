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
				<li><a href = "logout.php">Logout</a></li>
				<li><a href = "profile.php">Profile</a></li>
				<li><a href = "admin_info.php">Admin-Info</a></li>
				<li><a href = "request.php">Requested-Media</a></li>
				<li><a href = "issue_info.php">Issue-Info</a></li>
				<li><a href = "expired.php">Expired-Media</a></li>
			</ul>
		</nav>
	</header><br>

	<br><br><br>
	<div style = "width:100%; height:200px; overflow:auto;">
	<table>
	<tr>
	<th>Username</th>
	<th>ID</th>
	<th>Title</th>
	<th>Authors</th>
	<th>Edition</th>
	<th>Issue Date</th>
	<th>Return Date</th>
	</tr>
	<?php
		$count = 0;
		if(isset($_SESSION['login_user']))
		{
			
			$sql = "SELECT user.username,media.id, name, authors, edition, issueDate, returnDate 
					  FROM user INNER JOIN issue_media ON user.username=issue_media.username 
					  INNER JOIN media ON issue_media.id=media.id WHERE issue_media.approval = 'Yes'
					  ORDER BY returnDate ASC";
					  
			$result = mysqli_query($conn,$sql);
			
			
			while($row = mysqli_fetch_assoc($result)) 
				{
					$date = date("m-d-Y");
					if($date > $row['returnDate'])
					{
						$count = $count + 1;
						$var ='<p style="color:yellow; background-color: red;">EXPIRED</p>';
						mysqli_query($conn, "UPDATE issue_media SET issue_media.approval = '$var'
											 WHERE returnDate ='$row[returnDate]' AND issue_media.approval = 'Yes' 
											 LIMIT $count; ");
											 
						echo $date."</br>";
					}
					
					echo "<tr><td>" . $row["username"]. "</td>
						  <td>" . $row["id"] . "</td>
						  <td>" . $row["name"] . "</td>
						  <td>" . $row["authors"] . "</td>
						  <td>" . $row["edition"] . "</td>
						  <td>" . $row["issueDate"] . "</td>
						  <td>" . $row["returnDate"] . "</td></tr>";
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
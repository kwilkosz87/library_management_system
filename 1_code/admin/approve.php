<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Media Approval</title>
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
			<h1 style = "color:red; margin-left: 65px;">Media Approval/h1>
	</div>
		<nav>
			<ul>
				<li><a href = "homepage.php">Home</a></li>
				<li><a href = "media.php">Media</a></li>
				<li><a href = "user_info.php">Directory</a></li>
				<li><a href = "logout.php">Logout</a></li>
				<li><a href = "expired.php">Expired-Media</a></li>
			</ul>
		</nav>
	</header><br>
	<div class = "searchbar" style = "text-align:center;">
		<form method ="post" name = "form1">
			<div>
				<input type="text" name = "approve" placeholder = "Yes or No" style ="text-align:center;" required = ""><br><br>
				<input type ="text" name = "issue" placeholder = "Issue Date mm-dd-yyyy" required = ""><br><br>
				<input type ="text" name = "return" placeholder = "Return Date mm-dd-yyyy" required = ""><br><br>
				<button type = "submit" name = "submit">Approve</button>
			</div>
		</form>
	</div>
	<br><br><br>
	<?php
		if(isset($_POST['submit']))
		{
			mysqli_query($conn,"UPDATE `issue_media` SET `approval` ='$_POST[approve]', `issueDate` = '$_POST[issue]', 
								`returnDate` = '$_POST[return]' WHERE username = '$_SESSION[name]' AND id = '$_SESSION[id]';");
								
			mysqli_query($conn,"UPDATE media SET quantity = quantity-1 WHERE id = '$_SESSION[id]';");
			
			$result=mysqli_query($conn, "SELECT quantity FROM media WHERE id = '$_SESSION[id]';");
			
			while($row = mysqli_fetch_assoc($result))
			{
				if($row['quantity'] == 0)
				{
					mysqli_query($conn,"UPDATE media SET availability = 'Not Available' where id = '$_SESSION[id]';");
				}
			}
			?>
				<script type ="text/javascript">
					alert ("Updated successfully!")
					window.location = "request.php"
				</script>
			<?php
		}
	?>
	

<?php
	include "connection.php";
	session_start();
?>
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
			<h1 style = "color:red; padding-left:55px;">Edit Profile</h1>
		</div>
		
		<?php
			if(isset($_SESSION['login_user']))
			{
				?>
			<nav>
				<ul>
					<li><a href = "homepage.php">Home</a></li>
					<li><a href = "media.php">Media</a></li>
					<li><a href = "logout.php">Logout</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li><a href = "user_info.php".php">User-Info</a></li>
					<li><a href = "request.php">Requested-Media</a></li>
					<li style = "color:white;"><?php echo "Welcome ".$_SESSION['login_user'];?></li>
				</ul>
			</nav>
			<?php
			} else
			{?>
			<nav>
				<ul >
					<li><a href = "homepage.php">Home</a></li>
					<li><a href = "../user/user.php">User-Login</a></li>
					<li><a href = "admin.php">Admin-Login</a></li>
					<li><a href = "register.php">Register</a></li>
				</ul>
			</nav>
			<?php
			}
			?>
		</header>
		<?php
			$sql = "SELECT * FROM user WHERE username ='$_SESSION[login_user]'";
			$result = mysqli_query($conn, $sql);
			
			while ($row = mysqli_fetch_assoc($result))
			{
				$fname = $row['fname'];
				$lname = $row['lname'];
				$username = $row['username'];
				$password = $row['password'];
				$email = $row['email'];
				$address = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zip'];
			}
		?>
		<section><br>
		<div class = "profile" style = "text-align:center;">
			<h1 style = "font-size:30px;">Info Update Page</h1>
		</div>
		<form method="POST" style = "text-align:center;"><br>
			<label><h4>First Name:</h4></label>
			<input type="text" name="fname" value = "<?php echo $fname ; ?>"><br>
			<label><h4>Last Name:</h4></label>
			<input type="text" name="lname" value = "<?php echo $lname; ?>"><br>
			<label><h4>Username:</h4></label>
			<input type="text" name="username" value = "<?php echo $username; ?>"><br>
			<label><h4>Password:</h4></label>
			<input type="text" name="password" value = "<?php echo $password; ?>"><br>
			<label><h4>Email: </h4></label>
			<input type="text" name="email" value = "<?php echo $email; ?>"><br>
			<label><h4>Address:</h4></label>
			<input type="text" name="address" value = "<?php echo $address; ?>"><br>
			<label><h4>City:</h4></label>
			<input type="text" name="city" value = "<?php echo $city; ?>"><br>
			<label><h4>State:</h4></label>
			<input type="text" name="state" value = "<?php echo $state; ?>"><br>
			<label><h4>Zip:</h4></label>
			<input type="text" name="zip" value = "<?php echo $zip; ?>"><br>
			<button type = "submit" name = "submit">Update</button>
		</form>
		</section>
	<?php
		if(isset($_POST['submit']))
		{
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			
			$sql1 = "UPDATE user SET fname = '$fname', lname = '$lname', username = '$username',
					 password = '$password', email = '$email', address = '$address', city = '$city',
					 state = '$state', zip = '$zip' WHERE username ='".$_SESSION['login_user']."';";
			if(mysqli_query($conn,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Successfully updated.");
						window.location = "profile.php"
					</script>
				<?php
			}
		}
	?>
</body>
</html>
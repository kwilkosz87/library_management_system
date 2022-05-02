<DOCTYPE! html>
<html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "Library_System";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['register']))
{
	
	$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '" .$_POST['username']."'");
	
	
	if(!mysqli_num_rows($sql) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['username']) && 
	   !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['address']) && 
	   !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']))
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
		
			$query = "INSERT INTO user (fname, lname, username, password, email, address, city, state, zip)
					  VALUES ('$fname', '$lname', '$username', '$password', '$email', '$address', '$city', '$state', '$zip')";
				  
			$run = mysqli_query($conn, $query) or die(mysqli_error());
		
			if($run)
			{
				echo "Form submitted successfully" ;
				header("refresh: 3 ; url = homepage.php");
			}else
			{
				echo "Form not submitted";
				header("refresh: 3 ; url = register.php");
			}
		
	   }elseif(mysqli_num_rows($sql))
	   {
	   		echo "Username exists, please try again.";
			header("refresh: 3 ; url = register.php");
	   }else
	   {
	   		echo "All fields required, please try again.";
			header("refresh: 3 ; url = register.php");
	   }
	   
}

?>




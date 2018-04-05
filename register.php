<html>
<head>
	<title>User Registration Form</title>
			<link rel="stylesheet" href="styles/style4.css" media="all" />

	
</head>
<body>	

<?php
require_once("db_const.php");
if (!isset($_POST['submit'])) {
?>	<!-- The HTML registration form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	
	<table align="center" width="450" border="2" bgcolor="orange">	
	<tr align="center">
		<td colspan="7"><h2>Register Here</h2></td>
	</tr>
	
	<tr>
		<td align="right"><b>Username:</b> </td>
		<td><input type="text" name="username" required /></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Password:</b> </td>
		<td><input type="password" name="password" required /></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>First Name:</b> </td>
		<td><input type="text" name="first_name" required/></td>
		
	</tr>
	<tr>
		<td align="right"><b>Last Name:</b> </td>
		<td><input type="text" name="last_name" required/></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Email:</b> </td>
		<td><input type="text" name="email" required/></td>
		
	</tr>
	
	<tr align="center">
	
		<td colspan="7"><input type="submit" name="submit" value="Register" /></td>
		
	</tr>
	
	
		
		
		</table>
	</form>
	
	<center><b><a href="products.php">Back To Fitness</a></b><br></center>
    <center><h3><a href="products.php">Login Page</a></h3></center>
		
<?php
} else {
## connect mysql server
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
## query database
	# prepare data for insertion
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];
 
	# check if username and email exist else insert
	$exists = 0;
	$result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists = 1;
		$result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 2;	
	} else {
		$result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 3;
	}
 
	if ($exists == 1) echo "<p>Username already exists!</p>";
	else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
	else if ($exists == 3) echo "<p>Email already exists!</p>";
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) 
				VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";
 
		if ($mysqli->query($sql)) {
			//echo "New Record has id ".$mysqli->insert_id;
			echo "<script>alert ('Registration is sucessfully done.') </script>";
		echo "<script>window.open ('products.php','_self') </script>";
			
			
			
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
}
?>		
</body>
</html>
<html>
<head>
	<title> Login Form </title>
</head>
<body>

<?php
if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<tr align="center">
		<td colspan="7"><h2>Login Here</h2></td>
	</tr>
	
	<tr>
		<td align="right"><b>Username:</b> </td>
		<td><input type="text" name="username" required /></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Password:</b> </td>
		<td><input type="password" name="password" /></td>
		
	</tr>
	
	<tr align="center">
	
		<td colspan="7"><input type="submit" name="submit" value="Login" /></td>
		
	</tr>
	
		
		
		
		</table>
	</form>
	
	<center><h3><a href="register.php">Not Yet Registered? Register here! </h3></a></center>
	
<?php
} else {
	require_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<script>alert ('Username/Password incorrect') </script>";
		echo "<script>window.open ('products.php','_self') </script>";
	} else {
		echo "<script>alert ('Login Succesfully done') </script>";
		
		echo "<script>window.open ('products.php','_self') </script>";
		// do stuffs
	}
}
?>		
</body>
</html>
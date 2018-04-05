
<html>
<head>
	<title> Admin Login Form </title>
</head>
<body>



<?php
if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<table align="center" width="500" border="2" bgcolor="orange">	
	<tr align="center">
		<td colspan="5"><h2>Admin Login Page</h2></td>
	</tr>
	
	<tr>
		<td align="right"><b>Admin Name:</b> </td>
		<td><input type="text" name="admin_name" required /></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Password:</b> </td>
		<td><input type="password" name="password" /></td>
		
	</tr>
	
	<tr align="center">
	
		<td colspan="5"><input type="submit" name="submit" value="Login" /></td>
		
	</tr>

		
	</table>
		

		
	</form>


	
<?php
} else {
	require_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
 
	$admin_name = $_POST['admin_name'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from admin WHERE admin_name LIKE '{$admin_name}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<script>alert ('Username/Password incorrect') </script>";
		echo "<script>window.open ('admin.php','_self') </script>";
	} else {
		echo "<script>alert ('Login Succesfully done') </script>";
		
		echo "<script>window.open ('insert_product.php','_self') </script>";
		// do stuffs
	}
}
?>		
</body>
</html>
<html>
<head>
	<title>Contact Us Form</title>
	
	
			<link rel="stylesheet" href="styles/style2.css" media="all" />

	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	
	<script>tinymce.init({selector:'textarea'});

	</script>
	
</head>



<body>	

<?php
require_once("db_const.php");
if (!isset($_POST['submit'])) {
?>	<!-- The Contact Us form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	
	<table align="center" width="850" border="2" bgcolor="white">	
	<tr align="center">
		<td colspan="9"><h2>Contact Us Form</h2></td>
	</tr>
	
	<tr>
		<td align="right"><b>Username:</b> </td>
		<td><input type="text" name="username" size="40" required /></td>
		
	</tr>
	
		
	<tr>
		<td align="right"><b>First Name:</b> </td>
		<td><input type="text" name="first_name" size="40" required/></td>
		
	</tr>
	<tr>
		<td align="right"><b>Last Name:</b> </td>
		<td><input type="text" name="last_name" size="40" required/></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Email:</b> </td>
		<td><input type="text" name="email" size="40"required/></td>
		
	</tr>
	
	<tr>
		<td align="right"><b> Query :</b> </td>
		<td><textarea name="query"  ></textarea></td>
	</tr>
	
	
	<tr align="center">
	
		<td colspan="9"><input type="submit" name="submit" value="Submit" /></td>
		
	</tr>
	
	
		
		
		</table>
	</form>
	
	<center><b><a href="index.php">Back To Fitness</a></b><br></center>
    
		
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
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];
	$query		= $_POST['query'];
	# check if username and email exist else insert
	$exists = 0;
	$result = $mysqli->query("SELECT username from contact WHERE username = '{$username}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists = 1;
		$result = $mysqli->query("SELECT email from contact WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 2;	
	} else {
		$result = $mysqli->query("SELECT email from contact WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 3;
	}
 
	if ($exists == 1) echo "<p>Username already exists!</p>";
	else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
	else if ($exists == 3) echo "<p>Email already exists!</p>";
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `contact` (`id`, `username`, `first_name`, `last_name`, `email`, `query`) 
				VALUES (NULL, '{$username}', '{$first_name}', '{$last_name}', '{$email}' , '{$query}')";
 
		if ($mysqli->query($sql)) {
			//echo "New Record has id ".$mysqli->insert_id;
			echo "<script>alert ('Complaint registerd successfully.') </script>";
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
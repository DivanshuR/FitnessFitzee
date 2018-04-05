<!DOCTYPE>
<?php 

include("functions/functions.php");

?>

<html>
	<head>
		<title>Fitness Fitzee Shop</title>
		
		
		<link rel="stylesheet" href="styles/style1.css" media="all" />
		
		</head>
		
		
<body>



		
		<!-- Main container-->		
		<div class="main_wrapper">
			
			<!-- Navigation container ends-->
			
			
			<!-- Content container-->
			<div class="content_wrapper">
			
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					
					<?php getCats();		
					?>
					
				</ul>
			
			<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands() ; ?>
				</ul>
			
			
			
				
			</div>
			
			<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					<b><a href="index.php" style="color:black; font-size:20px;">Home</a></b>
					<a href="products.php"><button id="myBtn" style="font-size:18px;">Logout</button></a>
					<b><a href="cart.php">Go to Cart</a></b>
					</span>
					
			</div>		
					
			<div id="content_area">		
	<?php
if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">				
			<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2 align="center">Login Box</h2>
    </div>
    <div class="modal-body">
    <div align="center"><tr>
		<td align="right"><b>Username:</b> </td>
		<td><input type="text" name="username" required /></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Password:</b> </td>
		<td><input type="password" name="password" /></td>
		
	</tr>
	</div>
    </div>
    <div class="modal-footer" align="center">
      <tr>
	
		<td><input type="submit" name="submit" value="Login" /></td>
		
	</tr>
	
		<center><h3><a href="register.php">Not Yet Registered? Register here! </h3></a></center>

	
    </div>
  </div>
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
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<script>alert ('Username/Password incorrect') </script>";
		echo "<script>window.open ('products.php','_self') </script>";
	} else {
		echo "<script>alert ('Login Succesfully done') </script>";
		
		echo "<script>window.open ('lproducts.php','_self') </script>";
		// do stuffs
	}
}
?>		



<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
		
		
		
		
		
</div>

			</div>
			
			
		</div>
			
			
			</div>
			<!-- Content container ends-->
			
			<div id="products_box">
			
			<?php getPro(); ?>
			<?php getCatPro(); ?>
			<?php getBrandPro(); ?>
			<?php cart(); ?>
			
			
			</div>
			
			<div id="footer">
			
			<h2 style="text-align:center; padding-top:20px;">&copy; 2016 by Divanshu Rohatgi.All Right Reserved.</h2>
			
			</div>

				
		
		
		
		
		
		</div>
		<!-- Main container ends-->
</body>
</html>

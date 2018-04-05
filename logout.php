<!DOCTYPE>
<?php
include("functions/functions.php");
?>


<html>


	<head>
		<title>Fitness Fitzee Shop </title>
		
		
		<link rel="stylesheet" href="styles/style.css" media="all" />
		
		</head>
		
<body>
		<!-- Main container-->		
		<div class="main_wrapper">
		
			<!-- Header container-->
			<div class="header_wrapper">
				
			<a href="index.php"><img id="imagee" src="images/imagee.jpg" /> 			
			
			</div>		
		<!-- Header container ends-->	
			
			<!-- Navigation container-->						
			<div class="menubar"> 
				 				 
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="products.php">All Products</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
					
                    					
				</ul>
				
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="submit" value="Search" />
					</form>	
				
				
			</div>
				
			</div>
			
			
			<!-- Navigation container ends-->
			
			<!-- Content container-->
			<div class="content_wrapper">
			
		
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
			
			<ul id="cats">
					
					<?php getCats();?>
					
				</ul>
				
			<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands() ; ?>
					
				</ul>
			
			
			
			</div>
				
			<div id="content_area">
			
			<div id="shopping_cart">
			
				<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					 <b><a href="cart.php">Go to Cart</a></b>
					 <b><a href="login.php" style="color:black; font-size:25px;">Login</a></b>

					</span>
			
			
			</div>
			
			
			<div id="products_box">
			
			<?php getPro(); ?>
			<?php getCatPro(); ?>
			<?php getBrandPro(); ?>
			<?php cart(); ?>
			
			
			</div>
			
			
			
			<!-- Content container ends-->
		
			<div id="footer">
			
			<h2 style="text-align:center; padding-top:20px;">&copy; 2015 by Divanshu Rohatgi BCA-6.All Rights Reserved </h2>
			
			</div>

				
		
		
		
		
		
		</div>
		<!-- Main container ends-->
</body>
</html>

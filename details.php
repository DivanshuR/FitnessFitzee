<!DOCTYPE>
<?php 

include("functions/functions.php");

?>

<html>
	<head>
		<title>Fitness Fitzee Shop</title>
		
		
		<link rel="stylesheet" href="styles/style5.css" media="all" />
		</head>
		
<body>
		<div class="main_wrapper">
			
			<div id="product_box">
				
<?php			



	if(isset($_GET['pro_id'])) {
					
	$product_id=$_GET['pro_id'];
				
	$get_pro ="select * from products where product_id='$product_id'";
	
	$run_pro = mysqli_query($con,$get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)) {
		
		$pro_id =$row_pro['product_id'];
		$pro_title =$row_pro['product_title'];
		$pro_price =$row_pro['product_price'];
		$pro_image =$row_pro['product_image'];
		$pro_desc  =$row_pro['product_desc'];
		echo "
			<div id='single_product'>
			
			
			
			 <h2 align='center'> $pro_title </h2>
			
			<img src='admin_area/product_images/$pro_image' width='450' height='450'  />
			
			<p align='center'><b> Price: ₹ $pro_price </b></p>
			
			<p> $pro_desc </p>
			
			<a href='products.php' style='float:right'; font-size:20px; '> Go Back </a>
			
						
			
			</div>
			</div>
	
	";
	}
	}
	
	
?>	
				
			
			<!-- Content container ends-->
			
		</div>
		
		
		
		</div>
		<!-- Main container ends-->
</body>
</html>

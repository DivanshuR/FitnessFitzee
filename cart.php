<!DOCTYPE>



<?php


include("functions/functions.php");
?>


<html>


	<head>
		<title>Fitness Fitzee Shop </title>
		
		
		<link rel="stylesheet" href="styles/style6.css" media="all" />
		
		</head>
		
<body>
		<!-- Main container-->		
		<div class="main_wrapper">
		
	
			
			
			<!-- Navigation container ends-->
			
			<!-- Content container-->
			<div class="content_wrapper">
			
		
			
				
			<div id="content_area">
			
			<div id="shopping_cart">
			
				<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					 <b><a href="lproducts.php">Back</a></b>

					</span>
			
			
			</div>
			
			
			<div id="products_box">
			<br>
			<form action="" method="post" enctype="multipart/form-data">
			
				<table align="right" width="700"  >
				
									
				<tr>
					<th>Remove</th>
					<th>Product(s)</th>
					<th>Total Price</th>
				</tr>
				
			<?php 
			
			$total =0;
			global $con;
			
			$ip=getIp();
			$sel_price ="select * from cart where ip_add='$ip'";
			$run_price=mysqli_query($con,$sel_price);
			
			while($p_price=mysqli_fetch_array($run_price)) {
				
				$pro_id =$p_price['cart_id'];
				$pro_price ="select * from products where product_id='$pro_id'";
				$run_pro_price=mysqli_query($con,$pro_price);
				
				while($pp_price=mysqli_fetch_array($run_pro_price)) {
					
					$product_price=array($pp_price['product_price']);
					
					$product_title=$pp_price['product_title'];
					
					$product_image=$pp_price['product_image'];
					
					$single_price=$pp_price['product_price'];
					
				$values =array_sum($product_price);
				
				$total+=$values;
							
			
			
			?>			
				
				<tr align="center">
					<td><input type="checkbox"  name="remove[]" value="<?php echo $pro_id; ?> "/></td>
					<td><?php echo $product_title; ?> <br>
					
					<img src="admin_area/product_images/<?php echo $product_image;?>" width="150" height="150"/> 
					</td> 
					
					
										
					<td><?php echo "₹".  $single_price;?></td>
				</tr>
				
			<?php  } } ?>
			
				<tr> 
				
				<td colspan="4" align="right"><b> Sub Total: </b></td>
					<td colspan="4"><?php echo "₹:" .$total;?> </td> 
				
				</tr>
				
				<tr align="center">
				<td><input type="submit" name="update_cart" value="Update Cart" /></td>
				<td><input type="submit" name="continue" value="Continue Shopping" /></td> 
				<td><button><a href="order.php"> Place Order </button> </a></td>

				
				</tr>
				
				
				
			
				</table>
			</form>
			
			
			<?php
			
			
			
			global $con;
			$ip=getIp();
			
			if(isset($_POST['update_cart'])) {
				
				foreach($_POST['remove'] as $remove_id) {
						
				$delete_product="delete from cart where cart_id='$remove_id' AND ip_add='$ip'";
					
				$run_delete =mysqli_query($con,$delete_product);


					if($run_delete) {
						
						echo"<script>window.open('cart.php','_self')</script>";
					}
					
				}
				
						
			}
			
			
			if(isset($_POST['continue'])) {
				
				
						echo"<script>window.open('lproducts.php','_self')</script>";
			}
			
			
			
			
			
			?>
			
			
			</div>
			
			</div>
			
			<!-- Content container ends-->
		
			

				
		
		
		
		
		
		</div>
		<!-- Main container ends-->
</body>
</html>

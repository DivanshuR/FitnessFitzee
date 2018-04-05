<?php


include("functions/fcheck.php");
?>


<html>
<head>
	<title>Order Page</title>
</head>
<body>	
   
   	<b><a href="lproducts.php">Back To Fitness</a></b><br>
   
<?php
require_once("db_const.php");
if (!isset($_POST['submit'])) {
?>	<!-- The Checkout form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	
	<table align="center" width="750" border="2" bgcolor="orange">	
	<tr align="center">
		<td colspan="7"><h2>Order Details</h2></td>
	</tr>
	
	<tr>
		<td align="right"><b>Phone Number:</b> </td>
		<td><input type="text" name="pnumber" required/></td>
		
	</tr>
	
	<tr>
		<td align="right"><b>Home Address:</b> </td>
		<td><input type="text" name="haddress" size="40" required/></td>
		
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
					
					<img src="admin_area/product_images/<?php echo $product_image;?>" width="200" height="150"/>
					</td>
					
					
							
					
					
					
					<td><?php echo "₹".  $single_price;?></td>
				</tr>
				
			<?php  } } ?>
			
				<tr align="right"> 
				
				<td colspan="3"><b> Sub Total: </b></td>
					<td colspan="3"><?php echo "₹:" .$total;?> </td> 
				
				</tr>
				
						
				<tr align="center">
	
		<td colspan="7"><input type="submit" name="submit" value="Place Order" /></td>
		
	</tr>
			
				</table>
			</form>
			
			
			
	

   
		
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
	$pnumber		= $_POST['pnumber'];
	$haddress		= $_POST['haddress'];
	
 
	
		# insert data into mysql database
		$sql = "INSERT  INTO `order` (`id`,`pnumber`,`haddress`) 
				VALUES (NULL,'{$pnumber}','{$haddress}')";
 
		if ($mysqli->query($sql)) {
			//echo "New Record has id ".$mysqli->insert_id;
			echo "<script>alert ('Your order has been placed successfully.') </script>";
		echo "<script>window.open ('lproducts.php','_self') </script>";
			
			
			
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	
}
?>		
</body>
</html>
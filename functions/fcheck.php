<?php

$con =mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno())
	
	{
		echo"Failed to connect:" .mysqli_connect_error();
	}
	
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
	
}	


 function cart() {
	
	if(isset($_GET['add_cart'])) {
		
		global $con;
		
		
		$Ip=getIp();
		$pro_id =$_GET['add_cart'];
		$check_pro= "select * from cart where ip_add='$Ip' AND cart_id='$pro_id'";
		
		$run_check=mysqli_query($con, $check_pro);
		
		if(mysqli_num_rows($run_check)>0) {
			
			echo " ";
		}
		else {
			$insert_pro="insert into cart (cart_id,ip_add) values ('$pro_id','$Ip')";
			
			$run_pro=mysqli_query($con,$insert_pro);
							
			echo"<script>window.open('products.php','_self')</script>";
			
			}

		}
			
	}
	
	
?>	
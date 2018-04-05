<!DOCTYPE html>
<html>

<head>
		<title>Fitness Fitzee Shop </title>
		
		
		<link rel="stylesheet" href="styles/style.css" media="all" />
		
		</head>

<body>


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="overlay-content">
    <a href="products.php">Products</a>
	<a href="services.php">Services</a>
	<a href="about.php">About</a>
    <a href="contact.php">Contact Us</a>
  </div>
</div>

<div align="center">
<font size="15" color="orange">You are just One Click Away.</font>
</div>

<div align="center" id="start">
<span style="font-size:60px;cursor:pointer;text-align:center;color:orange" onclick="openNav()" >START</span>
</div>
<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>
     
</body>
</html>

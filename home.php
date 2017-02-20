<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "garbro2741";
	$dbpass = "open123";
	$dbname = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if(mysqli_connect_errno()){
		die("Database could not be accessed. " . mysqli_connect_error() . mysqli_connect_errno());
	}
	
	$role = 0;
	if((isset($_SESSION['login']) && $_SESSION['login'] != '')){
		$user = $_SESSION['login'];
		$adminQuery = "SELECT * FROM login WHERE login_name = '$user';";
		$result = mysqli_query($connection, $adminQuery);
		$data = mysqli_fetch_assoc($result);
		$role = $data['login_role'];
		mysqli_close($connection);
	}
?>

<?xml version="1.0" encoding="UTF-8" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<link href="dream.css" rel="stylesheet" type="text/css" />

<title>The Scooter Squad</title>

</head>

<body>
	<div id="newBody">

 <div id="header">
 <img class="space" src="logo.png" alt="Logo" /></div>
 
 <div class="one">  
	<h1>The Scooter Squad</h1>
 </div>
 <br />

   
<hr class="stop" />


 <div class="nav">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">All Products</a></li>
					<?php
					if($role == 1){
					?>
                    <li><a href="registerItem.php">Register Item</a></li>
					<?php
					}
					?>
					<li><a href = "newUser.php">New User</a></li>
					<li><a href = "login.php">Login</a></li>
					<?php
					if(isset($_SESSION['login'])){
					?>
					<li><a href = "sessionLogout.php">Log Out</a></li>
					<?php
					}
					?>
                </ul>
            </div>
<hr class="stop" />





<div class="test">

<img id="myBanner" src="banner/pic1.png" alt="banner"/>
<script type="text/javascript" src="slideshow.js">

</script>

</div>
<hr class="stop" />

<h3 class="mainPic">Deals</h3>

<div style = "width: 100%">
<div class="homePicLeft">
<a href="products.php"><img src="homescooter/buddy125.png" height="300px" width="278px"
			alt="Luxury Sport" onmouseover="this.src='homescooter/buddy125d.png'"
			onmouseout= "this.src='homescooter/buddy125.png'" /></a><br />
<a href="products.php"><img src="homescooter/buddy125a.png" alt="Mountain View;">
<a href="products.php"><img src="homescooter/buddy125b.png" alt="Mountain View;">
<a href="products.php"><img src="homescooter/buddy125c.png" alt="Mountain View;"></a><br />


			
<p><strong><a href ="products.php">Buddy</a></strong><br/>
First time scooter owners and seasoned <br /> 
veterans agree: the Buddy 125 has won their <br />
hearts with its seamless blend of modern  <br />
technology, power and vintage style.<br /><br />


Filled with personality and performance, the  <br />
Buddy 125 comes in Genuine’s signature bright <br />
colors and has a bigger engine for a more  <br /> 
powerful ride. Glide through busy traffic with  <br />
ease, climb the steepest hills and take long <br />
weekend cruises.<br /><br />


Hold on tight and bring your sunscreen!</p>

</div>



<div class="homePicRight">
<a href="products.php"><img src="homescooter/stella.png" height="300px" width="278px"
			alt="Luxury Sport" onmouseover="this.src='homescooter/stellad.png'"
			onmouseout= "this.src='homescooter/stella.png'" /></a><br />
<a href="products.php"><img src="homescooter/stellaa.png" alt="Mountain View;">
<a href="products.php"><img src="homescooter/stellab.png" alt="Mountain View;">
<a href="products.php"><img src="homescooter/stellac.png" alt="Mountain View;"></a>

<p>
<strong><a href = "products.php">Stella</a></strong><br/>
Stella, our first love. She’s all grown up and<br />
the only metal bodied vintage scooter in <br />
America.<br /><br />

She shifts like a sports car and gets 140mpg <br />
in the city. Her four stroke engine makes <br />
Stella one of the cleanest, greenest scooters  <br />
out there. Her vintage colors and retro vibe <br />
remain the same.<br /><br />

She’s a timeless beauty, at home in any <br />
decade.<br /><br />

</p>

</div>
</div>

<hr class="stop" />

<h3 class="mainPic">About Our Company</h3>
<blockquote>
<p class="mainPara"> The Scooter Squad was founded by a group of three in 2000. They had one thing in mind: Make scooters more easily available.


The confidence Scooter Squad has in its scooter brands is backed up with a 2-year Genuine Confidence Warranty and Roadside Assistance Program.
 This program is supported by a network of Genuine Authorized Dealers across the country. So wherever you are, you’re not far from someone you can trust to assist you no matter what brand you chose.


Scooter Squad’s love of scooters has remained the same since those humble beginnings all those years ago. 
We want everyone to feel the same passion and excitement that we do when we take one of our scooters for a ride. So what are you waiting for?


Join the Squad!
</p>
</blockquote>


<h4 class="move">
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
</h4>

<hr class="stop" />





<?php include("inc_footer.php"); ?>
<br />

</div>
</body>
</html>
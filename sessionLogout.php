<?php
	session_start();
	$_SESSION = array();
	session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Logout</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link href = "dream.css" rel = "stylesheet" type = "text/css" />
	</head>

	<body>
		<div id="newBody">

 <div id="header">
 <img class="space" src="logo.png" alt="Logo" />
 </div>
 
 <div class="one">  
	<h1>The Scooter Squad</h1>
 </div>
 <br />

   
<hr class="stop" />


 <div class="nav">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">All Products</a></li>
					<li><a href = "newUser.php">New User</a></li>
					<li><a href = "login.php">Login</a></li>
                </ul>
            </div>
<hr class="stop" />





<div class="test">

<img id="myBanner" src="banner/pic1.png" alt="banner"/>
<script type="text/javascript" src="slideshow.js">

</script>

</div>
<hr class="stop" />

<div style = "width: 100%" height = "450px">
	<p>You have successfully logged out</p>
	<p>Thank you and have a great day!</p>
</div>

<hr class="stop" />

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
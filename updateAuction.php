<?php //establishes database connection
	session_start();

	$dbhost = "localhost";
	$dbuser = "garbro2741";
	$dbpass = "open123";
	$dbname = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$owner = $_SESSION['login'];
	
	if(mysqli_connect_errno()){
		die("Database could not be accessed. " . mysqli_connect_error() . mysqli_connect_errno());
	}
	
	$prodId = $_POST['id'];
?>

<?php //inserts data into the database from the form in registerItem.php
	$productName = $_POST['itemName'];
	$description = $_POST['description'];
	$picture = $_POST['new_picture'];
	
	$query = "UPDATE product SET prod_name = '$productName', prod_description = '$description', prod_picture = '$picture' WHERE prod_id = '$prodId';";
	
	$result = mysqli_query($connection, $query);
	
	if($result){
		$message = "<p>Thank you for updating your item(s) for auction.</p>\n" . 
		"<p><a href = 'products.php'>View Products Page</a></p>";
	}
	else{
		die("Database entry was not added: " . mysqli_connect_error($connection));
		echo "<p><a href = 'registerItem.php'>Return to item register</a></p>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Auction Item Update</title>
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
                    <li><a href="registerItem.php">Register Item</a></li>
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

<div style = "width: 100%" height = "450px">
	<?php
		echo "$message";
	?>
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

<?php
	mysqli_close($connection);
?>
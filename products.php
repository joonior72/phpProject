<?php
	session_start();
	
	if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header ("Location: login.php");
	}
?>

<?php
	$dbhost = "localhost";
	$dbuser = "garbro2741";
	$dbpass = "open123";
	$dbname = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if(mysqli_connect_errno()){
		die("Database connection failed" . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
	}
	
	$role = 0;
	if((isset($_SESSION['login']) && $_SESSION['login'] != '')){
		$user = $_SESSION['login'];
		$adminQuery = "SELECT * FROM login WHERE login_name = '$user';";
		$result = mysqli_query($connection, $adminQuery);
		$data = mysqli_fetch_assoc($result);
		$role = $data['login_role'];
	}
?>

<?php
	$query = "SELECT * FROM PRODUCT";
	$results = mysqli_query($connection, $query);
	
	if(!$results){
		die("Database query failed.");
	}
?>

<?xml version="1.0" encoding="UTF-8" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<link href="dream.css" rel="stylesheet" type="text/css" />

<title>Products</title>

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

	<div style = "width: 100%">
		<?php
		while($product = mysqli_fetch_assoc($results)){
			
			$today = date("Y-m-d");
			$endDate = $product['prod_end'];
			$startDate = $product['prod_start'];
			$timeUntil = strtotime($today) - strtotime($startDate);
			$timeLeft = strtotime($endDate) - strtotime($today);
			$days = ((($timeLeft/60)/60)/24) . " days";
			if($days == 0){
				$days = "This is the last day!";
			}
			
			if($timeLeft >= 0 && $timeUntil >= 0){
		?>
			<div class = "productsBox">
				<div class = "productPicture">
					<img src = "<?php echo $product['prod_name']?>prod.jpg"/> <!--Make sure you fix the link here-->
				</div>
				
				<div class = "productName">
					<a href = "<?php echo $product['prod_name']?>.php"><?php echo $product['prod_name']?></a> <!--Make sure you fix the link here-->
				</div><br/>
				
				<div class = "productPrice">
					<strong style = "font-size: 170%">$<?php echo $product['prod_price']?></strong>
				</div><br/>
				
				<div class = "productBuy">
					<a class = "linkButton" href = "<?php echo $product['prod_name']?>.php">Bid on this</a> <!--Make sure to fix the link here-->
				</div><br/>
				
				<div class = "productTime">
					<strong>Time Left:</strong><br/>
					<strong><?php echo "$days" ?></strong> <!--I want to add hours too, but always get 0? frustrating-->
				</div>
			</div><hr/>
		<?php
			}
		}
		mysqli_close($connection);
		?>
	</div>

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
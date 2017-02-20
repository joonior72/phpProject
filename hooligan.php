<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "garbro2741";
	$dbpass = "open123";
	$dbname = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$topBidder = "";
	
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
	}
	
	$product = "Hooligan";
	$query = "SELECT * FROM PRODUCT WHERE prod_name = '$product';";
	$result = mysqli_query($connection, $query);
	$productInfo = mysqli_fetch_assoc($result);
	$price = $productInfo['prod_price'];
	
	if(!$result){
		die("Database query failed.");
	}
	
	$bidderQuery = "SELECT * FROM bid WHERE bid_product = '$product' AND bid_amount = '$price';";
	$bidderResult = mysqli_query($connection, $bidderQuery);
	$bidderInfo = mysqli_fetch_assoc($bidderResult);
	$topBidder = $bidderInfo['bid_user'];
?>

<?xml version="1.0" encoding="UTF-8" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<link href="dream.css" rel="stylesheet" type="text/css" />

<title>Hooligan</title>

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

<div style = "width: 100%" height = "450px">
	<div class = "individualPicture">
		<img src = "hooliganprod.jpg" alt = "Hooligan"/>
	</div>
	
	<div class = "individualName">
		<strong><?php echo $productInfo['prod_name'] ?></strong>
	</div>
	
	<div class = "individualPrice">
		<strong style = "font-size: 170%">$<?php echo $productInfo['prod_price']?></strong><br/><strong>Current top-bidder: <?php echo "$topBidder"?></strong>
	</div>
	
	<div class = "individualRemaining">
		<strong>Stock Remaining: <?php echo $productInfo['prod_inventory']?></strong>
	</div>
	
	<div class = "individualDescription">
		<strong>Description: <?php echo $productInfo['prod_description']?></strong>
	</div>
	
	<div class = "individualBid">
		<form action = "bid.php" method = "post" name = "bidForm">
			<p>Place new bid:<br/><input type = "text" name = "bidAmount" /></p>
			<p>Quantity Desired:<br/><input type = "text" name = "bidQuantity" /></p>
			<input type = "submit" value = "Bid" />
			<input type = "reset" value = "Clear" />
			<input type = "hidden" name = "bidProduct" value = "<?php echo $product?>" />
		</form>
	</div>
	<?php
		$id = $productInfo['prod_id'];
		$owner = $productInfo['prod_owner'];
		if($owner == $user){
	?>
		<div class = "modifyAuction">
		<form action = "updateItem.php" method = "post" name = "updateLinkForm">
			<input name = "id" type = "hidden" value = "<?php echo '$id'?>" />
			<input type = "submit" value = "Update Auction"/>
		</form>
		</div>
	<?php
		}
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
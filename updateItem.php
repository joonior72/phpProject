<?php
	session_start();
	
	if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header ("Location: login.php");
	}
	
	$dbhost = "localhost";
	$dbuser = "garbro2741";
	$dbpass = "open123";
	$dbname = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$id = $_POST['id'];
	
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
		mysqli_close($connection);
	}
?>

<?xml version="1.0" encoding="UTF-8" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<link href="dream.css" rel="stylesheet" type="text/css" />

<title>Auction Item Update</title>

<script type="text/javascript">
/* <![CDATA[ */
function validateForm( )
{

if ( document.uploads[0].itemName.selectedIndex == 0 )
    {
        window.alert ( "Your form cannot contain empty sections" );
        return false;
    }
	

if ( document.uploads[0].startingPrice.selectedIndex == 0 )
    {
        window.alert ( "Your form cannot contain empty sections" );
        return false;
    }
	

if ( document.uploads[0].available.selectedIndex == 0 )
    {
        window.alert ( "Your form cannot contain empty sections" );
        return false;
    }

if (document.uploads[0].auctionStart.value == "" )
  
    {
        window.alert ( "Your form cannot contain empty sections" );
        return false;
    }
	
if (document.uploads[0].auctionEnd.value == "" )
  
    {
        window.alert ( "Your form cannot contain empty sections" );
        return false;
    }
	
if (document.uploads[0].description.value == "" )
  
    {
        window.alert ( "Your form cannot contain empty sections" );

        return false;
    }
	
    }
return true; 
}
/* ]]> */
</script>

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

<div style = "width: 100%">
	<?php
		if($role != 1){
	?>
		<p>You are not authorized to access this page.</p>
		<p><a href = "login.php">Log in</a></p>
	<?php
		}
		else{
	?>
	<div class = "registerItemBox">
		<form name = "updateForm" action = "updateAuction.php" method = "post">
			<h2>Update your Auction</h2>
			<p>Item Name:<br/>
			<input type = "text" name = "itemName"/></p>
			<p>Description:<br/>
			<textarea name = "description"></textarea></p>
			<p>Upload Picture:<br/>
			<input type = "file" name = "new_picture" /><br/></p>
			<p><input type = "submit" value = "Create Auction" />
			<input type = "reset" /></p>
			<input type = "hidden" name = "id" value = "<?php echo '$id'?>"/>
			</p>
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
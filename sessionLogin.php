<?php
	session_start();
?>

<?php //establishes database connection
	$dbhost = "localhost";
	$dbuser = "garbro2741";
	$dbpass = "open123";
	$dbname = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(mysqli_connect_errno()){
		die("Database could not be accessed. " . mysqli_connect_error() . mysqli_connect_errno());
	}
	else{
		$query = "SELECT * FROM login WHERE login_name = '$username' AND login_password = '$password'";
		$result = mysqli_query($connection, $query);
		$data = mysqli_fetch_assoc($result);
		$lockout = $data['locked'];
		$role = $data['login_role'];
		
		if($lockout >= 3){
			$message = "<p>You have been locked out due to too many unsuccessful login attempts.</p>" . 
			"<p>Please contact a systems administrator.</p>";
		}
		else{
			if(mysqli_num_rows($result) == 0){
				$query = "UPDATE login SET locked = locked + 1 WHERE login_name = '$username';";
				mysqli_query($connection, $query);
				$message = "<p>You did not enter the correct username/password.</p>" .
				"<p><a href = 'login.php'>Return to log in page</a></p>";
			}
			else{
				if($role == 1){
					$_SESSION["login"] = $username;
					$_SESSION["role"] = "seller";
					$message = "<p>You have successfully logged in as a seller.</p>" . 
					"<p><a href = products.php>Go to Products page</a></p>";
				}
				else{
					$_SESSION["login"] = $username;
					$_SESSION["role"] = "buyer";
					$message = "<p>You have successfully logged in as a buyer.</p>" . 
					"<p><a href = products.php>Go to Products page</a></p>";
				}
			}
		}
	}
	
	$role = 0;
	if((isset($_SESSION['login']) && $_SESSION['login'] != '')){
		$user = $_SESSION['login'];
		$adminQuery = "SELECT * FROM login WHERE login_name = '$user';";
		$result = mysqli_query($connection, $adminQuery);
		$data = mysqli_fetch_assoc($result);
		$role = $data['login_role'];
	}
	
	mysqli_close($connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Login</title>
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


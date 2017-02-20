<?php
	session_start();
	
	if((isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header ("Location: alreadyLoggedIn.php");
	}
	
	$role = 0;
?>

<?xml version="1.0" encoding="UTF-8" ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<script type="text/javascript">
/* <![CDATA[ */
function validateForm( )
{
	if( document.newUserForm.loginName.value == "")
	{
		alert("All fields are required.");
		return false;
	}
		if( document.newUserForm.password.value == "")
	{
		alert("All fields are required.");
		return false;
	}
		if( document.newUserForm.confirmPassword.value == "")
	{
		alert("All fields are required.");
		return false;
	}
	if(document.newUserForm.password.value != document.newUserForm.confirmPassword.value)
	{
		alert("Your passwords do not match");
		return false;
	}
	return true;
 
}
/* ]]> */
</script>


<link href="dream.css" rel="stylesheet" type="text/css" />

<title>New User Sign-Up</title>



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
	<div class = "newUserBox">
		<h2>New User Registration</h2>
		<div class = "newUserForm">
			<form action = "registerNewUser.php" onSubmit="return validateForm();" method = "post" name = "newUserForm">
				<p>Username:<br/>
				<input type = "text" name = "loginName" /></p>
				<p>Password:<br/>
				<input type = "password" name = "password" /></p>
				<p>Confirm Password:<br/>
				<input type = "password" name = "confirmPassword"/></p>
				<p>Role:<br/>
				<select name = "role">
					<option value = "buyer">Buyer</option>
					<option value = "seller">Seller</option>
				</select></p>
				<input type = "submit" value = "Create Account" />
				<input type = "reset"/>
			</form>
		</div>
	</div>
	<div class = "existingUserBox">
		<form>
		<p>Already a user?<br/></p>
		<a class = "linkButton" href= "login.php">Login</a>
		</form>
	</div>
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
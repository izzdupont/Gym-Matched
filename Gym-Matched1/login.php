<!-- This page should allow valid users to log in with valid credentials. 
Username and Password must match the database. 
If an error occurs, it should send an error message..-->

<?php
   ob_start();
   session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
    <link rel="stylesheet" href="MainCSS.css">
		<style>
	#container {width:100%; text-align:center;}
	body{
		background-image: url('img/loginBG');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		}
	fieldset {
		border: 1px solid #00FFFF;
		width: 400px;
		background: #084DA9;
		padding: 3px;
	}
	fieldset legend {
		background: #CCA383;
		padding: 6px;
		font-weight: bold;
	}
	label {
		color: white;
		font-weight: bold;
		display: block;
		width: 150px;
		float: middle;
	}
	label:after { content: ": " }
	h1 {
		color: #33FFE6;
        font-size: 50px;
	}
		</style>
	</head>
	<body>
    <div class="gallery">
    <a href="index.php">
        <img src="img/logo2" alt="blank" width="300" height="300">
    </a>
    </div>

	<center>
	<br>
    <br>
    <br><br><br><br>
    <br><br><br><br><br>
	<h1 class="center" style="font-family:monaco,Consolas,Lucida Console,monospace;">Welcome to Gym-Matched</h1>
	<br>

    <?php if (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 1) { ?>
    <span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > Incorrect Login: Please Sign In Below </span>
    <?php } elseif (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 2) { ?>
    <span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > Unathorized User: Please Sign In </span>
    <?php } elseif (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 3) { ?>
    <span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > You Have Logged Out </span>
    <?php } ?>

	<br>
	<br>
	<h2 class="center" style="color:#B8FF33;">Log in bellow to continue</h2>
	<form method="POST" action="auth.php">
	<fieldset>
		<label for="user">Username</label>
		<br/>
		<input type="text" id="user" name="Username">
		<br/>
		<br/>
		<label for="pass">Pass</label>
		<br/>
		<input type="password" id="pass" name="pass">
		<br/>
		<br/>
		<input type="submit" name="loggin" value="Log Me In!!">
		<br/>
		<br/>
		<p style="color: white">New User?  <a href="signup.php" style="color:#cf271b">Sign Up Here</a>.</p>

	</fieldset>
	</form>

	</center>
    <?php
    session_unset();

    session_destroy();
    ?>
	</body>
</html>
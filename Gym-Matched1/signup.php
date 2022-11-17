<!-- This page should allow new user to create a new valid user with a unique username. 
If there is an error such that the username is taken, it should show an error message. -->

<?php
   ob_start();
   session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="MainCSS.css">

<title> Sign Up </title>
<style> 


</style>
</head>
<body bgcolor="#A7B3C3">
<ul>
<li style="border: none"><b>
<div class="topnav">
<br> 
<span>Welcome to Gym-Matched</span>
<br><br>
</div>
</b>
</li>
</ul>

<div class="gallery">
  <a href="login.php">
    <img src="img/logo1" alt="blank" width="200" height="120">
  </a>
</div>

<br>
<br>
<div>

<center>


<div class="logbox">


 <?php if (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 1) { ?>
<span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > Passwords Must Match </span>
<?php } elseif (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 2) { ?>
<span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > Login Taken </span>
<?php } elseif (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 3) { ?>
<span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " >  </span>
<?php } ?>


<br>
<br>
<form method="post" action="suauth.php">	</span>

Enter First Name : 
<br>
<input type="text" name="fname" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F1']; } ?>" required>
<br>

Enter Last Name : 
<br>
<input type="text" name="lname" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F2']; } ?>" required>
<br>

Enter Email : 
<br>
<input type="text" name="email" placeholder="joe@example.com" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F3']; } ?>" required>
<br>

Enter Username : 
<br>
<input type="text" name="username" required>
<br>

Enter Password : 
<br>
<input type="password" name="Password1" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F4']; } ?>" required>
<br>

Re-Enter Password : 
<br>
<input type="password" name="Password2" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F5']; } ?>" required>
<br>

<br>
 <input type="submit">

</form>
</div>

 </center>


<?php
session_unset();

session_destroy();
?>


</body>


</html>
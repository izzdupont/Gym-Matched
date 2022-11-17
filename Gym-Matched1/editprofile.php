<!-- This page should allow users to input data and send 
it to the epauth.php to be authenticated with the database. 
Should be able to retain the input if there is an error 
while the data is being sent to the database.
This page consist of topnav menu to navigate through the page-->

<?php
include 'elements/db.php';
ob_start();
session_start();

?>
<html>
<head>
<link rel="stylesheet" href="MainCSS.css">
<title>Edit Profile</title>
<style> 
select {
border: 2px solid black;
width: 75%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
font-size: .8em;
color: black;
}
input[type=text] {
border: 2px solid black;
width: 75%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
font-size: .8em;
color: black;
}
input[type=password] {
border: 2px solid black;
width: 75%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
font-size: .8em;
color: black;

}
#container {width:100%; text-align:center;}
      .topnav {
      background-color:#084DA9;
      overflow: hidden;
      position: relative;
      display: inline-block;

      }
      .topnav a{
          float: left;
          color: #c7e1db;
          text-align: center;
          padding: 12px 50px;
          text-decoration: none;
          font-size: 17px;
      }
      .topnav a:hover{
          background-color: #ddd;
          color: #1d77dd;
      }
      .topnav a.active{
          background-color: #ec5e5e;
          color: white;
      }
              

      @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
          float: right;
          display: block;
      }
      }

      @media screen and (max-width: 600px) {
      .topnav.responsive {position: relative;}
      .topnav.responsive .icon {
          position: absolute;
          right: 0;
          top: 0;
      }
      .topnav.responsive a {
          float: none;
          display: block;
          text-align: left;
      }
      }
</style>
</head>
<?php 
$str = $_SESSION['User_Name'];
$name = explode(".",$str,-1);
$name2 = explode(".",$str);

?>
<body bgcolor="#A7B3C3">	
<ul>
<?php
if ($_SESSION['UserA'] == 1) { ?>


<li><b>
	<div class="topnav">
		<a href="menu.php">Menu</a>
		<a class="active" href="profile.php">Profile</a>
		<a href="search.php">Search</a>
		<a href="#notification">Notification</a>
		<a href="#calculator">Calories & BMI Calculator </a>
		<a href="locator.php">Gym Locator </a>
		<a href="logout.php"> Not <?php echo $_SESSION['User_Name'] ?>?  Logout Here</a>	
	</div>
</b></li>

</UL>
<center>
<div class="gallery">
    <img src="img\logo1.png"  alt="blank" width="150" height="120">
</div>
<br>
<br>
<div class="logbox">
<?php if (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 1) { ?>
<span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > Passwords Must Match </span>
<?php } elseif (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 2) { ?>
<span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " > Name Is Already In Use </span>
<?php } elseif (isset($_SESSION['ErrorReason']) and $_SESSION['ErrorReason'] == 3) { ?>
<span style= "font-weight: bold; font-style: italic; font-variant: normal; font-size: 0.75em; font-family: Arial, Helvetica, sans-serif; color: red; " >  </span>
<?php } ?>
<form action="epauth.php" method="post" class="contact-form">

<h1> EDIT PROFILE </h1>

<hr size="25%" color="black">

<h3> Personal Information:  </h3>

Enter First Name : 
<br>
<input type="text" name="fname"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F1']; } ?>">
<br>

Enter Last Name : 
<br>
<input type="text" name="lname" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F2']; } ?>">
<br>

Enter Age : 
<br>
<input type="text" name="Age" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F3']; } ?>">
<br>

Enter Gender : 
<br>
<!--<input type="text" name="Gender" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F4']; } ?>">-->
<select name="Gender">
<?php
  include 'list/listofgender.txt';
?> </select>
<br>

Enter Email : 
<br>
<input type="text" name="email"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F5']; } ?>">
<br>

Phone Number : 
<br>
<input type="text" name="phone"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F6']; } ?>">
<br>

<br>
Location 
<br><br>
City:
<br>
<!--<input type="text"  name="City"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F7']; } ?>">-->
<select name="City">
<?php
  include 'list/listofcity.txt';
?> </select>
<br><br>
<h3> Workout </h3>
Workout Level:
<br>
<!--<input type="text"  name="workout_level"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F8']; } ?>">-->
<select name="workout_level">
<?php
  include 'list/workoutlevellist.txt';
?>
</select>
<br> </select>
<br><br>
Workout Time:
<br>
<!--<input type="text"  name="workout_time"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F9']; } ?>">-->

<select name="workout_time">
<?php
  include 'list/workouttimelist.txt';
?>
</select>
<br> </select>
<br><br>

<br><br>
Enter Password to make changes:
<input type="password" id="EditPassword" name="EditPassword" class="EditPassword" require>
<br>
<input type="password" id="EditCPassword" name="EditCPassword" class="EditCPassword" require>
<br>
<input type="submit">
<input type="button" name="curprof" class="curprof" value="Profile" onClick="window.location.href='profile.php';" /> 
<br>
<br></center>
</form>
</div>
</body>
<html>
<?php
  } else {
          echo "Error Getting Profile";
  }





?>

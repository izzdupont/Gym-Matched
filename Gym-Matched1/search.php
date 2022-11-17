<?php
include 'elements/db.php';
ob_start();
session_start();

?>
<html>
<head>
<link rel="stylesheet" href="MainCSS.css">
<title>User Search</title>
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
		<a href="profile.php">Profile</a>
		<a class="active" href="search.php">Search</a>
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

<form action="searchauth.php" method="post" class="contact-form">

<h1> SEARCH YOUR GYM MATCHED </h1>

<hr size="25%" color="black">

<br><br>

Enter Gender : 
<br>
<!--<input type="text" name="Gender" <?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F10']; } ?>">-->
<select name="SGender">
<?php
  include 'list/listofgender.txt';
?> </select>
<br>



<h3> Workout </h3>
Workout Level:
<br>
<!--<input type="text"  name="workout_level"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F11']; } ?>">-->
<select name="Sworkout_level">
<?php
  include 'list/workoutlevellist.txt';
?>
</select>
<br> </select>
<br><br>
Workout Time:
<br>
<!--<input type="text"  name="workout_time"<?php if (isset($_SESSION['ErrorReason'])) { ?> value= "<?php echo $_SESSION['F12']; } ?>">-->

<select name="Sworkout_time">
<?php
  include 'list/workouttimelist.txt';
?>
</select>
<br> </select>
<br><br>


<input type="submit">

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

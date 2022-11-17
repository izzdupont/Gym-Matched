<!-- This page should allow valid users to access this page 
where a basic HTML short instruction how to use this page.
This page consist of topnav menu to navigate through the page.-->

<?php
   ob_start();
   session_start();
  include 'elements/db.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="MainCSS.css">


<title> Home Page </title>
<style>
.logo {

  margin: auto;
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Error";
	exit();
}

$login = $_SESSION['User_Name'];
$sql = "SELECT userType FROM user where username = '$login'";
$result = mysqli_query($conn, $sql);
// Check connection
$row = mysqli_fetch_assoc($result);
if (($result) == "ValidUser") {$_SESSION['UserA'] = 1;}


?>

<ul>
<?php
 if ($_SESSION['UserA'] == 1) { ?>


<li><b>
	<div class="topnav">
		<a class="active" href="menu.php">Menu</a>
		<a href="profile.php">Profile</a>
		<a href="search.php">Search</a>
		<a href= "Notification.php">Notification</a>
		<a href="#calculator">Calories & BMI Calculator </a>
		<a href="locator.php">Gym Locator </a>
		<a href="logout.php"> Not <?php echo $_SESSION['User_Name'] ?>?  Logout Here</a>	
	</div>
</b></li>

</ul>
<?php  } else {
 $_SESSION['ErrorReason'] = 2;
	    header('Location: login.php');

} ?>


<body bgcolor="#A7B3C3">	

<center>

<div class="gallery">
    <img src="img\logo1.png"  alt="blank" width="150" height="120">
</div>

	<br>	
	<br>
	<h1> Welcome to Gym Matched V1.1. . . . </h1> <br>
    <div class="logbox">
    <h1> How to..... </h1>
    <p>To ensure more accurate matching system, please fill up all the necessary data in your profile </p>
    <br>
    <p>All personal data are protected from other users </p>
    <p> When both user agree to match, contact information will be available to both user </p>
    </div>
</center>

</body>

</html>
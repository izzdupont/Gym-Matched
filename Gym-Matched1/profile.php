<!-- This page should grab the login user data from the database 
and display the correct data to the interface.
This page consist of topnav menu to navigate through the page.-->

<?php
include 'elements/db.php';
ob_start();
session_start();
?>
  <!DOCTYPE HTML>
  <html>
  <head>
  <body bgcolor="#A7B3C3">	
  
  <title> Profile Display </title>
  <style> 
  
  .logbox {
    border: 10px solid black;
    margin-top: 5%;
    padding-top:2%;
    margin-bottom: 15%;
      padding-bottom:2%;
    margin-right: 35%;
    margin-left: 35%;
    background-color: #0b524b;
  font-size: 1.0em;
    color: white;
    font-weight: bold;
  }
  
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
  
  <link rel="stylesheet" href="MainCSS.css">
  </head>
  <?php 
  $str = $_SESSION['User_Name'];
   $name = explode(".",$str,-1);
    $name2 = explode(".",$str);
    
  ?>
  <body>
  <?php
   if ($_SESSION['UserA'] == 1) {
  
   } 
  else {
   $_SESSION['ErrorReason'] = 2;
              header('Location: login.php');
  
  } ?>
  <ul>
  <?php
   if ($_SESSION['UserA'] == 1) { 
  
     ?>
    
    <li><b>
	<div class="topnav">
		<a href="menu.php">Menu</a>
		<a class="active" href="profile.php">Profile</a>
		<a href="search.php">Search</a>
		<a href="Notification.php">Notification</a>
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
  
  </ul>
  <div class="gallery">
    <img src="img\logo1.png"  alt="blank" width="150" height="120">
</div>
  
  <?php
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if (mysqli_connect_errno()) {
    echo "Connect failed: ".mysqli_connect_error();
    exit();
  }
  
  $login = $_SESSION['User_Name'];
  $sql = "SELECT * FROM user where username = '$login'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  
  
  ?>
  <center>
  
  
  <div class="logbox">
  <form action="profile.php" method="GET" class="contact-form">
  <h1> PROFILE </h1>
  
  <hr size="25%" color="black">
  
  <h3> Personal Information :  </h3>
  <br>
  Username: <br>
  <b> <?=$row['username'] ?> </b><br>
  ====
  <br><br>
  Location (city): <br>
  <b> <?=$row['City'] ?> </b>
  <br>
  ====
  <br><br>
  Gender: <br>
  <b> <?=$row['Gender'] ?> </b>
  <br> 
  ====
<br><br>
Age: <br>
<b> <?=$row['Age'] ?> </b>
<br>
====
<br><br>
Worktout Level: <br>
<b> <?=$row['workout_level'] ?> </b>
<br>
====
<br><br>
Workout Time: <br>
<b> <?=$row['workout_time'] ?> </b>
<br>
====

<br><br>
  <?php
  }
  else {
    echo "No records found";
  }

  ?>

  <hr size="25%" color="black">
  <input type="button" name="edit" class="edit" value="Edit Profile" onClick="window.location.href='editprofile.php';" /> 
  </form>
  </div>
  

  </center>
  </body>
  </html>
  <?php
  
  $result->free();  
  ?>


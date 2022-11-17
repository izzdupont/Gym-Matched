<!-- This page should grab the login user match data from the database 
and display the correct data to the interface.
This page consist of topnav menu to navigate through the page -->

<?php
include 'elements/db.php';
ob_start();
session_start();
?>
  <!DOCTYPE HTML>
  <html>
  <head>
  <body bgcolor="#A7B3C3">	
  
  <title>Notification </title>
  <style> 
  
table, th, td {
  table-layout:fixed;
  border: 1px solid black;
	border-collapse: collapse;
	width: 70%;
}

th, td {
  text-align: left;
  padding: 8px;
}

table.center{
  margin-left:auto;
  margin-right:auto;
}

tr:nth-child(even){background-color: }

th {
  background-color: 	#084DA9;
  color: white;
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
		<a href="profile.php">Profile</a>
		<a href="#search">Search</a>
		<a class ="active" href="Notification.php">Notification</a>
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
  $query1= "SELECT requestor FROM matched WHERE requestee ='".$_SESSION['User_Name']."'"; 
  $matching = $conn->query($query1);
  
  
  ?>
  <center>

  <form action="notification.php" method="GET" class="contact-form">
  <h1> Notification </h1>
  <hr size="25%" color="black">

  <table id ="notification" class="sortable">
  <tr> 
        <th onclick="js.sort('#Notification', 'item', 'td:nth-child(1)')">Matched User </th>
  </tr>
  <?php
if (mysqli_num_rows($matching) > 0) {

  while ($matched = $matching->fetch_row()){
    $sql2 = "SELECT requestee FROM matched WHERE requestor = '".$_SESSION['User_Name']."'";
    $row = $conn->query($sql2);
    $row = $row->fetch_row(); 
?>
  <tr class="item">
    <td> <span style="color: black;"><?=$row[0]?> </span></td>
 </tr>
 <?php
  }
}
else {
  echo "No records found";
}
$matching->free();
$conn->close();
?>

</table>
</form>

</div>
</center>

</body>

</html>

<!-- This page should validate with the database if the password and username is matched. 
Redirect the user to the home page if valid or back to the sign in page if it is invalid..-->

<?php
   ob_start();
   session_start();
   include 'elements/db.php';
$_SESSION['User_Name'] = $_POST['Username'];

?>
<!DOCTYPE HTML>
<html>
<head>

<title> auth </title>

<link rel="stylesheet" href="MainCSS.css">
</head>




</html>

<body>

<?php


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Error";
	exit();
}

$login = mysqli_real_escape_string($conn, $_POST['Username']);


$sql = "SELECT username, userType, phash FROM user where username =  '$login'";
$result = mysqli_query($conn, $sql);

// Check connection
$row = mysqli_fetch_assoc($result);
echo $row["userType"];

if (!isset($_POST['Username'])) 
{
  $_SESSION['ErrorReason'] = 2;
  header('Location: login.php');
}
else if ( $_SESSION['User_Name'] == $row["username"] and password_verify($_POST['pass'], $row["phash"]) and $row["userType"] == "ValidUser")
{
  $_SESSION[ 'UserA' ] = 1; //ValidUser
  header('Location: menu.php'); 
}
else if (mysqli_num_rows($result) == 0) 
{ 
  $_SESSION['ErrorReason'] = 1;
  header('Location: login.php');
}

mysqli_close($conn);
?>


</body>


</html>
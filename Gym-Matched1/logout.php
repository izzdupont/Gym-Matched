<!-- This page act as a function where it allow users to 
log out from the system and redirect them to the login page..-->

<?php
   ob_start();
   session_start();
 $_SESSION['ErrorReason'];

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="MainCSS.css">


<title> logout </title>

</head>

<body>

<?php
session_unset();
session_destroy();
ob_start();
session_start();

$_SESSION['ErrorReason'] = 3;
header('Location: login.php');

?>


</body>

</html>
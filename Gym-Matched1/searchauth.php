<?php
include 'elements/db.php';
   ob_start();
   session_start();
$_SESSION['ErrorReason'] = '0';
$_SESSION['F10'] = $_POST['SGender'];
$_SESSION['F11'] = $_POST['Sworkout_level'];
$_SESSION['F12'] = $_POST['Sworkout_time'];
?>

<!DOCTYPE HTML>
<html>
<head>
<body bgcolor="gray">

<title> epauth </title>

<link rel="stylesheet" href="MainCSS.css">
</head>





<body>



<?php

$SGender = filter_input(INPUT_POST, "SGender");
$Sworkout_time = filter_input(INPUT_POST, "Sworkout_time");
$Sworkout_level = filter_input(INPUT_POST, "Sworkout_level");

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$SGender = mysqli_real_escape_string($conn, $_POST['SGender']);
$Sworkout_time = mysqli_real_escape_string($conn, $_POST['Sworkout_time']);
$Sworkout_level = mysqli_real_escape_string($conn, $_POST['Sworkout_level']);

//echo $SGender;
//echo $Sworkout_time;
//echo $Sworkout_level;

$sql = "SELECT * FROM user where Gender = '$SGender' AND workout_time = '$Sworkout_time' AND workout_level= '$Sworkout_level'  ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num = mysqli_num_rows($result);

if ($num==0)
{
    echo "There is no matched result !";
}

else 
{
    echo $row['fname'];
}

?>
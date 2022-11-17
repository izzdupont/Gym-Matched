<!-- This page should get user input from editprofile.php and insert 
it to the login user database. Redirect the user to the profile page 
if the data is successfully saved or back to the edit profile page  if something went wrong..-->

<?php
include 'elements/db.php';
   ob_start();
   session_start();
$_SESSION['ErrorReason'] = '0';
$_SESSION['F1'] = $_POST['fname'];
$_SESSION['F2'] = $_POST['lname'];
$_SESSION['F3'] = $_POST['Age'];
$_SESSION['F4'] = $_POST['Gender'];
$_SESSION['F5'] = $_POST['email'];
$_SESSION['F6'] = $_POST['phone'];
$_SESSION['F7'] = $_POST['City'];
$_SESSION['F8'] = $_POST['workout_level'];
$_SESSION['F9'] = $_POST['workout_time'];
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
$fname = filter_input(INPUT_POST, "fname");
$lname = filter_input(INPUT_POST, "lname");
$Age = filter_input(INPUT_POST, "Age");
$Gender = filter_input(INPUT_POST, "Gender");
$email = filter_input(INPUT_POST, "email");
$phone = filter_input(INPUT_POST, "phone");
$City = filter_input(INPUT_POST, "City");
$workout_time = filter_input(INPUT_POST, "workout_time");
$workout_level = filter_input(INPUT_POST, "workout_level");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//get input from form = new name
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$Age = mysqli_real_escape_string($conn, $_POST['Age']);
$Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$City = mysqli_real_escape_string($conn, $_POST['City']);

$workout_time = mysqli_real_escape_string($conn, $_POST['workout_time']);
$workout_level = mysqli_real_escape_string($conn, $_POST['workout_level']);

$login = $_SESSION['User_Name'];

//find all data for people
$sql = "SELECT * FROM user where username = '$login'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) != 0) {

  
  $sql = "UPDATE user SET fname = '$fname', lname = '$lname', Age = '$Age', Gender = '$Gender',
  phone = '$phone', email = '$email', City = '$City', workout_level = '$workout_level', workout_time = '$workout_time'
  where username = '$login'";
}
//echo $sql;
//exit();

 
if (mysqli_query($conn, $sql)) {
  header('Location: profile.php');
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
  
mysqli_close($conn);
  
  
?>

</body>


</html>

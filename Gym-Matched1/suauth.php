<!-- This page should validate the database and input the data to the database. 
Redirect the user to the sign in page if valid or back to the sign up page if something is wrong.
-->

<?php
   ob_start();
   session_start();
$_SESSION['ErrorReason'] = '0';
$_SESSION['F1'] = $_POST['fname'];
$_SESSION['F2'] = $_POST['lname'];
$_SESSION['F3'] = $_POST['email'];
$_SESSION['F4'] = $_POST['Password1'];
$_SESSION['F5'] = $_POST['Password2'];

?>
<!DOCTYPE HTML>
<html>
<head>
<body bgcolor="gray">

<title> suauth </title>

<link rel="stylesheet" href="MainCSS.css">
</head>

</html>

<body>

<?php

if ($_POST['Password1'] != $_POST['Password2']) {
$_SESSION['ErrorReason'] = 1;
header('Location: signup.php');
}
else { ?>


<?php

$servername = "localhost";
$username = "root";
$password = "msu2022";
$dbname = "gym";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//if (!$conn) {
//  die("Connection failed: " . mysqli_connect_error());
//}

if (mysqli_connect_errno())
{
	echo "Error";
	exit();
}

$login = filter_input(INPUT_POST, "username");
$fname = filter_input(INPUT_POST, "fname");
$lname = filter_input(INPUT_POST, "lname");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "Password1");

$login = $conn->real_escape_string($login);
$fname = $conn->real_escape_string($fname);
$lname = $conn->real_escape_string($lname);
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

$hash = password_hash($password, PASSWORD_BCRYPT);


$sql = "SELECT username FROM user where username =  '$login'";
$result = mysqli_query($conn, $sql);
// Check connection
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 0)
{ 	
	$sql = "INSERT INTO user (`fname`, `lname`, `username`, `phash`, `email`) VALUES ('$fname', '$lname', '$login', '$hash', '$email')";

	if ($conn->query($sql))
	{
		// Redirect them to your login page.
		// Set your necessary session variables
		header('Location: login.php');

	}
	else
	{
		//echo "FAILURE";
		echo "Something's wrong with the query: " . mysqli_error($conn);
		header('Location: signup.php');
		exit();
	}

	/*
	if ($stmt = mysqli_prepare($conn, $sql))
	{
		mysqli_stmt_bind_param($stmt, "sssss", $fname2, $lname2, $login2, $hash2, $email2);

		$fname2 = $fname;
		$lname2 = $lname;
		$login2 = $login;
		$hash2 = $hash;
		$email2 = $email;
		mysqli_stmt_execute($stmt);

		mysqli_stmt_close($stmt);
	}
	else
	{
		echo "Something's wrong with the query: " . mysqli_error($conn);
		header('Location: login.php');
	}
	*/
}
else
{
	$_SESSION['ErrorReason'] = 2;
	header('Location: signup.php');
}


mysqli_close($conn);
?>
<?php } ?>

</body>


</html>
<!-- This page should list all the available gym in Minot 
in basic HTML with a sort function build with Javascript-->

<?php
   ob_start();
   session_start();
  include 'elements/db.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
    <link rel="stylesheet" href="MainCSS.css">
    <title> Gym - Locator </title>
		<style>
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
        background-color: 	#538BCF;
        color: white;
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
		<a href="menu.php">Menu</a>
		<a href="profile.php">Profile</a>
		<a href="#search">Search</a>
		<a href="Notification.php">Notification</a>
		<a href="#calculator">Calories & BMI Calculator </a>
		<a class="active" href="locator.php">Gym Locator </a>
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
		<h1> We are currently only available in Minot, ND</h1> <br>
    
        <table id = "gym" class ="sortable">
            <tr>
                <th onclick="sortTable(0)">Gym Name</th>
                <th onclick="sortTable(1)">Address</th>
                <th onclick="sortTable(2)">Open Time</th>
                <th onclick="sortTable(3)">Cost</th>
            </tr>
            <tr>
                <td> Anytime Fitness </td>
                <td> 1100 N Broadway </td>
                <td> 24 hours </td>
                <td>$36.50/month + tax</td>
            </tr>
            <tr>
                <td> Anytime Fitness </td>
                <td> 305 20th Ave SW </td>
                <td> 24 hours </td>
                <td>$36.50/month + tax</td>
            </tr>
            <tr>
                <td> Minot State Wellness Center</td>
                <td> 11th Ave NW </td>
                <td> Monday-Friday: 6AM-10PM <br>
                Saturday: 10AM-6PM <br>
                Sunday: 12-8PM </td>
                <td>Free for MSU student </td>
            </tr>
            <tr>
                <td> Forever Fitness </td>
                <td> 515 20th Ave SE Suite #9 </td>
                <td> 24 hours </td>
                <td><a href ="https://foreverfitness247.business.site/">Email Establish to get Quote </td>
            </tr>
            <tr>
                <td>Planet Fitness </td>
                <td> 10 28th Ave SW </td>
                <td> Monday-Friday: 5AM–9PM <br>
                Saturday-Sunday: 7AM–7PM <br></td>
                <td>Classic: $10/month + tax & $39 annual fee<br>
            Black Card: $22.99/month + tax & $39 annual fee</td>
            </tr>
            <tr>
                <td>ASK Fitness </td>
                <td>3516 N Broadway </td>
                <td> 24 hours</td>
                <td>Basic Individual: $49.99 + one time $50 initial enrollment fee<br>
            Basic Partner (2 adult): $69.99 + one time $50 initial enrollment fee <br>
            Basic Family (2 adult & 2 kids): $79.99 + one time $50 initial enrollment fee</td>
            </tr>
            <td>Crossfit Minot </td>
                <td> 4542 N Broadway </td>
                <td> Monday: 2–3:30PM <br>
                Tuesday-Friday: 5:30–10AM, 2–8PM <br>
                Saturday: 9–11AM<br>
                Sunday: 2–3:30PM</td>
                <td>Student: $95-$125/month + tax<br>
            Individual: $130-$150/month + tax<br>
            Family: $240-$250/month + tax<br>
            Kids & Teen: $50-$85/month + tax</td>
            </tr>
            <td>Minot Family YMCA</td>
                <td> 3515 16th St SW</td>
                <td> Monday - Friday 5AM–11PM <br>
                Saturday - Sunday 6AM–9PM
            </td>
                <td>Age 0-18: $13-$20/month + tax<br>
            College: $20/month + tax + must show proof of enrollment<br>
            Adult (24-59): $56/month + tax + $20 enrollment fee<br>
            Senior Adult (60+): $50-$85/month + tax + $20 enrollment fee
        </td>
            </tr>
    </center>
    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("gym");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc"; 
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                    }
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;      
                } else {
                /*If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    </script>
    </body>
<html>
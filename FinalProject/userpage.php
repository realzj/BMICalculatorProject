<?php
// start the session
session_start();

@include "connectdb.php";


// Check if the user is logged in gathered from tutorial
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    // Redirect the user to the login page
    header('Location: login.php');
    exit;
}

// Get the current user's username
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CalorieCalc</title>
    <link rel="stylesheet" href="css/test.css" />
    <script type="text/javascript">
        function preventBack() {
            window.history.forward()
        };
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        }
    </script>
</head>

<body>

    <nav class="nav">
        <div class="logo">CalorieCalc</div>
        <div class="nav-items">
            <a href="loggedimperial.php">Imperial Calculator</a>
            <a href="loggedmetric.php">Metric Calculator</a>
            <a href="loggedbmi.php">BMI Calculator</a>
            <a href="logout.php">Log out</a>

        </div>
    </nav>

    <div class="mainbody">
        <h1>Welcome, <?php echo $username ?></h1>

        <h3>Work out your calories, BMI, view your results and access the meal plans</h3>

        <div class="buttons">
            <button class="mealbutton1" onclick="location.href='loggedgain.php'">Surplus Meal Plans</button>
            <button class="mealbutton2" onclick="location.href='loggedlose.php'">Deficit Meal Plans</button>
            <button class="mealbutton3" onclick="location.href='loggedmaintain.php'">Maintain Meal Plans</button>
            <div class="dropdownmenu">
                <button>Results</button>
                <div class="dropdownmenu-content">
                    <a href="resultimperial.php">Imperial Results</a>
                    <a href="resultmetric.php">Metric Results</a>
                    <a href="resultbmi.php">BMI Results</a>
                </div>
            </div>
        </div>




</body>

</html>
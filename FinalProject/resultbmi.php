<?php
// Start the session
session_start();

// Check if the user is logged in gathered from tutorial
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    // Redirect the user to the login page
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CalorieCalc</title>
    <link rel="stylesheet" href="css/profile.css" />

</head>

<body>
    <?php
    @include "connectdb.php";

    // Get the current user's username
    $username = $_SESSION['username'];

    ?>

    <nav class="nav">
        <div class="logo">CalorieCalc</div>
        <div class="nav-items">
            <a href="loggedimperial.php">Imperial Calculator</a>
            <a href="loggedmetric.php">Metric Calculator</a>
            <a href="loggedbmi.php">BMI Calculator</a>
            <a href="userpage.php">My Profile</a>
            <a href="logout.php">Log out</a>

        </div>

    </nav>



    <?php
    // Connect to the database
    @include "connectdb.php";


    //The following code was achieved with the help of a tutorial and knowledge gathered, it is different as in the tutorial
    //the data is shown vertically, here its shown horizontally, this was done to show the user the results
    //in a more ordered manner.



    // Fetch the data for the logged in user
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM bmi_results WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the data in a table
        echo '<table>';
        echo '<tr><th>Username</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Height</th>
        <th>Weight</th>
        <th>BMI</th>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['age'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['height'] . '</td>';
            echo '<td>' . $row['weight'] . '</td>';
            echo '<td>' . $row['bmi'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No data found for the logged in user.';
    }

    ?>


</body>

</html>
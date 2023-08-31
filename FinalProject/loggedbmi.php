<?php
// Start the session
session_start();

// Check if the user is logged in gathered from tutorial
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Connect to the database
@include "connectdb.php";


// Get the current user that is logged in, this was achieved by following a youtube tutorial
$username = $_SESSION['username'];
$sql = mysqli_query($conn, "SELECT username FROM user_form WHERE username = '$username'");
$row = mysqli_fetch_array($sql);



//The following code that deals with bmi and result was changed from javascript to php code in order to save the users results into the database this was done manually
//with the knowledge gathered from the registration and the rest of the calculators form as it follows the same method, the calculations were followed the same as the BMR formula
//that was displayed in the website (https://www.thecalculatorsite.com/health/bmicalculator.php)


// Get values from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $_POST['bmi'];

    // Calculate the BMI (Fornula gotten for website mentioned above)
    $bmi = $weight / (($height / 100) * ($height / 100));

    // Determine the BMI category
    switch (true) {
        case ($bmi < 18.5):
            $result = 'Underweight';
            break;
        case ($bmi >= 18.5 && $bmi <= 24.9):
            $result = 'Healthy';
            break;
        case ($bmi >= 25 && $bmi <= 29.9):
            $result = 'Overweight';
            break;
        case ($bmi >= 30 && $bmi <= 34.9):
            $result = 'Obese';
            break;
        case ($bmi >= 35):
            $result = 'Extremely obese';
            break;
    }
    //Rounds up bmi to avoid displaying float values
    $bmi = ceil($bmi);


    // Insert the BMI data into the database and lets the user know it has been done
    $query = "INSERT INTO bmi_results (username, age, gender, height, weight, bmi) 
    VALUES ('$username','$age','$gender','$height','$weight','$bmi')";
    if (mysqli_query($conn, $query)) {
        echo "<script language='javascript'>
        alert('Data inserted in databse, go to profile to view results')
        </script>";;
    } else {
        echo "Data not inserted.";
    }
}
// Close the database connection
$conn->close();


?>

<!-- By Ali Aslan -->
<!--The following code was in a youtube tutorial - There will be no major changes done
here but rather to the css as it needs to fit the style i have already created

I deleted links that were left by the author and kept the calculator as that is all i need

I also added the nav bar -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="css/bmi.css" />

</head>

<body>
    <nav class="nav">
        <div class="logo">CalorieCalc</div>
        <div class="nav-items">
            <a href="loggedmetric.php">Metric Calculator</a>
            <a href="loggedimperial.php">Imperial Calculator</a>
            <a href="userpage.php">My Profile</a>
            <a href="logout.php">Log out</a>

        </div>
    </nav>

    <body>
        <div class="container">
            <div class="box">
                <h1>BMI Calculator</h1>
                <div class="content">
                    <form id="form" method="POST">
                        <div class="input">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" required placeholder="" />
                        </div>
                        <div class="gender">
                            <label class="container">
                                <input type="radio" name="gender" id="m" value="male">
                                <p class="text">Male</p>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">
                                <input type="radio" name="gender" id="f" value="female">
                                <p class="text">Female</p>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="containerHW">
                            <div class="inputH">
                                <label for="height">Height(cm)</label>
                                <input type="number" id="height" name="height" required>
                            </div>
                            <div class="inputW">
                                <label for="weight">Weight(kg)</label>
                                <input type="number" id="weight" name="weight" required>
                            </div>
                        </div>
                        <button class="calculate" id="submit">Calculate BMI</button>
                    </form>
                </div>
                <div id="result">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                        <?php
                        echo '<h4>';
                        echo "Your BMI is: " . $bmi . "<br>";
                        echo "Your are: " . $result . "<br>";
                        echo '</h4>';
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>


    </body>

</html>
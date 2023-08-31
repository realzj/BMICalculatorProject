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


//I used the same method from the registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $heightFeet = $_POST["height-feet"];
    $heightInches = $_POST["height-inches"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $activityLevel = $_POST["activity-level"];
    $weightGoal = $_POST["weight-goal"];

    //The following formulas were initially given in javscript by chatGPT(check imperial.php), there were many errors when trying to input the details into database
    //when I tried to save the data into the database so I turned it into php code to allow this to happen, since the formulas were gathered from the same website 
    //as the BMI it ensured consistency within the formulas, the user will get the result as well as saving their results to the datahase

    // Convert height to inches
    $heightInchesTotal = ($heightFeet * 12) + intval($heightInches);

    if ($gender === "male") {
        $bmr = (4.536 * $weight) + (15.88 * $heightInchesTotal) - (5 * $age) + 5;
    } else {
        $bmr = (4.536 * $weight) + (15.88 * $heightInchesTotal) - (5 * $age) - 161;
    }

    // Calculate TDEE
    switch ($activityLevel) {
        case "sedentary":
            $tdee = $bmr * 1.2;
            break;
        case "lightlyActive":
            $tdee = $bmr * 1.375;
            break;
        case "moderatelyActive":
            $tdee = $bmr * 1.55;
            break;
        case "veryActive":
            $tdee = $bmr * 1.725;
            break;
        case "extraActive":
            $tdee = $bmr * 1.9;
            break;
        default:
            $tdee = $bmr;
            break;
    }

    // Calculate calorie goal based on weight goal
    switch ($weightGoal) {
        case "lose":
            $calorieGoal = $tdee - 500;
            break;
        case "gain":
            $calorieGoal = $tdee + 500;
            break;
        case "maintain":
            $calorieGoal = $tdee;
            break;
    }
    $calorieGoal = ceil($calorieGoal);


    // Insert the user's results into the new table
    $query = "INSERT INTO calculator_results2 (username, weight, height_feet, height_inches , age, gender, activity_level, weight_goal, calorie_goal) 
    VALUES ('$username', '$weight', '$heightFeet', '$heightInches', '$age', '$gender', '$activityLevel', '$weightGoal', '$calorieGoal')";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperial Calculator</title>
    <link rel="stylesheet" href="css/test.css" />

</head>

<body>
    <nav class="nav">
        <div class="logo">CalorieCalc</div>
        <div class="nav-items">
            <a href="loggedmetric.php">Metric Calculator</a>
            <a href="loggedbmi.php">BMI Calculator</a>
            <a href="userpage.php">My Profile</a>
            <a href="logout.php">Log out</a>
        </div>
    </nav>
    <!--

    I added required to the placehdolders in order to check for presence checks, since I removed
    all the javscript, thi ensure the user inputs the right data into the fields.

    I also had to add the names to the fields as the intial code didn't and this was needed in order
    to input the data into the database.

    -->

    <form method="post">
        <?php
        @include "connectdb.php";

        // Get the current user's username
        $username = $_SESSION['username'];
        ?>

        <h1>Imperial Calculator</h1>
        <label for="weight">Weight (lbs):</label>
        <input type="number" name="weight" id="weight" required placeholder="Enter weight in pounds">

        <label for="height-feet">Height (ft):</label>
        <input type="number" name="height-feet" id="heightfeet" required placeholder="Enter height in feet">

        <label for="height-inches">Height (in):</label>
        <input type="number" name="height-inches" id="heightinches" required placeholder="Enter height in inches">

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required placeholder="Enter age in years">

        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="activity-level">Activity Level:</label>
        <select name="activity-level" id="activity-level">
            <option value="sedentary">Sedentary (little or no exercise)</option>
            <option value="lightlyActive">Lightly Active (light exercise or sports 1-3 days per week)</option>
            <option value="moderatelyActive">Moderately Active (moderate exercise or sports 3-5 days per week)</option>
            <option value="veryActive">Very Active (hard exercise or sports 6-7 days per week)</option>
            <option value="extraActive">Extra Active (very hard exercise or sports, physical job or training twice a day)</option>
        </select>

        <label for="weight-goal">Weight Goal:</label>
        <select name="weight-goal" id="weight-goal">
            <option value="maintain">Maintain Weight</option>
            <option value="lose">Lose Weight</option>
            <option value="gain">Gain Weight</option>
        </select>

        <input type="submit" value="Calculate Calories">
    </form>
    <div id="result">
        <!--

        The result was however added with the help of tutorials, as I did not initially know
        how to display result after form was filled.

        -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php
            echo '<h4>';
            echo "Your daily calorie goal is: " . $calorieGoal . " calories";
            echo '</h4>';
            ?>
        <?php } ?>
    </div>
</body>

</html>
<!--

The form below along with the script was code generated, this code was not altered much, the only thing
was the addition of the nav bar and the header 5 to let the user know that if they want to save their results
they will need to log in or create an account, there was no reason to add required placeholder in the form for presence check
since the fields were already being checked in the script

The CSS will also be commented as it will be changed in order to fit the project

-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metric Calculator</title>
    <link rel="stylesheet" href="css/test.css" />
</head>

<body>
    <nav class="nav">
        <div class="logo">CalorieCalc</div>
        <div class="nav-items">
            <a href="index.php">Home</a>
            <a href="registration.php">Sign up</a>
            <a href="login.php">Log in</a>
        </div>
    </nav>
    <form>
        <h1>Metric Calculator</h1>
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" placeholder="Enter weight in kilograms">

        <label for="height">Height (cm):</label>
        <input type="number" id="height" placeholder="Enter height in centimeters">

        <label for="age">Age:</label>
        <input type="number" id="age" placeholder="Enter age in years">

        <label for="gender">Gender:</label>
        <select id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="activity-level">Activity Level:</label>
        <select id="activity-level">
            <option value="sedentary">Sedentary (little or no exercise)</option>
            <option value="lightlyActive">Lightly Active (light exercise or sports 1-3 days per week)</option>
            <option value="moderatelyActive">Moderately Active (moderate exercise or sports 3-5 days per week)</option>
            <option value="veryActive">Very Active (hard exercise or sports 6-7 days per week)</option>
            <option value="extraActive">Extra Active (very hard exercise or sports, physical job or training twice a day)</option>
        </select>

        <label for="weight-goal">Weight Goal:</label>
        <select id="weight-goal">
            <option value="maintain">Maintain Weight</option>
            <option value="lose">Lose Weight</option>
            <option value="gain">Gain Weight</option>
        </select>

        <button type="button" id="calculate-button">Calculate</button>

        <script>
            document.getElementById("calculate-button").addEventListener("click", function() {
                // Get values from form
                const weight = document.getElementById("weight").value;
                const height = document.getElementById("height").value;
                const age = document.getElementById("age").value;
                const gender = document.getElementById("gender").value;
                const activityLevel = document.getElementById("activity-level").value;
                const weightGoal = document.getElementById("weight-goal").value;

                // Check if fields are empty
                if (weight === "" || height === "" || age === "") {
                    alert("Please fill in all fields");
                    return;
                }

                // Calculate BMR
                let bmr;
                if (gender === "male") {
                    bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
                } else {
                    bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
                }

                // Calculate TDEE
                let tdee;
                if (activityLevel === "sedentary") {
                    tdee = bmr * 1.2;
                } else if (activityLevel === "lightlyActive") {
                    tdee = bmr * 1.375;
                } else if (activityLevel === "moderatelyActive") {
                    tdee = bmr * 1.55;
                } else if (activityLevel === "veryActive") {
                    tdee = bmr * 1.725;
                } else {
                    tdee = bmr * 1.9;
                }

                // Calculate calorie goal based on weight goal
                let calorieGoal;
                if (weightGoal === "lose") {
                    calorieGoal = tdee - 500;
                } else if (weightGoal === "gain") {
                    calorieGoal = tdee + 500;
                } else {
                    calorieGoal = tdee;
                }

                // Display result
                const resultDiv = document.getElementById("result");
                resultDiv.innerHTML = `Your daily calorie needs are <strong>${calorieGoal.toFixed(0)}</strong> calories.`;
            });
        </script>

        <div id="result">
            <h5>To save your results log in or create an account.</h5>
        </div>

    </form>
</body>

</html>
<!-- By Ali Aslan -->
<!--The following code was in a youtube tutorial - There will be no major changes done
here but rather to the css as it needs to fit the style i have already created

I deleted links that were left by the author and kept the calculator as that is all i need

I also added the nav bar to keep it as the main style I initially added in the main page this will keep going throughout all the pages-->

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
            <a href="index.php">Home</a>
            <a href="registration.php">Sign up</a>
            <a href="login.php">Log in</a>

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
                <div class="result">
                    <p>Your BMI is</p>
                    <div id="result">00.00</div>
                    <p class="comment"></p>
                    <h5>To save your results log in or create an account.</h5>
                </div>
            </div>

            <script src="js/script.js"></script>

    </body>

</html>
<!--

The following code was created following a tutorial, it was changed by adding drop down buttons that will redirect the user to 
their input.

The CSS will also be commented as it was changed a lot.

-->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CalorieCalc</title>
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>

  <nav class="nav">
    <div class="logo">CalorieCalc</div>
    <div class="nav-items">
      <a href="registration.php">Sign up</a>
      <a href="login.php">Log in</a>

    </div>
  </nav>

  <section class="hero">
    <div class="hero-container">
      <div class="columna-izquierda">
        <h1>Keep fit using our calculators and our meal plans.</h1>
        <p>
          Gains are made in the kitchen, get your meal plan and get to your goal quicker than ever.
        </p>
        <div class="buttons">
          <!--
            The following drop down buttons were created with the help of a tutorial
          -->
          <div class="dropdownmenu">
            <button class="boton1">Calculators</button>
            <div class="dropdownmenu-content">
              <a href="metric.php">Metric Calorie Calculator</a>
              <a href="imperial.php">Imperial Calorie Calculator</a>
              <a href="bmi.php">BMI Calculator</a>
            </div>
          </div>
          <div class="dropdownmenu">
            <button class="boton2">Meal Plans</button>
            <div class="dropdownmenu-content">
              <a href="lose.php">Calorie Deficit Meal Plan</a>
              <a href="maintain.php">Calorie Maintain Meal Plan</a>
              <a href="gain.php">Calorie Surplus Meal Plan</a>
            </div>
          </div>
        </div>
        <div class="columna-derecha">
          <img src="images/foto.png" alt="illustration" class="hero-image" />
        </div>
      </div>
  </section>



</body>

</html>
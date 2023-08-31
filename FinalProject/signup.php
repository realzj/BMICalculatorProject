<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CalorieCalc - Sign Up</title>
  <link rel="stylesheet" href="css/logup.css" />

</head>

<body>

  <nav class="nav">
    <div class="logo">CalorieCalc</div>
    <div class="nav-items">
      <a href="index.php">Home</a>
      <a href="signup.php">Sign up</a>
      <a href="login.php">Log in</a>

    </div>
  </nav>

  <div class="wrapper">
    <h1>Sign up</h1>
    <form action="" method="post">
      <input type="text" required placeholder="Username">
      <input type="password" required placeholder="Password">
      <input type="password" required placeholder="Re-enter password">
    </form>
    <div class="terms">
      <input type="checkbox" id="checkbox">
      <label for="checkbox">I agree to these <a href="/">Terms and conditions</a></label>
    </div>
    <input type="submit" name="submit" value="Sign up" class="form-btn">
    <div class="member">
      Already a member? <a href="login.php">Log in here</a>
    </div>
  </div>


</body>

</html>
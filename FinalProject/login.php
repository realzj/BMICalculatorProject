<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CalorieCalc - Sign Up</title>
   <link rel="stylesheet" href="css/main.css" />
   <!--The following javascript code is to prevent the user
    from going back, a tutorial was used to achieve this-->
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
         <a href="index.php">Home</a>
         <a href="registration.php">Sign up</a>
         <a href="login.php">Log in</a>

      </div>
   </nav>

   <!--The form was taken from a Youtube Tutorial-->
   <div class="form-container">

      <form action="" method="post">
         <h1>Log in</h1>
         <?php
         //Displays error messages
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <!--Required placeholder will validate for presence check-->
         <input type="text" name="username" required placeholder="Enter your username">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>Don't have an account? <a href="registration.php">Register here</a></p>
      </form>

   </div>


</html>

<?php

@include "connectdb.php";

session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   header('Location: userpage.php');
   exit;
}

//The code again had issues when using the tutorial, so i applied the same method 
//I used in registration to submit the form
if (isset($_POST['submit'])) {
   $username = $_POST["username"];
   $password = $_POST["password"];

   //I used the same method from the tutorial that was used in the registration form
   $query = "SELECT * FROM user_form WHERE username = '$username'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);

   //It will go through the database and retrieve the user input, if it finds it then
   //it will dehash the password, a tutorial was followed to achieve this.
   if ($count > 0) {
      $user_data = $result->fetch_assoc();
      if (password_verify($password, $user_data['password'])) {
         echo "<script type='text/javascript'>
            alert('Login Successful');
            window.location.href = 'userpage.php';
         </script>";
         $_SESSION['loggedin'] = true;
         $_SESSION['username'] = $username;
      } else {
         echo "<script type='text/javascript'>
         alert('Username or password is wrong');
      </script>";
      }
   } else {
      echo "<script type='text/javascript'>
      alert('Username or password is wrong');
   </script>";
   }
}

?>
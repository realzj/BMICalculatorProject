<!--All reused code will be in the reference section-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalorieCalc - Sign up</title>
    <link rel="stylesheet" href="css/main.css" />

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
    <!--I deleted the fields that ask for personal data and kept what I needed for registration-->
    <div class="form-container">
        <form action="" method="post">
            <h3>Sign up</h3>
            <?php
            //Displays error messeage 
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <!--Required placeholder doesn't let the use continue without presence check-->
            <input type="text" name="username" required placeholder="Username">
            <input type="password" name="password" required placeholder="Password">
            <input type="password" name="confirm_password" required placeholder="Re-enter your password">

            <input type="submit" name="submit" value="Register" class="form-btn">
            <p>Already Register? <a href="login.php">Log in here</a></p>
        </form>
    </div>
</body>

</html>

<?php

@include "connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //I had issues when following the tutorial as the inputs were not saving and there were errors coming up
    //During some research I found a way in which it worked without using mysqli_real_escape_string.
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    //I also researched a way to create an alert if there was anything wrong, using stack overflow and used the alert many times.
    if ($password != $confirm_password) {
        echo "<script type='text/javascript'>
        alert('Password does not match');
        window.location.href = 'registration.php';
    </script>";;
    } else {
        // There were issues with the code provided so I had to research another way of checking for a taken username 
        //Following code was taken from youtube tutorial 
        $query = "SELECT username FROM user_form WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            echo "<script type='text/javascript'>
            alert('Username already taken - please enter a different username.');
            window.location.href = 'registration.php';
        </script>";;
        } else {
            // Check if password is longer than 8 characters, if it aint the user will be notified and they'll need to retry.
            if (strlen($password) <= 8) {
                echo "<script language='javascript'>
                    alert('Please enter a password that is longer than 8 characters')
                    window.location.href='registration.php'; 
                    </script>";
            } else {
                // Hashs the password, followed a tutorial, this is to ensure the user can have more reliability on the system and insert it into the database
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO user_form (username, password) VALUES ('$username', '$password')";

                // Check if query was successful and if it is it will redirect the user to the login page.
                if (mysqli_query($conn, $query)) {
                    echo "<script language='javascript'>
                    alert('Registered successfully! Please Log in')
                    window.location.href='login.php'; 
                    </script>";;
                } else {
                    echo "Registration failed.";
                }
            }
        }
    }
}

// Close connection
$conn->close();
?>
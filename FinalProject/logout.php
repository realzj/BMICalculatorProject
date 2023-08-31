<?php

//A tutorial was followed in order to achieve the user to log out

session_start();
if (session_destroy()) {
    echo "<script type='text/javascript'>
            alert('Succesfully Logged out');
            window.location.href = 'index.php';
        </script>";;
}

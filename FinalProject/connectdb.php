<?php
//This creates a connection to the database, this was achieved by watching a tutorial and fixed by stack overflow(right port number)
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

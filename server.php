<?php
// Database configuration
$host = 'localhost'; 
$db = 'nacwo';
$user = 'root';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: Something went wrong" );
} else {
    echo "Connected successfully!";
}
?>

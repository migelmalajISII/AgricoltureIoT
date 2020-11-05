<?php
// Enable us to use Headers
//ob_start();

// Set sessions
if(!isset($_SESSION)) {
    session_start();
}

$hostname = "localhost";
$username = "public";
$password = "";
$dbname = "agriculture_iot";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php

function connectDB(){
    $hostname = "localhost";
    $username = "public";
    $password = "";
    $dbname = "agriculture_iot";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function login($user, $pass)
{
    $query="SELECT * FROM agriculture_iot WHERE username="+$user;
    
}


?>
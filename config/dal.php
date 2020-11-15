<?php

function connectDB(){
    $hostname = "localhost";
    $username = "public";
    $password = "";
    $dbname = "agriculture_iot";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function login($user){
    $mysqli=connectDB();
    $query="SELECT * FROM utenti WHERE username='$user'";
    $result = $mysqli->query($query);
    $data = $result->fetch_array(MYSQLI_ASSOC); // single row
    $result->free_result();
    $mysqli->close();
    return $data;
}

function publicLoad(){

}

function registration($user,$pass,$role){
  $mysqli=connectDB();
  $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
  $token=generate_string();
  $token_hash=password_hash($token,PASSWORD_DEFAULT);
  $query="INSERT INTO `utenti` (`id`, `username`, `password`, `token`, `ruolo`) VALUES (NULL, '$user', '$pass_hash', '$token_hash', '$role');";
  $mysqli->query($query);
  $mysqli->close();
  return $token;
}


function generate_string() {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strength = 8;
    $permitted_chars_length = strlen($permitted_chars);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $permitted_chars[mt_rand(0, $permitted_chars_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
?>
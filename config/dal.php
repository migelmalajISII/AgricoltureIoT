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
    $data = $result->fetch_array(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
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

function generate_string(){
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

function publicLoad($dataa){
    $mysqli=connectDB();
    $query="SELECT `idsensore`, ROUND(AVG(`temperatura_t`),2) AS TT, ROUND(AVG(`umidita_t`),2) AS UT, ROUND(AVG(`temperatura_a`),2) AS TA, ROUND(AVG(`umidita_a`),2) AS UA, ROUND(AVG(`indiceuv`),2) AS UV FROM `dati` WHERE `data` ='$dataa' GROUP BY `idsensore`";
    $result=$mysqli->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function allSensor(){
    $mysqli=connectDB();
    $query="SELECT * FROM `sensori`";
    $result=$mysqli->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function getSensorByID($id){
    $mysqli=connectDB();
    $query="SELECT * FROM `sensori` WHERE `idsensore`=$id";
    $result=$mysqli->query($query);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function deleteSensor($id){
    $mysqli=connectDB();
    $query="DELETE FROM `sensori` WHERE `idsensore`=$id";
    $result=$mysqli->query($query);
    $mysqli->close();
    return $result;
}

function addSensor($mr,$md,$lt,$lg,$idtr,$txt){
    $mysqli=connectDB();
    $query="INSERT INTO `sensori`(`marca`, `modello`, `latitudine`, `longitudine`, `note`, `idterreno`) VALUES ('$mr','$md','$lt','$lg','$txt',$idtr)";
    $mysqli->query($query);
    $mysqli->close();
}

function updateSensor($id,$mr,$md,$lt,$lg,$idtr,$txt){
    $mysqli=connectDB();
    $query="UPDATE `sensori` SET `marca`='$mr',`modello`='$md',`latitudine`='$lt',`longitudine`='$lg',`note`='$txt',`idterreno`=$idtr WHERE `idsensore`=$id";
    $mysqli->query($query);
    $mysqli->close();
}

function allTerrain(){
    $mysqli=connectDB();
    $query="SELECT * FROM `terreni`";
    $result=$mysqli->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function getTerrainByID($id){
    $mysqli=connectDB();
    $query="SELECT * FROM `terreni` WHERE `idterreno`=$id";
    $result=$mysqli->query($query);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function addTerrain($lt,$lg,$st,$cl){
    $mysqli=connectDB();
    $query="INSERT INTO `terreni`(`latitudine`, `longitudine`, `statolavorazione`, `coltura`) VALUES ('$lt','$lg','$st','$cl')";
    echo "<script>console.log($query)</script>";
    $mysqli->query($query);
    $mysqli->close();
}

function updateTerrain($id,$lt,$lg,$st,$cl){
    $mysqli=connectDB();
    $query="UPDATE `terreni` SET `latitudine`='$lt',longitudine`='$lg',`statolavorazione`='$st',coltura`='$cl' WHERE `idterreno`=$id";
    $mysqli->query($query);
    $mysqli->close();
}

function deleteTerrain($id){
    $mysqli=connectDB();
    $query="DELETE FROM `terreni` WHERE `idterreno`=$id";
    $result=$mysqli->query($query);
    $mysqli->close();
    return $result;
}

function getTerrainToList(){
    $mysqli=connectDB();
    $query= "SELECT `idterreno`, CONCAT(`idterreno`,\"  -  Latitudine: \",`latitudine`,\" , Longitudine: \",`longitudine`) AS nameterrain FROM `terreni`";
    $result=$mysqli->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}
?>
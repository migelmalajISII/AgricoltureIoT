<?php
require('config.php');

function connectDB(){
    $cfg = get_db_config();
    $conn = mysqli_connect($cfg['hostname'], $cfg['username'], $cfg['password'], $cfg['dbname']);
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

function existUsername($user){
    $mysqli=connectDB();
    $query="SELECT `id` FROM `utenti` WHERE `username`='$user'";
    $result = $mysqli->query($query);
    $value = $result->num_rows;
    $result->free_result();
    $mysqli->close();
    return $value;
}

function registration($user,$pass,$role){
    $mysqli=connectDB();
    $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
    $token=generate_string();
    $token_hash=password_hash($token,PASSWORD_DEFAULT);
    $query="INSERT INTO `utenti` (`id`, `username`, `password`, `token`, `ruolo`) VALUES (NULL, '$user', '$pass_hash', '$token_hash', '$role')";
    $mysqli->query($query);
    $mysqli->close();
    return $token;
}

function newToken($id,$user){
    $mysqli=connectDB();
    $token=generate_string();
    $token_hash=password_hash($token,PASSWORD_DEFAULT);
    $query= "UPDATE `utenti` SET `token`='$token_hash' WHERE `id`= $id AND `username`='$user'";
    if($mysqli->query($query)==1){
        $mysqli->close();
        return $token;
    }
    else{
        $mysqli->close();
        return "false";
    }
}

function generate_string(){
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strength = 12;
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

function addSensor($mr,$md,$lt,$lg,$txt){
    $mysqli=connectDB();
    $query="INSERT INTO `sensori`(`marca`, `modello`, `latitudine`, `longitudine`, `note`) VALUES ('$mr','$md','$lt','$lg','$txt')";
    $mysqli->query($query);
    $mysqli->close();
}

function updateSensor($id,$mr,$md,$lt,$lg,$txt){
    $mysqli=connectDB();
    $query="UPDATE `sensori` SET `marca`='$mr',`modello`='$md',`latitudine`='$lt',`longitudine`='$lg',`note`='$txt' WHERE `idsensore`=$id";
    $mysqli->query($query);
    $mysqli->close();
}

function addDato($tt,$th,$at,$ah,$uv,$dt,$hr,$idsensor){
    $mysqli=connectDB();
    $query="INSERT INTO `dati`(`temperatura_t`, `umidita_t`, `temperatura_a`, `umidita_a`, `indiceuv`, `data`, `ora`, `idsensore`) VALUES ('$tt','$th','$at','$ah','$uv','$dt','$hr',$idsensor)";
    $mysqli->query($query);
    $mysqli->close();
}

function getDatibyID($idsensor){
    $mysqli=connectDB();
    $query = "SELECT `temperatura_t`,`umidita_t`,`temperatura_a`,`umidita_a`,`indiceuv`, CONCAT(`data`,\" \",`ora`) AS Inserimento FROM `dati` WHERE `idsensore`=$idsensor ORDER BY `data`DESC, `ora` DESC";
    $result=$mysqli->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function getMinDatibyID($idsensor){
    $mysqli=connectDB();
    $query = "SELECT MIN(`temperatura_t`) AS TT,  MIN(`umidita_t`) AS UT,  MIN(`temperatura_a`) AS TA,  MIN(`umidita_a`) AS UA,  MIN(`indiceuv`) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

function getMaxDatibyID($idsensor){
    $mysqli=connectDB();
    $query = "SELECT MAX(`temperatura_t`) AS TT,  MAX(`umidita_t`) AS UT,  MAX(`temperatura_a`) AS TA,  MAX(`umidita_a`) AS UA,  MAX(`indiceuv`) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

function getAvgDatibyID($idsensor){
    $mysqli=connectDB();
    $query = "SELECT ROUND(AVG(`temperatura_t`),2) AS TT,  ROUND(AVG(`umidita_t`),2) AS UT,  ROUND(AVG(`temperatura_a`),2) AS TA,  ROUND(AVG(`umidita_a`),2) AS UA,  ROUND(AVG(`indiceuv`),2) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

function getDevDatibyID($idsensor){
    $mysqli=connectDB();
    $query = "SELECT ROUND(STD(`temperatura_t`),2) AS TT,  ROUND(STD(`umidita_t`),2) AS UT,  ROUND(STD(`temperatura_a`),2) AS TA,  ROUND(STD(`umidita_a`),2) AS UA,  ROUND(STD(`indiceuv`),2) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

?>
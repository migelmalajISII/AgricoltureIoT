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
    $stmt=$mysqli->prepare("SELECT * FROM utenti WHERE username=?");
    $stmt->bind_param('s',$user);
    $stmt->execute();
    $result=$stmt->get_result();
    $data = $result->fetch_array(MYSQLI_ASSOC);
    $result->free_result();
    $stmt->close();
    $mysqli->close();
    return $data;
}

function existUsername($user){
    $mysqli=connectDB();
    $stmt=$mysqli->prepare("SELECT `id` FROM `utenti` WHERE `username`=?");
    $stmt->bind_param('s',$user);
    $stmt->execute();
    $result=$stmt->get_result();
    $value = $result->num_rows;
    $result->free_result();
    $stmt->close();
    $mysqli->close();
    return $value;
}

function registration($user,$pass,$role){
    $mysqli=connectDB();
    $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
    $token=generate_string();
    $token_hash=password_hash($token,PASSWORD_DEFAULT);
    $stmt=$mysqli->prepare("INSERT INTO `utenti` (`username`, `password`, `token`, `ruolo`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss',$user,$pass_hash,$token_hash,$role);
    $stmt->execute();
    $result=$stmt->error;
    $stmt->close();
    $mysqli->close();
    if($result=="")
        return $token;
    else
        return "Error";
}

function newToken($id,$user){
    $mysqli=connectDB();
    $token=generate_string();
    $token_hash=password_hash($token,PASSWORD_DEFAULT);
    $stmt=$mysqli->prepare("UPDATE `utenti` SET `token`=? WHERE `id`= ? AND `username`=?");
    $stmt->bind_param('sis',$token_hash,$id,$user);
    $stmt->execute();
    $result=$stmt->error;
    $stmt->close();
    $mysqli->close();
    if($result=="")
        return $token;
    else
        return "Error";
}

function generate_string(){
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strength = 15;
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

    $stmt=$mysqli->prepare("SELECT D.`idsensore`, S.marca, S.modello, S.latitudine, S.longitudine, ROUND(AVG(`temperatura_t`),2) AS TT, 
    ROUND(AVG(`umidita_t`),2) AS UT, ROUND(AVG(`temperatura_a`),2) AS TA, ROUND(AVG(`umidita_a`),2) AS UA, 
    ROUND(AVG(`indiceuv`),2) AS UV FROM `dati` AS D INNER JOIN `sensori` AS S ON D.`idsensore`=S.`idsensore` 
    WHERE `data` = ? GROUP BY D.`idsensore` ORDER BY D.`idsensore`");

    $stmt->bind_param('s',$dataa);
    $stmt->execute();
    $result=$stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $stmt->close();
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

function getSensorByID($id){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query="SELECT * FROM `sensori` WHERE `idsensore`=$id";
    $result=$mysqli->query($query);
    if($result->num_rows>0){ 
        $data = $result->fetch_array(MYSQLI_ASSOC);
    }else{
        $data['latitudine']="Error";
    }
    $result->free_result();
    $mysqli->close();
    return $data;
}

function addSensor($mr,$md,$lt,$lg,$txt){
    $mysqli=connectDB();
    $stmt=$mysqli->prepare("INSERT INTO `sensori`(`marca`, `modello`, `latitudine`, `longitudine`, `note`) VALUES (?,?,?,?,?)");
    $stmt->bind_param('ssdds',$mr,$md,$lt,$lg,$txt);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    $mysqli->close();
    return $result;
}

function updateSensor($id,$mr,$md,$lt,$lg,$txt){
    $mysqli=connectDB();
    $stmt=$mysqli->prepare("UPDATE `sensori` SET `marca`=?,`modello`=?,`latitudine`=?,`longitudine`=?,`note`=? WHERE `idsensore`=?");
    $stmt->bind_param('ssddsi',$mr,$md,$lt,$lg,$txt,$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    $mysqli->close();
    return $result;
}

function deleteSensor($id){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query="DELETE FROM `sensori` WHERE `idsensore`=$id";
    $result=$mysqli->query($query);
    $mysqli->close();
    return $result;
}

function addDato($tt,$th,$at,$ah,$uv,$dt,$hr,$idsensor){
    $mysqli=connectDB();
    $stmt=$mysqli->prepare("INSERT INTO `dati`(`temperatura_t`, `umidita_t`, `temperatura_a`, `umidita_a`, `indiceuv`, `data`, `ora`, `idsensore`) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ddddissi',$tt,$th,$at,$ah,$uv,$dt,$hr,$idsensor);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    $mysqli->close();
    return $result;
}

function getDatibyID($idsensor){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query = "SELECT `temperatura_t`,`umidita_t`,`temperatura_a`,`umidita_a`,`indiceuv`, CONCAT(`data`,\" \",`ora`) AS Inserimento FROM `dati` WHERE `idsensore`=$idsensor ORDER BY `data`DESC, `ora` DESC";
    $result=$mysqli->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $mysqli->close();
    return $data;
}

function getMinDatibyID($idsensor){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query = "SELECT MIN(`temperatura_t`) AS TT, MIN(`umidita_t`) AS UT, MIN(`temperatura_a`) AS TA, MIN(`umidita_a`) AS UA, MIN(`indiceuv`) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

function getMaxDatibyID($idsensor){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query = "SELECT MAX(`temperatura_t`) AS TT, MAX(`umidita_t`) AS UT, MAX(`temperatura_a`) AS TA, MAX(`umidita_a`) AS UA, MAX(`indiceuv`) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

function getAvgDatibyID($idsensor){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query = "SELECT ROUND(AVG(`temperatura_t`),2) AS TT, ROUND(AVG(`umidita_t`),2) AS UT, ROUND(AVG(`temperatura_a`),2) AS TA, ROUND(AVG(`umidita_a`),2) AS UA, ROUND(AVG(`indiceuv`),2) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}

function getDevDatibyID($idsensor){ //SQL injection verificata prima
    $mysqli=connectDB();
    $query = "SELECT ROUND(STD(`temperatura_t`),2) AS TT, ROUND(STD(`umidita_t`),2) AS UT, ROUND(STD(`temperatura_a`),2) AS TA, ROUND(STD(`umidita_a`),2) AS UA, ROUND(STD(`indiceuv`),2) AS UV, `data` FROM `dati` WHERE `idsensore`=$idsensor GROUP BY `data`";
    $result=$mysqli->query($query); 
    $mysqli->close();
    return $result;
}
?>
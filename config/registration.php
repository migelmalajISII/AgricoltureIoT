<?php
require("dal.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user=$_POST["inputNUsername"];
    $pass=$_POST["inputCPassword"];
    $role=isset($_POST["inputRuolo"]) ?  $_POST["inputRuolo"] : 'public';
    $token = registration($user,$pass,$role);
    echo "<h1 style='text-align:center;'>La tua API key è: $token</h1>";
}
?>
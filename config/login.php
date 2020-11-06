<?php
include("config/dal.php");
$user=$_POST['inputUsername'];
$pass=$_POST['inputPassword'];
$result=login($user,$pass);

?>
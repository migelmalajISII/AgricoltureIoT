<?php
session_start();
$check = isset($_SESSION['islogged']) ? $_SESSION['islogged'] : FALSE;
if($check and $_SESSION['role']==='admin'){ }
else{ header('Location: ../'); }
?>
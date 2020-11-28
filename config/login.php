<?php
require('dal.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user=$_POST['inputUsername'];
    $pass=$_POST['inputPassword'];
    $result=login($user);
    if(password_verify ($pass,$result['password'])){
        session_start();
        $_SESSION['id']=$result['id'];
        $_SESSION['username']=$result['username'];
        $_SESSION['role']=$result['ruolo'];
        $_SESSION['islogged']=TRUE;
        header("Location: ../");
    } else{
        header("Location: ../");
    }
}
?>
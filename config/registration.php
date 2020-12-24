<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../public/header.php");
    include("../public/navbar.php");
    $user=$_POST["inputNUsername"];
    $role=isset($_POST["inputRuolo"]) ?  $_POST["inputRuolo"] : 'public';
    $token = registration($user,$_POST["inputCPassword"],$role);
    if($token!="Error"){
        echo "<h2 class='confirm-registration'>Ti sei registrato con successo!</h2>";
        echo "<h4 class='confirm-registration'>Il tuo username è: $user</h4>";
        echo "<h4 class='confirm-registration'>La tua API key è: $token</h4>";
    }else{
        echo "<h2 class='confirm-registration'>Errore!</h2>";
        echo "<h4 class='confirm-registration'>Qualcosa è andato storto. Riprova più tardi!</h4>";
    }
    include("../public/footer.php");
}
else{
    if($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['code']) and isset($_GET['user'])){
        if(htmlentities($_GET['code'])==='554'){
            require("./dal.php");
            $value=htmlentities($_GET['user']);
            echo existUsername($value);
        }else{
            header("Location:../");
        }
    }else{
        header("Location:../");
    }
}
?>
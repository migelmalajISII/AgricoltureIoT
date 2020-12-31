<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("../public/header.php");
    include("../public/navbar.php");
    $id=is_int($_SESSION['id']) ? intval($_SESSION['id']) : die("Error");
    $username=$_SESSION['username'];
    $token = newToken($id,$username);
    if($token!="Error"){
        echo "<h2 class='confirm-registration'>La tua API Key è stata cambiata con successo!</h2>";
        echo "<h4 class='confirm-registration'>Il tuo username è: $username</h4>";
        echo "<h4 class='confirm-registration'>La tua API key è: $token</h4>";
    }
    else{
        echo "<h2 class='confirm-registration'>Errore!</h2>";
        echo "<h4 class='confirm-registration'>Qualcosa è andato storto. Riprova più tardi!</h4>";
    }
    include("../public/footer.php");
}
else{
    header("Location: /");
}
?>
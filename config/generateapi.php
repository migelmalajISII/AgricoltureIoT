<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("../public/header.php");
    include("../public/navbar.php");
    $id=$_SESSION['id'];
    $username=$_SESSION['username'];
    $token = newToken($id,$username);
    if($token!="false"){
        echo "<h2 class='confirm-registration'>La tua API Key è cambiata con successo!</h2>";
        echo "<h4 class='confirm-registration'>Il tuo username è: $username</h4>";
        echo "<h4 class='confirm-registration'>La tua API key è: $token</h4>";
    }
    else{
        echo "<h2 class='confirm-registration'>Errore!</h2>";
        echo "<h4 class='confirm-registration'>Qualcosa è andato storto. Riprova più tardi!!</h4>";
    }
    include("../public/footer.php");
}
else{
    header("Location:../");
}
?>
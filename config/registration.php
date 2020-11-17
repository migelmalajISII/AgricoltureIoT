<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../public/header.php");
    include("../public/navbar.php");
    $user=$_POST["inputNUsername"];
    $role=isset($_POST["inputRuolo"]) ?  $_POST["inputRuolo"] : 'public';
    $token = registration($user,$_POST["inputCPassword"],$role);
    echo "<h2 class='confirm-registration'>Ti sei registrato con successo!</h2>";
    echo "<h4 class='confirm-registration'>Il tuo username è: $user</h4>";
    echo "<h4 class='confirm-registration'>La tua API key è: $token</h4>";
    include("../public/footer.php");
}
else{
    header("Location:../");
}
?>
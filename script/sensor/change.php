<?php
require('../../config/dal.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=htmlentities($_POST["idchange"]);
    $mr=htmlentities($_POST["inputMarca"]);
    $md=htmlentities($_POST["inputModello"]);
    $lt=isset($_POST["inputLatitudine"])?htmlentities($_POST["inputLatitudine"]):"NULL";
    $lg=isset($_POST["inputLongitudine"])?htmlentities($_POST["inputLongitudine"]):"NULL";
    $txt=isset($_POST["txtnote"])?htmlentities($_POST["txtnote"]):"NULL";
    updateSensor($id,$mr,$md,$lt,$lg,$txt);
}
header('Location: /admin');
?>
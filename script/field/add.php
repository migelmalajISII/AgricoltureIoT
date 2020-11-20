<?php
require('../../config/dal.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lt=htmlentities($_POST["inputLatitudine"]);
    $lg=htmlentities($_POST["inputLongitudine"]);
    $st=ConvertToText(intval(htmlentities($_POST["inputStato"])));
    $cl=isset($_POST["inputColtura"]) ? htmlentities($_POST["inputColtura"]) : 'NULL';
    addTerrain($lt,$lg,$st,$cl);
}
header('Location: ../../admin/admin.php');

function ConvertToText($num) {
    if ($num == 1) {
        return "Arato";
    } else if ($num == 2) {
        return "Coltivato";
    } else if ($num == 3) {
        return "Seminato";
    } else if ($num == 4) {
        return "Fase crescita 1";
    } else if ($num == 5) {
        return "Fase crescita 2";
    } else if ($num == 6) {
        return "Pronto per la raccolta";
    } else if ($num == 7) {
        return "Raccolto";
    }else return "Arato";
}
?>
<?php
require("../../config/dal.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['sensori']) and isset($_POST['sensori'])) {
    $id=intval($_POST['sensori']);
    deleteSensor($id);
    header('Location: /admin');
}
else{
    header('Location: /admin');
}
?>
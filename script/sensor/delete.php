<?php
require("../../config/dal.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_int($_POST['sensori']) and isset($_POST['sensori'])) {
    $id=intval($_POST['sensori']);
    deleteSensor($id);
    header("Location: ../../admin/admin.php");
}
else{
    header("Location: ../../error.php");
}
?>
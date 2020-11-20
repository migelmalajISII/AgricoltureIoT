<?php
require("../../config/dal.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['sensori'])){
        $id=intval($_POST['sensori']);
        deleteSensor($id);
    }
}
header("Location: ../../admin/admin.php");
?>
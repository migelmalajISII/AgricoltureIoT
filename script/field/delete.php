<?php
require("../../config/dal.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['terreni']))
    {
        $id=intval($_POST['terreni']);
        deleteTerrain($id);
    }
}
header("Location: ../../admin/admin.php");
?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require("./config/dal.php");
$tablePOST = json_decode(file_get_contents("php://input"),true);
$user=$_GET['user'];
$key=$_GET['apikey'];
$result=login($user);
if(password_verify ($key,$result['token'])){
    $tt=htmlentities($tablePOST['tt']);
    $th=htmlentities($tablePOST['th']);
    $at=htmlentities($tablePOST['at']);
    $ah=htmlentities($tablePOST['ah']);
    $uv=htmlentities($tablePOST['uv']);
    $dt=isset($tablePOST['dt'])?$tablePOST['dt']:date("Y-m-d");
    $hr=isset($tablePOST['hr'])?htmlentities($tablePOST['hr']):date("H:i:s");
    $idsensor=htmlentities($tablePOST['idsensore']);
    addDato($tt,$th,$at,$ah,$uv,$dt,$hr,$idsensor);
}
?>
<?php
require("./dal.php");
if(isset($_GET['request']) and isset($_GET['id']) and $_GET['code']=="695"){
    $value=$_GET['request'];
    $idsensor=$_GET['id'];
    switch ($value) {
        case 'chartMin':
            $result=getMinDatibyID($idsensor);
            break;
        case 'chartMax':
            $result=getMaxDatibyID($idsensor);
            break;
        case 'chartAvg':
            $result=getAvgDatibyID($idsensor);
            break;
        case 'chartDev':
            $result=getDevDatibyID($idsensor);
            break;
        default:
            $result=[];
            break;
    }

    $data1='';
    $data2='';
    $data3='';
    $data4='';
    $data5='';
    $data6='';
    while ($row = mysqli_fetch_array($result)) {
        $data1 = $data1 . '"'. $row['TT'].'",';
        $data2 = $data2 . '"'. $row['UT'] .'",';
        $data3 = $data3 . '"'. $row['TA'] .'",';
        $data4 = $data4 . '"'. $row['UA'] .'",';
        $data5 = $data5 . '"'. $row['UV'] .'",';
        $data6 = $data6 . '"'. $row['data'] .'",';
    }
    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $data3 = trim($data3,",");
    $data4 = trim($data4,",");
    $data5 = trim($data5,",");
    $data6 = trim($data6,",");
    echo ($data1.";".$data2.";".$data3.";".$data4.";".$data5.";".$data6);
} else {
    echo 'Errore';
}
?>
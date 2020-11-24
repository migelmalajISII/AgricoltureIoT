<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $dataa=isset($_GET['dtpicker'])? $_GET['dtpicker']:date("Y-m-d");
}
?>
<div class="mt-3">
    <h3 class="text-center">Dati medi del giorno
        <form  class=" col-lg-2 d-inline-block" method="GET" action='../public/index.php'>
            <input type="date" class="form-control text-center" name="dtpicker" id="dtpicker" value="<?=$dataa?>" onchange="submit()">
        </form>
    </h3>
</div>
<div class="row text-dark">
<?php
    $data=publicLoad($dataa);
    foreach($data as $row){
        $nomeSensore = "Sensore ". htmlentities($row['idsensore']);
        $temperatura_t = htmlentities($row['TT'])." °C";
        $umidita_t = htmlentities($row['UT'])." %";
        $temperatura_a = htmlentities($row['TA'])." °C";
        $umidita_a = htmlentities($row['UA'])." %";
        $indiceUV = htmlentities($row['UV']);
        include("../template/sensori_public.php");
    }?>
</div>
<div class="col-12 mt-3 text-center">
    <p>Ultimo aggiornamento alle
        <?=date("H:i:s d-m-Y");?>
    </p>
</div>
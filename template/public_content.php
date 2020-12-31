<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $dataa;
    if(isset($_GET['dtpicker'])) {
        $dataa = date_parse($_GET['dtpicker'])["warning_count"] > 0 ? date("Y-m-d"): $_GET['dtpicker'];
    } else $dataa = date("Y-m-d");
}
?>
    <div class="mt-3">
        <h3 class="text-center">Dati medi del giorno
            <form class=" col-lg-2 d-inline-block">
                <input type="date" class="form-control text-center" name="dtpicker" id="dtpicker" value="<?=$dataa?>" onchange="location.href = '../'+document.getElementById('dtpicker').value;">
            </form>
        </h3>
    </div>
    <div id="div-container">
        <div class="row">
            <div id="mapid" class="mapid" style="height: 80vh; width:100%;"></div>
        </div>
        <div class="row text-dark">
            <?php
        $data=publicLoad($dataa);
        foreach($data as $row){
            $nomeSensore = "Sensore ".htmlentities($row['idsensore']);
            $temperatura_t = htmlentities($row['TT'])." °C";
            $umidita_t = htmlentities($row['UT'])." %";
            $temperatura_a = htmlentities($row['TA'])." °C";
            $umidita_a = htmlentities($row['UA'])." %";
            $indiceUV = htmlentities($row['UV']);
            include("../template/sensori_public.php");
        }?>
        </div>
        <script type="text/javascript">
            var map = L.map('mapid').setView([45.044945, 9.690077], 6);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            <?php
                foreach($data as $row){
                    $nomeSensore = "Sensore ".htmlentities($row['idsensore']);
                    $marca=htmlentities($row['marca']);
                    $modello=htmlentities($row['modello']);
                    $latitudine=htmlentities($row['latitudine']);
                    $longitudine=htmlentities($row['longitudine']);
                    $temperatura_t = htmlentities($row['TT'])." °C";
                    $umidita_t = htmlentities($row['UT'])." %";
                    $temperatura_a = htmlentities($row['TA'])." °C";
                    $umidita_a = htmlentities($row['UA'])." %";
                    $indiceUV = htmlentities($row['UV']);
                ?>

            L.marker([<?=$latitudine?>, <?=$longitudine?>]).addTo(map)
                .bindPopup('Nome Identificativo: <?=$nomeSensore?><br>Marca: <?=$marca?><br>Modello: <?=$modello?><br>' +
                    'Temperatura Terreno: <?=$temperatura_t?><br>Umidità Terreno: <?=$umidita_t?><br>Temperatura Aria: <?=$temperatura_a?><br>' +
                    'Umidità Aria: <?=$umidita_a?><br>Indice UV: <?=$indiceUV?>');
            <?php
                }?>
        </script>
    </div>
    <div class="col-12 mt-3 text-center">
        <p>Ultimo aggiornamento alle
            <?=date("H:i:s d-m-Y");?>
        </p>
    </div>
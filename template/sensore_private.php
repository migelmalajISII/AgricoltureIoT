<?php
$idsensor = (isset($_GET['idsensor']) and is_numeric($_GET['idsensor']) )? intval($_GET['idsensor']) : header("Location: ../error.php");
$data=getDatibyID($idsensor);
?>
<div class="row my-5">
    <div class="col-5 riquadroSensori mx-3 my-2">
        <h5 class="card-title">Valori Minimi</h5>
        <div>
            <canvas id="chartMin" class="chartDesign"></canvas>
        </div>
    </div>
    <div class="col-5 riquadroSensori mx-3 my-2">
        <h5 class="card-title">Valori Massimi</h5>
        <div>
            <canvas id="chartMax" class="chartDesign"></canvas>
        </div>
    </div>
    <div class="col-5 riquadroSensori mx-3 my-2">
        <h5 class="card-title">Valori Medi</h5>
        <div>
            <canvas id="chartAvg" class="chartDesign"></canvas>
        </div>
    </div>
    <div class="col-5 riquadroSensori mx-3 my-2">
        <h5 class="card-title">Valori Standard Deviation</h5>
        <div>
            <canvas id="chartDev" class="chartDesign"></canvas>
        </div>
    </div>
</div>
<div class="row my-5 d-block">
    <div class="riquadroSensori">
        <div class="scrollingTable text-center">
            <table class="table table-striped table-dark" style="margin-bottom:0" id="tblDati">
                <thead>
                    <tr>
                        <th scope="col">Temperatura Terreno</th>
                        <th scope="col">Umidità Terreno</th>
                        <th scope="col">Temperatura Aria</th>
                        <th scope="col">Umidità Aria</th>
                        <th scope="col">Indice UV</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ 
                    $tt=htmlentities($row['temperatura_t']);
                    $ut=htmlentities($row['umidita_t']);
                    $ta=htmlentities($row['temperatura_a']);
                    $ua=htmlentities($row['umidita_a']);
                    $uv=htmlentities($row['indiceuv']);
                    $dI=htmlentities($row['Inserimento']);
                ?>
                    <tr>
                        <td><?=$tt?></td>
                        <td><?=$ut?></td>
                        <td><?=$ta?></td>
                        <td><?=$ua?></td>
                        <td><?=$uv?></td>
                        <td><?=$dI?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script> datoScroll();
LeggiDati("chartMin", <?=$idsensor?>);
LeggiDati("chartMax", <?=$idsensor?>);
LeggiDati("chartAvg", <?=$idsensor?>);
LeggiDati("chartDev", <?=$idsensor?>);
</script>
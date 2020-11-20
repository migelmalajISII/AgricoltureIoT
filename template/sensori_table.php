<?php
$data=allSensor();
?>
    <div class="m-4 riquadroSensori">
    <div class="row pt-3">
            <div class="col-9">
                <h5 class="card-title ml-5 pl-5">Sensori</h5>
            </div>
            <div class="col-3">
                <form action="../admin/sensor.php" method="GET">
                    <button type="submit" class="btn btn-outline-success">Aggiungi</button>
                </form>
            </div>
        </div>
        <div class="table-responsive-xl scrollingTable text-center">
            <div>
                <table class="table table-striped table-dark" id="tblSensore">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modello</th>
                            <th scope="col">Latitudine</th>
                            <th scope="col">Longitudine</th>
                            <th scope="col">Data Installazione</th>
                            <th scope="col">Terreno Attuale</th>
                            <th scope="col" colspan="2">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $row){ 
                            $id=htmlentities($row['idsensore']);
                            $marca=htmlentities($row['marca']);
                            $modello=htmlentities($row['modello']);
                            $latitudine=htmlentities($row['latitudine']);
                            $longitudine=htmlentities($row['longitudine']);
                            $dataInstallazione=htmlentities($row['datainstallazione']);
                            $idterra=htmlentities($row['idterreno']);
                        ?>
                        <tr>
                            <th scope="row"><?=$id?></th>
                            <td><?=$marca?></td>
                            <td><?=$modello?></td>
                            <td><?=$latitudine?></td>
                            <td><?=$longitudine?></td>
                            <td><?=$dataInstallazione?></td>
                            <td><?=$idterra?></td>
                            <td>
                            <form method="GET" action="../admin/sensor.php">
                                    <input type="hidden" name="sensori" value="<?=$id?>">
                                    <button type="submit" class="btn text-light"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="../script/sensor/delete.php">
                                    <input type="hidden" name="sensori" value="<?=$id?>">
                                    <button type="button" class="btn text-light" onclick="confirm('Sei sicuro di voler eliminare questo elemento?') ? submit(): false"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
echo('<script> sensoreScroll() </script>');
?>
<?php
$data=allTerrain();
?>
    <div class="m-4 riquadroSensori">
        <div class="row pt-3">
            <div class="col-9">
                <h5 class="card-title ml-5 pl-5">Terreni</h5>
            </div>
            <div class="col-3">
                <form action="../admin/field.php" method="GET">
                    <button type="submit" class="btn btn-outline-success">Aggiungi</button>
                </form>
            </div>
        </div>
        <div class="table-responsive-xl scrollingTable text-center">
            <div>
                <table class="table table-striped table-dark" id="tblTerreno">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Latitudine</th>
                            <th scope="col">Longitudine</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Coltura</th>
                            <th scope="col" colspan="2">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $row){ 
                            $id=htmlentities($row['idterreno']);
                            $latitudine=htmlentities($row['latitudine']);
                            $longitudine=htmlentities($row['longitudine']);
                            $st=htmlentities($row['statolavorazione']);
                            $coltura=htmlentities($row['coltura']);
                        ?>
                        <tr>
                            <th scope="row"><?=$id?></th>
                            <td><?=$latitudine?></td>
                            <td><?=$longitudine?></td>
                            <td><?=$st?></td>
                            <td><?=$coltura?></td>
                            <td>
                            <form method="GET" action="../admin/field.php">
                                    <input type="hidden" name="terreni" value="<?=$id?>">
                                    <button type="submit" class="btn text-light" data-toggle="tooltip" data-placement="bottom" title="Modifica"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="../script/field/delete.php">
                                    <input type="hidden" name="terreni" value="<?=$id?>">
                                    <button type="button" class="btn text-light" data-toggle="tooltip" data-placement="bottom" title="Elimina" onclick="confirm('Sei sicuro di voler eliminare questo elemento?') ? submit(): false"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
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
echo('<script> terrenoScroll() </script>');
?>
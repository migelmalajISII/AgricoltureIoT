<?php
$data=allSensor();
?>
<div class="m-4 riquadroSensori">
    <div class="row pt-3">
        <div class="col-9 pl-5">
            <h5 class="card-title">Sensori</h5>
        </div>
        <div class="col-3 text-right pr-5">
            <form action="/admin/create">
                <button type="submit" class="btn btn-outline-success">Aggiungi</button>
            </form>
        </div>
    </div>
    <div class="scrollingTable text-center">
        <table class="table table-striped table-dark table-hover" id="tblSensore" style="margin-bottom:0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modello</th>
                    <th scope="col">Latitudine</th>
                    <th scope="col">Longitudine</th>
                    <th scope="col">Data Installazione</th>
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
                ?>
                <tr>
                    <td scope="row"><a href="/admin/view/<?=$id?>"><?=$id?></a></td>
                    <td><?=$marca?></td>
                    <td><?=$modello?></td>
                    <td><?=$latitudine?></td>
                    <td><?=$longitudine?></td>
                    <td><?=$dataInstallazione?></td>
                    <td>
                        <form action="/admin/modify/<?=$id?>">
                            <button type="submit" class="btn text-light"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/script/sensor/delete.php">
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
<script> sensoreScroll() </script>
<script>
$(document).ready(function() {
    $('#tblSensore').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });
});
</script>
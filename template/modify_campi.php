<?php
if(isset($_GET['terreni'])){
    $id=$_GET['terreni'];
    $array=getTerrainByID($id);
    $titoloPagina="Modifica le informazioni di un terreno";
    $latitudine=$array['latitudine'];
    $longitudine=$array['longitudine'];
    $stato=ConvertToNum($array['statolavorazione']);
    $colture=$array['coltura'];
    $link="../script/field/change.php";
}else{
    $id=NULL;
    $titoloPagina="Aggiungi un nuovo terreno";
    $latitudine=NULL;
    $longitudine=NULL;
    $stato=1;
    $colture=NULL;
    $link="../script/field/add.php";
}

function ConvertToNum($text) {
    if ($text == "Arato") {
        return 1;
    } else if ($text == "Coltivato") {
        return 2;
    } else if ($text == "Seminato") {
        return 3;
    } else if ($text == "Fase crescita 1") {
        return 4;
    } else if ($text == "Fase crescita 2") {
        return 5;
    } else if ($text == "Pronto per la raccolta") {
        return 6;
    } else if ($text == "Raccolto") {
        return 7;
    }else return 1;
}
?>

<div class="text-dark py-md-4 col-md-6 bg-light">
    <form method="POST" action="<?=$link?>">
        <h3 class="text-center"><?=$titoloPagina?></h3>
        <div class="form-row col-xs">
            <div class="form-group col-md-6">
                <label for="inputLatitudine">Latitudine</label>
                <input type="text" class="form-control" id="inputLatitudine" name="inputLatitudine" placeholder="45.489256" value="<?=$latitudine?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputLongitudine">Longitudine</label>
                <input type="text" class="form-control" id="inputLongitudine" name="inputLongitudine" placeholder="9.088674" value="<?=$longitudine?>" required>
            </div>
        </div>
        <div class="form-row col-xs">
            <div class="form-group col-md-12" id="divStato">
                <label for="inputStato">Stato</label>
                <select id="inputStato" class="form-control" onclick="ShowColture()" name="inputStato">
                    <option value="1">Arato</option>
                    <option value="2">Coltivato</option>
                    <option value="3">Seminato</option>
                    <option value="4">Fase crescita 1</option>
                    <option value="5">Fase crescita 2</option>
                    <option value="6">Pronto per la raccolta</option>
                    <option value="7">Raccolto</option>
            </select>
            </div>
            <div class="form-group col-md-6 d-none" id="divColtura">
                <label for="inputColtura">Coltura</label>
                <input type="text" class="form-control" id="inputColtura" name="inputColtura" placeholder="Mais" value="<?=$colture?>">
            </div>
        </div>
        <input type="hidden" name="idchange" value="<?=$id?>">
        <button type="submit" class="btn btn-success">Salva</button>
        <button type="button" class="btn btn-outline-primary" onclick="window.location='../admin/admin.php';">Annulla</button>
    </form>
</div>
<script> ActivateOption('<?=$stato?>',"inputStato");ShowColture();</script>
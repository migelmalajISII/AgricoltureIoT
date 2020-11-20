<?php
$list=getTerrainToList();
if(isset($_GET['sensori'])){
    $id=$_GET['sensori'];
    $array=getSensorByID($id);
    $titoloPagina="Modifica le informazioni di un sensore";
    $marca=$array['marca'];
    $modello=$array['modello'];
    $latitudine=isset($array['latitudine'])?$array['latitudine']:NULL;
    $longitudine=isset($array['longitudine'])?$array['longitudine']:NULL;
    $terreno=isset($array['idterreno'])?$array['idterreno']:NULL;
    $note=isset($array['note'])?$array['note']:-1;
    $link="../script/sensor/change.php";
}else{
    $id=NULL;
    $titoloPagina="Aggiungi un nuovo sensore";
    $marca=NULL;
    $modello=NULL;
    $latitudine=NULL;
    $longitudine=NULL;
    $terreno=-1;
    $note=NULL;
    $link="../script/sensor/add.php";
}
?>

<div class="text-dark py-md-4 col-md-6 bg-light">
    <form method="POST" action="<?=$link?>">
        <h3 class="text-center"><?=$titoloPagina?></h3>
        <div class="form-row col-xs">
            <div class="form-group col-md-6">
                <label for="inputMarca">Marca</label>
                <input type="text" class="form-control" id="inputMarca" name="inputMarca" placeholder="Arduino" value="<?=$marca?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputModello">Modello</label>
                <input type="text" class="form-control" id="inputModello" name="inputModello" placeholder="SmartAgro" value="<?=$modello?>" required>
            </div>
        </div>
        <div class="form-row col-xs">
            <div class="form-group col-md-6">
                <label for="inputLatitudine">Latitudine</label>
                <input type="text" class="form-control" id="inputLatitudine" name="inputLatitudine" placeholder="45.489256"  value="<?=$latitudine?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputLongitudine">Longitudine</label>
                <input type="text" class="form-control" id="inputLongitudine" name="inputLongitudine"  placeholder="9.088674" value="<?=$longitudine?>">
            </div>
        </div>
        <div class="form-row col-xs">
            <div class="form-group col-md-12" id="divTerreno">
                <label for="inputTerreno">Selezione terreno</label>
               <select id="inputTerreno" class="form-control" name="inputTerreno" value=<?=$terreno?>>
               <option value="-1">Nessun terreno</option>
                    <?php foreach($list as $row){
                        ?>
                        <option value="<?=$row['idterreno']?>"><?=$row['nameterrain']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row col-xs">
            <div class="form-group col-md-12">
                <label for="txtnote">Note</label>
                <textarea class="form-control" id="txtNote" name="txtnote"><?=$note?></textarea>
            </div>
        </div>
        <input type="hidden" name="idchange" value="<?=$id?>">
        <button type="submit" class="btn btn-success">Salva</button>
        <button type="button" class="btn btn-outline-primary" onclick="window.location='../admin/admin.php';">Annulla</button>
    </form>
</div>
<script> ActivateOption('<?=$terreno?>', "inputTerreno");</script>
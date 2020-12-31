<div class="row justify-content-center text-dark">
    <div class="py-4 col-lg-4 bg-light">
        <form method="POST" action="../config/registration.php" class="needs-validation">
            <h2 class="text-center">Aggiungi un utente</h2>
            <div class="form-group col-md">
                <label for="inputNUsername">Username</label>
                <input type="text" class="form-control" id="inputNUsername" name="inputNUsername" placeholder="Username" autocomplete="off" onblur="ExistUser()"required>
                <div class="invalid-feedback">
                    Inserisci un username valido
                </div>
            </div>
            <div class="form-group col-md was-validated">
                <label for="inputNPassword">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="inputNPassword" name="inputNPassword" placeholder="Password" autocomplete="off" oninput="CheckPassword()" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i toggle="#inputNPassword" class="fa fa-fw fa-eye toggle-password"></i></span>
                    </div>
                    <div class="invalid-feedback">
                        Inserire una password
                    </div>
                </div>
            </div>
            <div class="form-group col-md">
                <label for="inputCPassword">Conferma la password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="inputCPassword" name="inputCPassword" placeholder="Password" autocomplete="off" oninput="CheckPassword()" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i toggle="#inputCPassword" class="fa fa-fw fa-eye toggle-password"></i></span>
                    </div>
                    <div class="invalid-feedback">
                        La password non corrisponde
                    </div>
                </div>
            </div>
            <div class="form-group col-md" id="divRuolo">
                <label for="inputRuolo">Privilegi</label>
                <select class="form-control" id="inputRuolo" name="inputRuolo" <?php echo(isset($_SESSION[ 'islogged']) ? '' : 'disabled') ?>>
                    <option value="public" selected>Di base</option>
                    <option value="admin">Di amministratore</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success col-md" id="bttSend">Registrati</button>
        </form>
    </div>
</div>
<script>ShowPassword();</script>
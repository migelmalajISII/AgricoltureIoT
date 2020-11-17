<nav class="navbar navbar-expand-md navbar-dark background">
    <a class="navbar-brand font-weight-bold" href="../">Agriculture IoT</a>
    <?php if(isset($_SESSION['islogged'])) { ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../">Home</a>
            </li>
            <li class="nav-item">
                <a id="adlink" class="nav-link" href="../admin/admin.php">Administrator</a>
            </li>
        </ul>
        <form class="form-inline" action="../config/logout.php">
            <div class="form-group">
                <h4 class="margin-right">Hi <?=$_SESSION['username']?>!</h4>
                <button class="btn text-light"><i class="fa fa-sign-out" style="font-size:200%"></i></button>
            </div>
        </form>
    </div>
    <?php } else { ?>
        <ul class="navbar-nav mr-auto">
        </ul>
    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Login <span class="caret"></span></button>
    <div class="dropdown-menu dropdown-menu-right disable-left">
        <form class="px-4 py-3" method="POST" action="../config/login.php">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input class="form-control" type="text" name="inputUsername" id="inputUsername" placeholder="Inserisci l'username" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input class="form-control" type="password" name="inputPassword" id="inputPassword" placeholder="Inserisci la password" required>
            </div>
            <button type="submit" class="btn btn-primary col-lg">Login</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-center" href="registration.php"><i class="fa fa-user" aria-hidden="true"></i>  Registrati!</a>
    </div>
    <?php } ?>
</nav>
<div class="container">
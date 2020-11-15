<nav class="navbar navbar-expand-md navbar-dark background">
    <a class="navbar-brand font-weight-bold" href="../">Agriculture IoT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./admin.php">Administrator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../registration.php">Registratione</a>
            </li>
        </ul>
        <?php if(isset($_SESSION['islogged'])) { ?>
        <form class="form-inline" action="../config/logout.php">
            <div class="form-group">
                <h4 class="margin-right">Hi <?=$_SESSION['username']?>!</h4>
                <button class="btn text-light"><i class="fa fa-sign-out" style="font-size:200%"></i></button>
            </div>
        </form>
        <?php } ?>
    </div>
</nav>
<div class="container">

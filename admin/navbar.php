<nav class="navbar navbar-expand navbar-dark background">
    <a class="navbar-brand font-weight-bold" href="../">Agriculture IoT</a>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./admin.php">Administrator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/registration.php">Registrazione</a>
            </li>
        </ul>
        <?php if(isset($_SESSION['islogged'])) { ?>
        <form class="form-inline" action="../config/logout.php">
            <div class="form-group">
                <div class="dropdown">
                    <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <h4 class="margin-right confirm-registration">Hi
                            <?=$_SESSION['username']?>!</h4>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="../config/generateapi.php">Hai dimenticato la tua API Key? Ottienine una nuova!</a>
                    </div>
                </div>

                <button class="btn text-light"><i class="fa fa-sign-out" style="font-size:200%"></i></button>
            </div>
        </form>
        <?php } ?>
    </div>
</nav>
<div class="container">
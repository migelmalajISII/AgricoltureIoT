<nav class="navbar navbar-expand-md navbar-dark background">
    <a class="navbar-brand font-weight-bold" href=".">Agriculture IoT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href=".">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Administrator</a>
            </li>
        </ul>
        <?php $ok=true; if($ok) { ?>
        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Login <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right mt-2">
            <li class="px-3 py-2">
                <form class="form-horizontal" method="POST" action="config/login.php">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input class="form-control" type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input class="form-control" type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                    </div>
                    <button class="btn btn-primary" type="submit">Login</button>
                </form>
            </li>
        </ul>
        <?php } else { ?>
        <form class="form-inline" action="config/logout.php">
            <div class="form-group">
                <h4 class="margin-right">Hi {name}!</h4>
                <button class="btn text-light"><i class="fa fa-sign-out" style="font-size:200%"></i></button>
            </div>
        </form>
        <?php } ?>
    </div>
</nav>
<div class="container">
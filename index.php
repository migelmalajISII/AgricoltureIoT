<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="script/js/script.js"></script>
    <?php include("config/db.php"); ?>
</head>

<body class="text-light">
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
            <form class="form-inline" method="POST" action="config/login.php">
                <input class="form-control mr-sm-2" type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Login</button>
            </form>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>
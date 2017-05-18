<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php if (isset($_SESSION['user']) == false) { ?>

                <li>
                    <a href="/login">Login</a>
                </li>

                <?php } ?>

                <li>
                    <a href="/signup">Signup</a>
                </li>

                <?php if (isset($_SESSION['user'])) { ?>

                    <li>
                        <a href="/logout" onClick="return window.confirm('Do you want to logout?')">Logout (<?= $_SESSION['user']['username'] ?>)</a>
                    </li>

                <?php } ?>

                <li>
            </ul>
        </div>
    </div>
</nav>

<div class="alert alert-danger">
    <?php if (empty($alert) == false) {
        echo $alert;
    } ?>
</div>

<?php include $view; ?>

</body>
</html>

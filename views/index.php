<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <h1><small>Commentaries</small></h1>
        <?php foreach ($messages as $message) { ?>
            <div class="thumbnail">
                <div class="caption comment clearfix">

                    <img style='float:left;width:100px;height:100px; margin-right:15px;' src="" alt="No Image"
                         onerror="this.src = 'http://xn--174-5cd3cgu2f.xn--p1ai/wp-content/uploads/2015/09/noavatar.png'"/>

                    <div class="text-justify text">
                        <?php
                        foreach ($message as $item) {
                            echo $item."<br>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

</body>
</html>
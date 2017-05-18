<div class="col-md-6 col-md-offset-3">

    <h1><small><?= $title ?></small></h1>

    <?php if (isset($_SESSION['user'])) { ?>

        <a href="#" onclick="show()">Create</a>

        <?php include $create ?>

    <?php } else { ?>

        <p>To create comment you must <a href="/login">Login</a></p>

    <?php } ?>

    <?php foreach ($messages as $message) { ?>
        <div class="thumbnail">
            <div class="caption comment clearfix">

                <img style='float:left;width:100px;height:100px; margin-right:15px;' src="" alt="No Image"
                     onerror="this.src = 'http://xn--174-5cd3cgu2f.xn--p1ai/wp-content/uploads/2015/09/noavatar.png'"/>

                <div class="text-justify text">
                    <?php
                    $author = new \Comments\models\User();
                    $authorName = $author->findById($message[1]);
                    echo "<p>".$authorName['username']."<span class='pull-right'>".$message[3]."</span></p>".'<br>';
                    echo "<p>".$message[2]."</p>".'<br>';
                    ?>

                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $message[1]) { ?>

                        <a href="/update/<?= $message[0] ?>">Update</a> |
                        <a href="/delete/<?= $message[0] ?>" onClick="return window.confirm('Do you want to delete this item?')">Delete</a>

                    <?php } ?>

                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
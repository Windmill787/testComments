<div class="col-md-6 col-md-offset-3">

    <h1><small><?= $title ?></small></h1>
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
                    <a href="/update/<?= $message[0] ?>">Update</a>
                    <a href="/delete/<?= $message[0] ?>">Delete</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<div class="col-md-4 col-md-offset-4">

    <h1><small><?= $title ?></small></h1>

    <form action="/login" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control"
                   id="username" name="username" value="<?= @$_POST['username'] ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"
                   id="pwd" name="password" value="<?= @$_POST['password'] ?>">
        </div>
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>

</div>
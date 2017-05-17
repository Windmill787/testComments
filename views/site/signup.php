<div class="col-md-4 col-md-offset-4">

    <h1><small><?= $title ?></small></h1>

    <form action="/signup" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control"
                   id="username" name="username" value="<?= @$_POST['username'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control"
                   id="email" name="email" value="<?= @$_POST['email'] ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"
                   id="pwd" name="password" value="<?= @$_POST['password'] ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Repeat password:</label>
            <input type="password" class="form-control"
                   id="pwd" name="repeat_password" value="<?= @$_POST['repeat_password'] ?>">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>

</div>
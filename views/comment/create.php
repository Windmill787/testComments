<div class="col-md-6">
    <h1><small><?= $title ?></small></h1>

    <form action="/create" method="post">
        <div class="form-group">
            <label for="exampleTextarea">Comment</label>
            <textarea class="form-control" id="exampleTextarea" rows="7"
                      style="max-width: 100%" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
</div>
<?php $pagetitle = 'New Post';
include __DIR__ . '/../parts/header.php' ?>

<div class="container">
    <h1><?= $pagetitle ?></h1>

    <form action="/admin/posts" method="post">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">

        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input name="slug" type="text" class="form-control" id="slug">
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" class="form-control" id="excerpt"></textarea>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control simplemde" id="body"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</div>

<?php include __DIR__ . '/../parts/footer.php' ?>

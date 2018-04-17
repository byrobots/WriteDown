<?php $pagetitle = 'Editing ' . $post['data']->title;
include __DIR__ . '/../parts/header.php' ?>

<form action="/admin/posts/<?= $post['data']->id ?>" method="post">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">

    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title"
               value="<?= array_key_exists('title', $old) ? $old['title'] : $post['data']->title ?>">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input name="slug" type="text" class="form-control" id="slug"
               value="<?= array_key_exists('slug', $old) ? $old['slug'] : $post['data']->slug ?>">
    </div>

    <div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea name="excerpt" class="form-control" id="excerpt">
            <?= array_key_exists('excerpt', $old) ? $old['excerpt'] : $post['data']->excerpt ?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control simplemde" id="body">
            <?= array_key_exists('body', $old) ? $old['body'] : $post['data']->body ?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="publish_at">Publish At</label>
        <input name="publish_at" type="text" class="form-control datetimepicker" id="publish_at"
               value="<?= array_key_exists('publish_at', $old) ? $old['publish_at'] : $post['data']->publish_at->format('Y-m-d H:i:s') ?>">
    </div>

    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>
</form>

<?php include __DIR__ . '/../parts/footer.php' ?>

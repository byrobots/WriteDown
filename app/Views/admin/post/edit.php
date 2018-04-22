<?php $pagetitle = 'Editing ' . $resource['data']->title;
include __DIR__ . '/../parts/header.php' ?>

<form action="/admin/posts/edit/<?= $resource['data']->id ?>" method="post">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">

    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title"
               value="<?= array_key_exists('title', $old) ? $old['title'] : $resource['data']->title ?>">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input name="slug" type="text" class="form-control" id="slug"
               value="<?= array_key_exists('slug', $old) ? $old['slug'] : $resource['data']->slug ?>">
    </div>

    <div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea name="excerpt" class="form-control" id="excerpt"><?=
            array_key_exists('excerpt', $old) ? $old['excerpt'] : $resource['data']->excerpt ?></textarea>
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control simplemde" id="body"><?=
            array_key_exists('body', $old) ? $old['body'] : $resource['data']->body ?></textarea>
    </div>

    <div class="form-group">
        <?php $publishAt = null;

        if (isset($old['publish_at'])) {
            $publishAt = $old['publish_at']->format('Y-m-d H:i:s');
        } else if (!array_key_exists('publish_at', $old) and isset($resource['data']->publish_at)) {
            $publishAt = $resource['data']->publish_at->format('Y-m-d H:i:s');
        } ?>

        <label for="publish_at">Publish At</label>
        <input name="publish_at" type="text" class="form-control datetimepicker"
            id="publish_at" value="<?= $publishAt ?>">
    </div>

    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>
</form>

<?php include __DIR__ . '/../parts/footer.php' ?>

<?php $pagetitle = 'Editing &ldquo;' . $resource['data']->name . '&rdquo;';
include __DIR__ . '/../parts/header.php' ?>

<form action="/admin/tags/edit/<?= $resource['data']->id ?>" method="post">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">

    <div class="form-group">
        <label for="name">Tag</label>
        <input name="name" type="text" class="form-control" id="name"
               value="<?= array_key_exists('name', $old) ? $old['name'] : $resource['data']->name ?>">
    </div>

    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>
</form>

<?php include __DIR__ . '/../parts/footer.php' ?>

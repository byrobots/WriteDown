<?php $pagetitle = 'New Tag';
include __DIR__ . '/../parts/header.php' ?>

<form action="/admin/tags" method="post">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">

    <div class="form-group">
        <label for="name">Tag</label>
        <input name="name" type="text" class="form-control" id="name"
               value="<?= array_key_exists('name', $old) ? $old['name'] : '' ?>">
    </div>

    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>
</form>

<?php include __DIR__ . '/../parts/footer.php' ?>

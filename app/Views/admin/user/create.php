<?php $pagetitle = 'New Post';
include __DIR__ . '/../parts/header.php' ?>

<form action="/admin/users" method="post">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control" id="email"
               value="<?= array_key_exists('email', $old) ? $old['email'] : '' ?>">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" value="">
    </div>

    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>
</form>

<?php include __DIR__ . '/../parts/footer.php' ?>

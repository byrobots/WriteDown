<?php $pagetitle = 'Users';
include __DIR__ . '/../parts/header.php' ?>

<nav class="nav nav-pills nav-justified sub-nav">
    <a class="nav-link active" href="/admin/users/new">New</a>
</nav>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resources['data'] as $user) { ?>
            <tr>
                <td scope="row"><?= $user->id ?></td>
                <td><?= $user->email ?></td>
                <td><a href="/admin/users/<?= $user->id ?>" class="btn btn-warning">Edit</a></td>
                <td><a href="/admin/users/<?= $user->id ?>/delete" class="btn btn-danger confirm">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include __DIR__ . '/../parts/footer.php' ?>

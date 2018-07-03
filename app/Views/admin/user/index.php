<?php $pagetitle = 'Users';
$subnav          = '<a class="nav-link active" href="/admin/users/new">New</a>';
include __DIR__ . '/../parts/header.php' ?>

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
                <td><a href="/admin/users/edit/<?= $user->id ?>" class="btn btn-warning">Edit</a></td>
                <td><a href="/admin/users/delete/<?= $user->id ?>?csrf=<?= $csrf ?>" class="btn btn-danger confirm">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include __DIR__ . '/../parts/footer.php' ?>

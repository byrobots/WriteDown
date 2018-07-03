<?php $pagetitle = 'Tags';
$subnav          = '<a class="nav-link active" href="/admin/tags/new">New</a>';
include __DIR__ . '/../parts/header.php' ?>

<?php if (count($resources['data']) < 1) { ?>
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">No tags yet - <a href="/admin/tags/new">add one</a>!</p>
    </div>
<?php } else { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tag</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resources['data'] as $tag) { ?>
                <tr>
                    <td scope="row"><?= $tag->id ?></td>
                    <td><?= $tag->name ?></td>
                    <td><a href="/admin/tags/edit/<?= $tag->id ?>" class="btn btn-warning">Edit</a></td>
                    <td><a href="/admin/tags/delete/<?= $tag->id ?>?csrf=<?= $csrf ?>" class="btn btn-danger confirm">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php include __DIR__ . '/../parts/pagination.php' ?>
<?php } ?>

<?php include __DIR__ . '/../parts/footer.php' ?>

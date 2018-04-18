<?php $pagetitle = 'Posts';
include __DIR__ . '/../parts/header.php' ?>

<?php if (count($resources['data']) < 1) { ?>
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">No posts yet - <a href="/admin/posts/new">get writing</a>!</p>
    </div>
<?php } else { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Published?</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resources['data'] as $post) { ?>
                <tr>
                    <td scope="row"><?= $post->id ?></td>
                    <td><?= $post->title ?></td>
                    <td>
                        <?php if (empty($post->publish_at)) { ?>
                            No
                        <?php } else {
                            if ($post->publish_at < new DateTime('now')) { ?>
                                Yes
                            <?php } else { ?>
                                Published on
                                <?= $post->publish_at->format('l jS F Y') ?> at
                                <?= $post->publish_at->format('H:i:s') ?>
                            <?php }
                        } ?>
                    </td>
                    <td><a href="/admin/posts/<?= $post->id ?>" class="btn btn-warning">Edit</a></td>
                    <td><a href="/admin/posts/<?= $post->id ?>/delete" class="btn btn-danger confirm">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

<?php include __DIR__ . '/../parts/footer.php' ?>

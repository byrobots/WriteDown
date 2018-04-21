<?php $pagetitle = $post['data']->title;
include __DIR__ . '/../parts/header.php' ?>

<article class="col-md-8 offset-md-2 single-post">
    <header>
        <h1 class="h3"><?= $post['data']->title ?></h1>

        <p class="post-published">Published on <?= $post['data']->publish_at->format('l jS F Y \a\t H:i:s') ?></p>
    </header>

    <?php if (!empty($post['data']->excerpt)) { ?>
        <p class="post-excerpt"><?= $post['data']->excerpt ?></p>
    <?php } ?>

    <?= $post['data']->body ?>
</article>

<?php include __DIR__ . '/../parts/footer.php' ?>

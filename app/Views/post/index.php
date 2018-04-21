<?php $pagetitle = 'Home';
include __DIR__ . '/../parts/header.php';

if (count($posts['data']) < 1) { ?>
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">Nothing here yet, but check back soon!</p>
    </div>
<?php } else { ?>
    <ol class="col-md-8 offset-md-2 post-list">
        <?php foreach ($posts['data'] as $post) { ?>
            <li class="post">
                <header>
                    <h2 class="h3"><a href="<?= $post->slug ?>"><?= $post->title ?></a></h2>
                    <p class="post-published">Published on <?= $post->publish_at->format('l jS F Y \a\t H:i:s') ?></p>
                </header>

                <?php if (!empty($post->excerpt)) { ?>
                    <p><?= $post->excerpt ?></p>
                <?php } ?>
            </li>
        <?php } ?>
    </ol>

    <?php include __DIR__ . '/../parts/pagination.php';
}

include __DIR__ . '/../parts/footer.php' ?>

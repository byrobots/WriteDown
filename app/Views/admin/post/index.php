<?php $pagetitle = 'Posts';
include __DIR__ . '/../parts/header.php' ?>

<?php if (count($posts['data']) < 1) { ?>
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">No posts yet - <a href="/admin/posts/new">get writing</a>!</p>
    </div>
<?php } else { ?>

<?php } ?>

<?php include __DIR__ . '/../parts/footer.php' ?>

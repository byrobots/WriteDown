<?php if ($resources['meta']['total_pages'] > 1) { ?>
    <nav>
        <ul class="pagination">
            <?php if ($resources['meta']['current_page'] == 1) { ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            <?php } else { ?>
                <li class="page-item">
                    <a href="/admin/posts/<?= $resources['meta']['current_page'] - 1 ?>">Previous</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php } ?>

<?php if ($resources['meta']['total_pages'] > 1) { ?>
    <nav>
        <ul class="pagination">
            <li class="page-item<?= $resources['meta']['current_page'] == 1 ? ' disabled' : '' ?>">
                <a class="page-link"
                   href="<?= $resources['meta']['current_page'] == 1 ? '#' : '/admin/posts/' . ($resources['meta']['current_page'] - 1) ?>"
                   tabindex="-1">Previous</a>
            </li>

            <?php $index = 0;
            while ($index < $resources['meta']['total_pages']) { ?>
                <li class="page-item<?= $index + 1 == $resources['meta']['current_page'] ? ' active' : '' ?>">
                    <a href="/admin/posts/<?= $index + 1 ?>" class="page-link"><?= $index + 1 ?></a>
                </li>
                <?php $index++;
            } ?>

            <li class="page-item<?= $resources['meta']['current_page'] == $resources['meta']['total_pages'] ? ' disabled' : '' ?>">
                <a class="page-link"
                   href="<?= $resources['meta']['current_page'] == $resources['meta']['total_pages'] ? '#' : '/admin/posts/' . ($resources['meta']['current_page'] + 1) ?>" tabindex="-1">Next</a>
            </li>
        </ul>
    </nav>
<?php } ?>

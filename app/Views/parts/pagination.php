<?php if ($posts['meta']['total_pages'] > 1) { ?>
    <nav>
        <ul class="pagination">
            <li class="page-item<?= $posts['meta']['current_page'] == 1 ? ' disabled' : '' ?>">
                <a class="page-link"
                   href="<?= $posts['meta']['current_page'] == 1 ? '#' : '/posts/' . ($posts['meta']['current_page'] - 1) ?>"
                   tabindex="-1">Previous</a>
            </li>

            <?php $index = 0;
            while ($index < $posts['meta']['total_pages']) { ?>
                <li class="page-item<?= $index + 1 == $posts['meta']['current_page'] ? ' active' : '' ?>">
                    <a href="/posts/<?= $index + 1 ?>" class="page-link"><?= $index + 1 ?></a>
                </li>
                <?php $index++;
            } ?>

            <li class="page-item<?= $posts['meta']['current_page'] == $posts['meta']['total_pages'] ? ' disabled' : '' ?>">
                <a class="page-link"
                   href="<?= $posts['meta']['current_page'] == $posts['meta']['total_pages'] ? '#' : '/posts/' . ($posts['meta']['current_page'] + 1) ?>" tabindex="-1">Next</a>
            </li>
        </ul>
    </nav>
<?php } ?>

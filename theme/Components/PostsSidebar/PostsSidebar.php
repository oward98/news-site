<?php

require get_template_directory() . '/Components/LatestPosts/LatestPosts.php';

function PostsSidebar($numOfPosts) {
    ?>
    <aside id='postsSidebar'>
        <?= LatestPosts($numOfPosts) ?>
    </aside>
    <?php
}


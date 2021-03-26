<?php

require getComponentPath('LatestPosts');


function PostsSidebar($numOfPosts) {
    ?>
    <aside id='postsSidebar'>
        <?= LatestPosts($numOfPosts) ?>
    </aside>
    <?php
}


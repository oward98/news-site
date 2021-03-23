<?php

function echoBreadcrumbs($ancestorIDs) {
    $ancestorIDsCorrectOrder = array_reverse($ancestorIDs);
    ?>
    <nav id='breadcrumbs'>
        <ul id='breadcrumbsList'>
            <li><a href=<?=home_url()?>>Home</a></li>
            <?php
            foreach($ancestorIDsCorrectOrder as $ID) {
                $title = get_the_title($ID);
                $permalink = get_permalink($ID);
                ?>
                <li>
                    <a href=<?=$permalink?>><?=$title?></a>
                </li>
                <?php
            }
            ?>
            <li><?=the_title()?></li>
        </ul>
    </nav>
    <?php                        
};

function Breadcrumbs() {
    $ancestorIDs = get_post_ancestors($ID);
    echoBreadcrumbs($ancestorIDs);
    //wp_enqueue_script('stickyBreadcrumbs', get_template_directory_uri() . '/Components/Breadcrumbs/Breadcrumbs.js');
}
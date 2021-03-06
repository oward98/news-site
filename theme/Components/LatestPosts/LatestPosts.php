<?php

function LatestPosts($numOfPosts) {
    $post_args = array('meta_key' => '_thumbnail_id', 'numberposts' => $numOfPosts);
    $latest_posts_with_images = get_posts($post_args);
    foreach($latest_posts_with_images as $post) {
        $ID = $post->ID;

        $title = $post->post_title;
        $date = get_the_date('', $ID);
        $excerpt = $post->post_excerpt;
        $permalink = get_permalink($ID);

        $thumbnail = get_the_post_thumbnail($ID, 'large');

        ?>
        <a href=<?=$permalink?> class='pagePreview smallMargin flex column'>
            <div class='pageThumbnailContainer'>
                <?=$thumbnail?>
            </div>
            <summary>
                <h3><?=$title?></h3>
                <span><?=$date?></span>
            </summary>
        </a>
        <?php
    }
}
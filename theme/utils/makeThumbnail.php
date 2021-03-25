<?php

function makeThumbnail($post, $size) {
    $ID = $post->ID;

    $title = $post->post_title;
    $excerpt = $post->post_excerpt;
    $permalink = get_permalink($ID);

    $thumbnail = get_the_post_thumbnail($ID, 'large');

    ?>
    <a href=<?=$permalink?> class='pagePreview'>
        <?php if ($size=='big' || $size=='medium') {
            echo "<div class='pageThumbnailContainer'>
                    $thumbnail
                    </div>";
        }
        ?>
        <summary>
            <h3><?=$title?></h3>
            <span><?=$excerpt?></span>
        </summary>
    </a>
    <?php
}
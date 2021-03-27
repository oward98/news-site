<?php

function makeThumbnail($post, $size) {
    $ID = $post->ID;

    $title = $post->post_title;
    $excerpt = $post->post_excerpt;
    $permalink = get_permalink($ID);

    $thumbnail = get_the_post_thumbnail($ID, 'large');
    $date = get_the_date('', $ID);

    $author = get_post_meta( $ID, 'author', true );
    ?>
    <a href=<?=$permalink?> class='pagePreview smallPadding flex column'>
        <?php if ($size=='big' || $size=='medium') {
            echo "<div class='pageThumbnailContainer'>
                    $thumbnail
                    </div>";
        }
        ?>
        <summary>
            <h3><?=$title?></h3>
            <span><?=$excerpt?></span>
            <div class='pagePreviewMeta'>
                <span class='pagePreviewAuthor'><?=$author?></span>
                <span class='pagePreviewDate'><?=$date?></span>
            </div>
        </summary>
    </a>
    <?php
}
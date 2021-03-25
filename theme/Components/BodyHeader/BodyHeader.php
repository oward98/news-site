<?php

function BodyHeader() {
    $title = get_the_title();
    $belowTitle = is_single() ? get_the_date() : get_the_excerpt();
    $featuredImageURL = get_the_post_thumbnail_url();
    ?>
    <header class='bodyHeader <?= $featuredImageURL ? 'hasBackgroundImage' : 'noBackgroundImage outer' ?>'>
        <h2 class='bodyTitle'><?=$title?></h2>
        <span><?=$belowTitle?></span>
    </header>
    <?php
}
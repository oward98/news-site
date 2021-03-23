<?php

function BodyHeader() {
    $title = get_the_title();
    $belowTitle = is_single() ? get_the_date() : get_the_excerpt();
    ?>
    <header class='bodyHeader'>
        <h2 class='bodyTitle'><?=$title?></h2>
        <span><?=$belowTitle?></span>
    </header>
    <?php
}
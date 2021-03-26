<?php

require getComponentPath('SiteHeader');
require getComponentPath('Head');
require getComponentPath('Breadcrumbs');

?>

<!DOCTYPE html>
<html lang="en-gb">
    <?=Head()?>
    <body>
        <div id='headerBackgroundImage' style="background-image: url(<?=get_the_post_thumbnail_url($post, 'full')?>); background-size: cover; overflow: auto; background-position: center center; position: relative;">
            <?php SiteHeader()?>
            <?php !is_front_page() && BodyHeader() ?>
            <?php (is_page() && !is_front_page()) && Breadcrumbs() ?>
        </div>
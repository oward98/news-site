<?php
require get_template_directory() . '/Components/SiteHeader/SiteHeader.php';
require get_template_directory() . '/Components/Head/Head.php';
//require get_template_directory() . '/Components/Breadcrumbs/Breadcrumbs.php';
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
<?php
require get_template_directory() . '/Components/SiteHeader/SiteHeader.php';
require get_template_directory() . '/Components/Head/Head.php';
?>

<!DOCTYPE html>
<html lang="en-gb">
    <?=Head()?>
    <body>
        <div id='headerBackgroundImage' style="background-image: url(<?=get_the_post_thumbnail_url($post, 'full')?>); background-size: cover; overflow: auto; background-position: center center; position: relative;">
            <?=SiteHeader()?>
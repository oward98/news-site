<?php

function Head() {
    ?>
    <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157499426-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-157499426-2');
    </script>
    <!-- End Google Analytics -->
    <title><?php wp_title('|', true, 'right'); bloginfo("name") ?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="<?=wp_strip_all_tags(get_the_excerpt(), true)?>">
    <meta name="google-site-verification" content="oscSpVEWpqENTs-4tB3pG6NgMHGqP_YklT6Lj2xVnLU" />
    <?php wp_head(); ?>
    </head>
    <?php
}
<?php
require get_template_directory() . '/Components/HeaderNav/HeaderNav.php';
require get_template_directory() . '/Components/SubscribeWidget/SubscribeWidget.php';
require get_template_directory() . '/Components/Icons/Icons.php';

function SiteHeader() {
    $url = has_post_thumbnail();

    ?>
    <header id='siteHeader' class=<?= $url ? '' : 'noBackgroundHeader' ?>>
        <div id ='headerContainer' class='outer verticalOuter flex'>
            <div id='topBar'>
                <h1>
                    <?= get_custom_logo(); ?>
                </h1>
                <div id='headerButtons'>
                    <?php SubscribeWidget() ?>
                </div>
            </div>
            <?=HeaderNav()?>
        </div>
    </header>
    <?php
}


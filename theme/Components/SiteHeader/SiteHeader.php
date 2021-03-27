<?php

require getComponentPath('HeaderNav');
require getComponentPath('SubscribeWidget');
require getComponentPath('Icons');
require getComponentPath('HeaderNavMobile');

function SiteHeader() {
    $url = has_post_thumbnail();

    ?>
    <header id='siteHeader' class=<?= $url ? '' : 'noBackgroundHeader' ?>>
        <div id='mainHeaderContainer'>
            <div id='topBar' class='outer verticalInner inner'>
                <h1>
                    <?= get_custom_logo(); ?>
                </h1>
                <div id='rightButtons'>
                    <button id='subscribeButton' class='fullHeightButton'>Subscribe</button>
                    <button id ='contactButton' class='fullHeightButton'>Contact</button>
                </div>
                <?= HeaderNavMobile() ?>
            </div>
        </div>
        <?= HeaderNav() ?>
    </header>
    <?php
}


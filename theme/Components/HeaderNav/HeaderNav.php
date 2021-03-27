<?php

function HeaderNav() {
    ?>
        <nav id='headerNav' class='horizontalMenu'>
            <div class='outer'>
                <?= wp_nav_menu(array('menu' => 'main', )) ?>
            </div>
        </nav>
    <?php
}
<?php

function HeaderNav() {
    ?>
        <nav id='headerNav' class='horizontalMenu'>
            <?= wp_nav_menu(array('menu' => 'main', )) ?>
        </nav>
    <?php
}
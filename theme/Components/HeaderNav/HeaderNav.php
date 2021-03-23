<?php

function HeaderNav() {
    ?>
        <nav id='headerNav' class='horizontalMenu'>
            <?= wp_nav_menu(array('menu' => 'main', )) ?>
        </nav>
        <nav id='extraNav' class='horizontalMenu'>
            <ul>
                <li><a href="https://planningsearch.bloomsburyconservation.org.uk">Planning Search</a></li>
                <li><a href="https://map.bloomsburyconservation.org.uk">Map</a></li>
            </ul>
        </nav>
    <?php
}
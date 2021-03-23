<?php

function HeaderNavMobile() {
    ?>
    <div id='mobileMenu'>
        <button id='mobileMenuButton' class='headerButton'>&#9776;</button>
        <div id='mobileMenuContent'>
            <?= wp_nav_menu(array('menu' => 'main', )) ?>
        </div>
    </div>
    <?php
    function setUpMobileJS() {
        wp_enqueue_script('menu', get_template_directory_uri() . '/Components/HeaderNavMobile/HeaderNavMobile.js');
    }
    setUpMobileJS();
}
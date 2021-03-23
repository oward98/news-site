<?php

function set_menus() {
    register_nav_menu('main', 'Main');
    register_nav_menu('footer', 'Footer');
};

add_action('after_setup_theme', 'set_menus');
<?php

function deregister_jQuery() {
    if (!is_user_logged_in()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}

add_action('init', 'deregister_jQuery');
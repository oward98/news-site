<?php

function configureLogo() {
    $defaults = array(
        'height' => 400,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    );
    add_theme_support('custom-logo', $defaults);
}

function declareSupport() {
    /*logo set up*/
    configureLogo();
    /*excerpts for top of page summary and SEO*/
    add_post_type_support('page', 'excerpt');
    /*'featured images' for pages and posts*/
    add_theme_support('post-thumbnails');
    /*wide aligned images for gutenberg*/
    add_theme_support('align-wide');
};

function allowSvgUploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_action('after_setup_theme', 'declareSupport');
add_filter('upload_mimes', 'allowSvgUploads');
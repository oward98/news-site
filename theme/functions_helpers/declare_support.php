<?php

function configure_logo() {
    $defaults = array(
        'height' => 400,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    );
    add_theme_support('custom-logo', $defaults);
}

function declare_support() {
    /*logo set up*/
    configure_logo();
    /*excerpts for top of page summary and SEO*/
    add_post_type_support('page', 'excerpt');
    /*'featured images' for pages and posts*/
    add_theme_support('post-thumbnails');
    /*wide aligned images for gutenberg*/
    add_theme_support('align-wide');
};

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_action('after_setup_theme', 'declare_support');
add_filter('upload_mimes', 'allow_svg_uploads');
<?php

function get_slideshow_elements() {
    $slideshow_array = array();
    //get posts
    $post_args = array('meta_key' => 'is_in_slideshow', 'meta_value' => 'true');
    $slideshow_posts = get_posts($post_args);
    foreach($slideshow_posts as $slideshow_post) {
        $slideshow_array[] = $slideshow_post;
    };
    //get pages
    $page_args = array('number' => 5, 'hierarchical' => false, 'meta_key' => 'is_in_slideshow', 'meta_value' => 'true');
    $slideshow_pages = get_pages($page_args);
    foreach($slideshow_pages as $slideshow_page) {
        $slideshow_array[] = $slideshow_page;
    };

    return $slideshow_array;
};

function insert_slideshow_images() {
    $slideshow_array = get_slideshow_elements();

    foreach($slideshow_array as $slideshow_element) {
        $ID = $slideshow_element->ID;
        ?>
            <div class='slide'>
                
                    <div class='imageContainer'>
                        <?=get_the_post_thumbnail($ID, 'full')?>
                    </div>
                
            </div>
        <?php
    };
}

function insert_slideshow_caption() {
    $slideshow_array = get_slideshow_elements();

    foreach($slideshow_array as $slideshow_element) {
        $ID = $slideshow_element->ID;
        ?>
        <a href=<?=get_permalink($ID)?> style="display: block;">
            <div class='slide'>
                <a href=<?=get_permalink($ID)?>>
                    <div class='slideshowCaption'>
                        <?=get_post_meta($ID, 'slideshow_text', true)?>
                    </div>
                </a>
            </div>
        </a>
        <?php
    };
}

function insert_slideshow_html() {
    $slideshow_array = get_slideshow_elements();

    foreach($slideshow_array as $slideshow_element) {
        $ID = $slideshow_element->ID;
        ?>
            <div class='slide'>
            <a href=<?=get_permalink($ID)?>>
                <div class='imageContainer'>
                    <?=get_the_post_thumbnail($ID, 'full')?>
                </div>
            </a>
            <div class='slideshowCaption'>
                <?=get_post_meta($ID, 'slideshow_text', true)?>
            </div>
        </div>
        <?php
    };
};

function setup_slideshow() {
    ?>
    <div id='mainSlideshow'>
        <?php insert_slideshow_caption(); ?>
        <!--
        <div id='slideshowButtons'>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        -->
    </div>
    <div id='backgroundSlideshow'>
        <?php insert_slideshow_images(); ?>
    </div>
    <?php
};

function add_slideshow_javascript() {
    wp_enqueue_script('slideshow', get_template_directory_uri() . '/Components/Slideshow/Slideshow.js');
}

function SlideShow() {
    setup_slideshow();
    add_slideshow_javascript(); 
}
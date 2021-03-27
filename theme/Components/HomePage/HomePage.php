<?php

require getComponentPath('LatestPosts');
require 'BigNews/BigNews.php';

function get_news($type) {
    $posts_array = array();
    //get posts
    $post_args = array('meta_key' => 'importance_key', 'meta_value' => 'big');
    $news_posts = get_posts($post_args);
    foreach($news_posts as $news_post) {
        $posts_array[] = $news_post;
    };
    return $posts_array;
};

function HomePage() {
    ?>
    <main id='homepageMain'>
        <div id='mainArea'>
            <div id ='homepageContent' class='outer'>
                <section id='latestPosts'>
                    <?php BigNews() ?>
                </section>
                <div class='lineDiv'></div>
                <div class='lineDiv'></div>
                <section>
                    <?php MediumNews() ?>
                </section>
            </div>
        </div>
    </main>
    <?php
}


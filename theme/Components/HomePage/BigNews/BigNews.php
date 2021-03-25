<?php

require get_template_directory() . '/utils/makeThumbnail.php';

function BigNews() {
    $post_args = array('meta_key' => 'importance_key', 'meta_value' => 'big');
    $big_news_posts = get_posts($post_args);
    $first_post = array_shift($big_news_posts);
    ?>
    <div id='topPostsBar'>
        <div id='bigPosts'>
            <div id='firstBigPost'>
                <?php
                makeThumbnail($first_post, 'medium');
                ?>
            </div>
            <div id='asidePosts'>
                <div id='mediumPosts'>
                    <?php
                    $post_args = array('meta_key' => 'importance_key', 'meta_value' => 'medium');
                    $medium_news_posts = get_posts($post_args);
                    makeThumbnail(array_shift($medium_news_posts), 'medium');
                    makeThumbnail(array_shift($medium_news_posts), 'medium');
                    ?>
                </div>
                <div id='littlePosts'>
                </div>
            </div>
        </div>
        <div id='importantPosts'>
                <?php
                makeThumbnail(array_shift($big_news_posts), 'medium');
                makeThumbnail(array_shift($big_news_posts), 'medium');
                makeThumbnail(array_shift($big_news_posts), 'medium');
                makeThumbnail(array_shift($big_news_posts), 'medium');
                ?>
            </div>
    </div>
    <?php
}

function MediumNews() {
    ?>
    <div id='secondNewsSection'>
        <div id='moreMediumNews'>
            <?php
            $post_args = array('meta_key' => 'importance_key', 'meta_value' => 'small');
            $small_news_posts = get_posts($post_args);
            makeThumbnail(array_shift($small_news_posts), 'medium');
            makeThumbnail(array_shift($small_news_posts), 'medium');
            makeThumbnail(array_shift($small_news_posts), 'medium');
            makeThumbnail(array_shift($small_news_posts), 'medium');
            ?>
        </div>
        <div class='lineDiv'></div>
        <div class='lineDiv'></div>
        <div id='moreSmallNews'>
            <?php
            $post_args = array('meta_key' => 'importance_key', 'meta_value' => 'tiny', 'numberposts' => -1);
            $tiny_news_posts = get_posts($post_args);
            makeThumbnail(array_shift($tiny_news_posts), 'tiny');
            makeThumbnail(array_shift($tiny_news_posts), 'tiny');
            makeThumbnail(array_shift($tiny_news_posts), 'tiny');
            makeThumbnail(array_shift($tiny_news_posts), 'tiny');
            makeThumbnail(array_shift($tiny_news_posts), 'tiny');
            makeThumbnail(array_shift($tiny_news_posts), 'tiny');
            ?>
        </div>
    </div>
    <?php
}
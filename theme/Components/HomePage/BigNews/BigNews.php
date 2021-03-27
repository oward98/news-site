<?php

require get_template_directory() . '/utils/makeThumbnail.php';

function BigNews() {
    $big_news_args = array('meta_key' => 'importance_key', 'meta_value' => 'big');
    $big_news_posts = get_posts($big_news_args);

    $medium_news_args = array('meta_key' => 'importance_key', 'meta_value' => 'medium');
    $medium_news_posts = get_posts($medium_news_args);

    ?>
    <div id='topPostsBar'>
        <div id='firstRow' class='flex row'>
            <div id='firstBigPost' class='flex'>
                <?php
                makeThumbnail(array_shift($big_news_posts), 'big');
                ?>
            </div>
            <div id='asidePosts'>
                <div id='mediumPosts'>
                    <?php
                    makeThumbnail(array_shift($medium_news_posts), 'medium');
                    ?>
                    <div id ='firstRowTextPosts' class='flex column'>
                        <?php
                        makeThumbnail(array_shift($medium_news_posts), 'small');
                        makeThumbnail(array_shift($medium_news_posts), 'small');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id='secondRow' class='flex'>
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
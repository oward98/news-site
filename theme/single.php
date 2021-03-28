<?php

require getComponentPath('PostsSidebar');
require getComponentPath('InfoSidebar');
require getComponentPath('BodyHeader');

require get_template_directory() . '/utils/makeThumbnail.php';

get_header() 

?>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <div id='mainArea'>
                <div class='outer'>
                <div id='postMain'>
                    <aside id='infoSidebar'>
                        <?= InfoSidebar() ?>
                    </aside>
                    <main id='postContent'>
                        <article>
                            <?=the_content()?>
                        </article>
                        <div class='comments'>
                            <?php
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                            ?>
                        </div>
                    </main>
                    <?= PostsSidebar(4) ?>
                </div>
                <div id='afterArticle'>
                <div class='lineDiv'>
                </div>
                <div class='lineDiv'>
                </div>
                <div class='lineDiv'>
                </div>
                    <div id='latestSnippets'>
                        <h2>Latest Snippets</h2>
                        <div id='latestSnippetsContainer'>
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
                </div>
                <div id='relatedPosts'>
                <?php
                    //for use in the loop, list 5 post titles related to first tag on current post
                    $tags = wp_get_post_tags($post->ID);
                    if ($tags) {
                    echo '<h2>Related</h2>';
                    $first_tag = $tags[0]->term_id;
                    $tag_ids = array_map(function($tag) {
                        return $tag->term_id;
                    }, $tags);
                    $args=array (
                        'category__in' => wp_get_post_categories($post->ID),
                        'category__not_in' => array(get_cat_ID('Snippets')),
                        'post__not_in' => array($post->ID),
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'numberposts' => 10
                    );
                    $my_query = new WP_Query($args);
        
                    if( $my_query->have_posts() ) {
                    echo "<div id='relatedPostsContainer'>";
                    while ($my_query->have_posts()) : $my_query->the_post();
                    makeThumbnail($post, 'medium');
                    

                    endwhile;
                    }
                    echo "</div>";
                    wp_reset_query();
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</main>

<?php get_footer() ?>
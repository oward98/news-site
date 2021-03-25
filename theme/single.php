<?php 

require get_template_directory() . '/Components/PostsSidebar/PostsSidebar.php';
require get_template_directory() . '/Components/InfoSidebar/InfoSidebar.php';
require get_template_directory() . '/Components/BodyHeader/BodyHeader.php';
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
                <div id='postMain' class='outer'>
                    <aside id='infoSidebar'>
                        <?= InfoSidebar() ?>
                    </aside>
                    <main id='postContent'>
                        <article>
                            <?=the_content()?>
                        </article>
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
            </div>
            <?php
        }
    }
    ?>
</main>

<?php get_footer() ?>
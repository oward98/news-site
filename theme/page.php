<?php 

require getComponentPath('NavSidebar');
require getComponentPath('BodyHeader');

get_header() 

?>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $pageID = get_the_id();
            ?>
            <div id='mainArea' class='outer'>
                <section id='pageMain'>
                        <aside id='navSidebar'>
                                <?= NavSidebar() ?>
                            </aside>
                        <main id='pageContent'>
                            <article>
                                <?=get_post_field('post_content', $pageID); ?>
                            </article>
                        </main>
                </section>
            </div>
        <?php
        }
    }
    ?>


<?php get_footer() ?>
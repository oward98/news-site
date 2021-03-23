<?php 

require get_template_directory() . '/Components/Breadcrumbs/Breadcrumbs.php';
require get_template_directory() . '/Components/NavSidebar/NavSidebar.php';
require get_template_directory() . '/Components/BodyHeader/BodyHeader.php';

get_header() 

?>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $pageID = get_the_id();
            ?>
            <?= BodyHeader() ?>
            <?= Breadcrumbs() ?>
            </div>
            <div id='mainArea'>
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
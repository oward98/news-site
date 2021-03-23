<?php 

require get_template_directory() . '/Components/PostsSidebar/PostsSidebar.php';
require get_template_directory() . '/Components/InfoSidebar/InfoSidebar.php';
require get_template_directory() . '/Components/BodyHeader/BodyHeader.php';

get_header() 

?>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <?= BodyHeader() ?>
            </div>
            <div id='mainArea'>
                <div id='postMain'>
                    <aside id='infoSidebar'>
                        <?= InfoSidebar() ?>
                    </aside>
                    <main id='postContent'>
                        <article>
                            <?=the_content()?>
                        </article>
                    </main>
                    <?= PostsSidebar(6) ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</main>

<?php get_footer() ?>
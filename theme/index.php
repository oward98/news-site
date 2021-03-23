<?php get_header() ?>

    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <header class='pageHeader'>
                <h2 class='pageTitle'><?=the_title()?></h2>
                <?=the_excerpt()?>
            </header>
            </div>
            <div id='mainArea'>
                <article id='pageContent'>
                    <?=the_content()?>
                </article>
            </div>
            <?php
        }
    }
    ?>


<?php get_footer() ?>
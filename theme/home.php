<?php get_header() ?>

    <header class='bodyHeader'>
        <h2 class='bodyTitle'>News</h2>
    </header>
    </div>
    <div id='mainArea' class='newsPage'>
    <section id='newsPosts' class='pageBanner'>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <a href=<?=the_permalink()?> class='pagePreview'>
                <div class='pageThumbnailContainer'>
                    <?=the_post_thumbnail('medium')?>
                </div>
                <summary class='newsInfo'>
                    <h3><?=the_title()?></h2>
                    <span><?=the_date()?></span>
                    <?=the_excerpt()?>
                </summary>
            </a>
            <?php
        }
    }
    ?>
    </section>
</div>

<?php get_footer() ?>

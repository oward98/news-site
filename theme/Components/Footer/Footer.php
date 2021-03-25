<?php


function Footer() {

    ?>
    <footer style="background-image: url(<?=$postThumbnailUrl?>); background-size: cover">
        <section id='about'>
            <?= get_custom_logo(); ?>
        </section>
        <div id='bottomInfo'>
            <p id='leftBottomInfo'>&copy; Holborn Times 2021</p>
            <p id='rightBottomInfo'><a href=<?=get_permalink(376)?>>Contact</a></p>
        </div>
    </footer>
    <?php
}
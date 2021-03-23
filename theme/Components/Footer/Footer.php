<?php

function Footer() {
    $postThumbnailUrl = get_the_post_thumbnail_url($post, 'full');
    ?>
    <footer style="background-image: url(<?=$postThumbnailUrl?>); background-size: cover">
        <section id='about'>
            <h2>The Advisory Committee</h2>
            <p>The advisory committee was founded in 1968 by Camden to help safeguard the Bloomsbury Conservation Area.</p>
            <p>Formed of architects, planners, and prominent community members living and working in the area, its members have a close understanding of the area's special character, and extensive experience with the planning and developmental process.</p>
            <p>Since 1968 the committee has grown to cover a total of seven conservation areas in Central London, which are referred to as the Bloomsbury Conservation Areas. It is consulted with on all development in the area and streetscape works, and objections it makes are automatically escalated through Camden's constitution.</p>
            <ul id='footerCommitteeLinks'>
                <li><a href=<?=get_permalink(1052)?>>Our work</a></li>
                <li><a href=<?=get_permalink(296)?>>Our successes</a></li>
                <li><a href=<?=get_permalink(574)?>>Members</a></li>
            </ul>
        </section>
        <section id=footerNav>
            <nav>
                <?= wp_nav_menu(array('menu' => 'footer',)) ?>
            </nav>
        </section>
        <div id='bottomInfo'>
            <p id='leftBottomInfo'>&copy; BCAAC 2020</p>
            <p id='rightBottomInfo'><a href=<?=get_permalink(376)?>>Contact</a></p>
        </div>
    </footer>
    <?php
}
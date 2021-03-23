<?php

require get_template_directory() . '/Components/Slideshow/Slideshow.php';
require get_template_directory() . '/Components/LatestPosts/LatestPosts.php';

function HomePage() {
    ?>
    <main id='homepageMain'>
        <section id='featured'>
            <?php SlideShow() ?>
        </section>
        <div id='mainArea'>
            <div id ='homepageContent' class='maxWidth'>
                <section id='latestPosts'>
                    <h2>Latest</h2>
                    <div class='pageBanner'>
                        <?=LatestPosts(4)?>
                    </div>
                </section>
                <section id='resources'>
                    <h2>Resources</h2>
                    <div class='pageBanner'>
                        <a href='https://map.bloomsburyconservation.org.uk' target='_blank' class='pagePreview'>
                            <div class='pageThumbnailContainer'>
                                <img src=<?= get_template_directory_uri() . '/images/doorway.jpg'?>></img>
                            </div>
                            <summary>
                                <h3>Map (Beta)</h3>
                                <span>Interactive map visualising our conservation areas and planning applications within them</span>
                            </summary>
                        </a>
                        <a href='https://planningsearch.bloomsburyconservation.org.uk' target='_blank' class='pagePreview'>
                            <div class='pageThumbnailContainer'>
                                <img src=<?= get_template_directory_uri() . '/images/qamLow.jpg'?>></img>
                            </div>
                            <summary>
                                <h3>Planning Search</h3>
                                <span>Fast search for planning applications throughout Camden</span>
                            </summary>
                        </a>
                    </div>
                </section>
                <section id='conservationAreaSection'>
                    <h2>Our Conservation Areas</h2>
                    <p>We cover seven conservation areas in the heart of historic London as an advisory committee, comprising all of Camden's Central London area, with the exception of Hatton Garden. Many of our conservation areas are children of the Bloomsbury Conservation Area or are in some way related to it.</p> 
                    <p>We are consulted with on all changes to our conservation areas, and report on planning breaches in the area, while also supporting residents in heritage-based objections to applications in their neighbourhood.</p>
                    <div id='conservationAreasBanner' class='pageBanner'>
                        <?php
                            require(get_template_directory() . '/conservationAreas/conservationAreas.php');
                            foreach($conservationAreas as $conservationArea) {
                                $conservationArea->returnCard();
                            }
                        ?>
                    </div>
                </section>
                <section id='clientSection' class='pageBanner'>
                    <a class='pagePreview' href=<?=get_permalink(955)?>>
                        <h2>Residents -</h2>
                        <span>Contact us if you think we should be making an objection to an application in your neighbourhood. You can also learn about our conservation areas, and how you can help us in safeguarding their heritage.</span>
                    </a>
                    <a class='pagePreview' href=<?=get_permalink(994)?>>
                        <h2>Businesses -</h2>
                        <span>Putting in an application for a change of use or a new shopfront? Use our resources to learn about what is and is not acceptable, and how you can enhance our conservation areas.</span>
                    </a>
                    <a class='pagePreview' href=<?=get_permalink(194)?>>
                        <h2>Developers -</h2>
                        <span>Get in touch at an early stage of proposals to receive feedback from the advisory committee. We can also attend meetings and conduct site visits. You can use our resources to learn about our conservation areas, and how to enhance them.</span>
                    </a>
                </section>
            </div>
        </div>
    </main>
    <?php
}


<?php

function ShareButton($iconURL, $text, $attributes) {

}

function TwitterButton() {
    $iconURL = get_template_directory_uri() . "/Components/ShareButton/icons/twitter.svg";
    $text = "Tweet";
    ?>
    <a 
        class='shareButton'
        href="https://twitter.com/intent/tweet?url=<?=the_permalink()?>&text=<?=the_title()?>&via=HolbornTimes"
        target="_blank"
        rel="nofollow"
    >
        <img class="svg" src="<?=$iconURL?>"></img>
        <span><?=$text?></span>
    </a>
    <?php
}

function FacebookButton() {
    $iconURL = get_template_directory_uri() . "/Components/ShareButton/icons/facebook.svg";
    $text = "Share";
    ?>
    <a 
        class='shareButton'
        href="https://www.facebook.com/sharer/sharer.php?u=<?=the_permalink()?>"
        target="_blank"
        rel="nofollow"
    >
        <img class="svg" src="<?=$iconURL?>"></img>
        <span><?=$text?></span>
    </a>
    <?php
}

function EmailButton() {
    $iconURL = get_template_directory_uri() . "/Components/ShareButton/icons/email.svg";
    $text = "Email";
    ?>
    <a 
        class='shareButton'
        href="mailto:?to=&subject=<?=the_title()?>&body=<?=the_permalink?>"
        target="_blank"
        rel="nofollow"
    >
        <img class="svg" src="<?=$iconURL?>"></img>
        <span><?=$text?></span>
    </a>
    <?php
}
<?php

require getComponentPath('ShareButton');

function InfoSidebar() {
    $neighbourhoods = array (
        'bloomsbury',
        'fitzrovia',
        'kingsCross',
        'coventGarden',
        'holborn',
        'denmarkStreet',
        'hattonGarden'
    );

    $neighbourhoodsPrettified = array (
        'bloomsbury' => 'Bloomsbury',
        'fitzrovia' => 'Fitzrovia',
        'kingsCross' => "King's Cross",
        'coventGarden' => 'Covent Garden',
        'holborn' => 'Holborn',
        'denmarkStreet' => 'Denmark Street',
        'hattonGarden' => 'Hatton Garden'
    );

    $neighbourhoodsAffected = array();

    $post_id = get_the_id();

    foreach($neighbourhoods as $neighbourhood) {
        if (get_post_meta( $post_id, $neighbourhood, true ) === 'true') {
            array_push($neighbourhoodsAffected, $neighbourhoodsPrettified[$neighbourhood]);
        }
    };

    $author = get_post_meta( $post_id, 'author', true );

    ?>
    <ul>
        <?php if ($author) {echo "<li id='author'><h1>$author</li>"; } ?>
        <li><?=get_the_date()?></li>
        <li>
            <h1>Neighbourhoods</h1>
            <ul>
                <?php foreach($neighbourhoodsAffected as $neighbourhood) echo "<li>$neighbourhood</li>" ?>
            </ul>
        </li>
        <li id='shareButtons'><?=TwitterButton()?> <?=FacebookButton()?> <?=EmailButton()?></li>
    </ul>
    <?php
}
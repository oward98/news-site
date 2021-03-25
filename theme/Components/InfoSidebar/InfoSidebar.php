<?php

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

    ?>
    <ul>
        <li><?=get_the_date()?>
        <li>
            <h1>Neighbourhoods</h1>
            <ul>
                <?php foreach($neighbourhoodsAffected as $neighbourhood) echo "<li>$neighbourhood</li>" ?>
            </ul>
        </li>
    </ul>
    <?php
}
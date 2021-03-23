<?php

function InfoSidebar() {
    $conservationAreas = array (
        'bloomsbury',
        'charlotteStreet',
        'denmarkStreet',
        'fitzroySquare',
        'hanwayStreet',
        'kingsway',
        'sevenDials'
    );

    $conservationAreasPrettified = array (
        'bloomsbury' => 'Bloomsbury',
        'charlotteStreet' => 'Charlotte Street',
        'denmarkStreet' => 'Denmark Street',
        'fitzroySquare' => 'Fitzroy Square',
        'hanwayStreet' => 'Hanway Street',
        'kingsway' => 'Kingsway',
        'sevenDials' => 'Seven Dials'
    );

    $conservationAreasAffected = array();

    $post_id = get_the_id();

    foreach($conservationAreas as $conservationArea) {
        if (get_post_meta( $post_id, $conservationArea, true ) === 'true') {
            array_push($conservationAreasAffected, $conservationAreasPrettified[$conservationArea]);
        }
    };

    ?>
    <ul>
        <li><?=get_the_date()?>
        <li>
            <h1>Conservation Areas</h1>
            <ul>
                <?php foreach($conservationAreasAffected as $conservationArea) echo "<li>$conservationArea</li>" ?>
            </ul>
        </li>
    </ul>
    <?php
}
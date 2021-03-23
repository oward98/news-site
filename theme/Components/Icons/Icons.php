<?php

function Icons() {
    ?>
        <nav id='sideIcons'>
            <button id='planningSearchButton'>
                <span>Planning Search</span>
                <img src=<?=get_template_directory_uri() . '/Components/Icons/camdenSearch.svg'?>></img>
            </button>
            <button id='mapButton'>
                <span>Map</span>
                <img src=<?=get_template_directory_uri() . '/Components/Icons/map.svg'?>></img>
            </button>
            <script>
                var planningSearchButton = document.getElementById('planningSearchButton');
                planningSearchButton.onclick = function () {
                    window.open('https://planningsearch.bloomsburyconservation.org.uk');
                }
                var mapButton = document.getElementById('mapButton');
                mapButton.onclick = function() {
                    window.open('https://map.bloomsburyconservation.org.uk');
                }
            </script>
        </nav>
    <?php
}
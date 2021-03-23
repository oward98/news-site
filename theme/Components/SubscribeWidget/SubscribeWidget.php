<?php

function SubscribeWidget() {
    if ( is_active_sidebar( 'header-widget' ) ) {
        dynamic_sidebar( 'header-widget' );
    }
}
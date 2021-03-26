<?php

function widget_init() {
 
 register_sidebar( array(
     'name'          => 'Header Widget',
     'id'            => 'header-widget',
     'before_widget' => '<div id="header-widget-container">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 id="header-widget-title">',
     'after_title'   => '</h2>',
 ) );

}

add_action( 'widgets_init', 'widget_init' );
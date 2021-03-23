<?php

add_action( 'load-post.php', 'slideshow_meta_setup' );
add_action( 'load-post-new.php', 'slideshow_meta_setup' );

function slideshow_meta_setup() {
    add_action( 'add_meta_boxes', 'add_slideshow_meta_box' );
    add_action( 'save_post', 'save_slideshow_meta', 10, 2 );
};

function add_slideshow_meta_box() {
    add_meta_box (
        'slideshow_meta',
        'Homepage Slideshow',
        'slideshow_meta_box',
        'post',
        'side',
        'default'
    );
    add_meta_box (
        'slideshow_meta',
        'Homepage Slideshow',
        'slideshow_meta_box',
        'page',
        'side',
        'default'
    );
};

function slideshow_meta_box() {
    $post_ID = get_the_ID();
    wp_nonce_field( basename( __FILE__ ), 'slideshow_meta_nonce' );
    ?>
    <div>
      <input type="checkbox" name="is_in_slideshow" id="is_in_slideshow" <?php if (get_post_meta($post_ID, 'is_in_slideshow', true) == "true" ) echo 'checked'?> size="30" />
      <label for="is_in_slideshow">Include in slideshow</label>
      <br />
      <br />
      <label for="slideshow_text">Text to appear on the homepage slideshow</label>
      <br />
      <textarea name="slideshow_text" id="slideshow_text" class="components-textarea-control__input"><?= get_post_meta( $post_ID, 'slideshow_text', true ); ?></textarea>
    </div>
    <?php
};

function save_slideshow_meta( $post_id, $post ) {
    /*Verification of permissions*/
    if ( !isset( $_POST['slideshow_meta_nonce'] ) || !wp_verify_nonce( $_POST['slideshow_meta_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    $post_type = get_post_type_object( $post->post_type );
  
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    /*Verification of existence of meta*/

    if (!metadata_exists('post', $post_id, 'slideshow_text')) {
        add_post_meta( $post_id, 'slideshow_text', '', true );
    }
    if (!metadata_exists('post', $post_id, 'is_in_slideshow')) {
        add_post_meta( $post_id, 'is_in_slideshow', 'false', true );
    }

    /*Do stuff*/

    $new_slideshow_text = ( isset( $_POST['slideshow_text'] ) ? $_POST['slideshow_text'] : ’ );
    $new_is_in_slideshow = ( isset( $_POST['is_in_slideshow'] ) ? "true" : "false" );

    $old_slideshow_text = get_post_meta( $post_id, 'slideshow_text', true );
    $old_is_in_slideshow = get_post_meta( $post_id, 'is_in_slideshow', true );

    if ($new_slideshow_text != $old_slideshow_text) {
        update_post_meta( $post_id, 'slideshow_text', $new_slideshow_text );
    };

    if ($new_is_in_slideshow != $old_is_in_slideshow) {
        update_post_meta( $post_id, 'is_in_slideshow', $new_is_in_slideshow );
    };
};
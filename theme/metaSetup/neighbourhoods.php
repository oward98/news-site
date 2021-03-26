<?php

add_action( 'load-post.php', 'neighbourhoods_meta_setup' );
add_action( 'load-post-new.php', 'neighbourhoods_meta_setup' );

function neighbourhoods_meta_setup() {
    add_action( 'add_meta_boxes', 'add_neighbourhoods_meta_box' );
    add_action( 'save_post', 'save_neighbourhoods_meta', 10, 2 );
};

function add_neighbourhoods_meta_box() {
    add_meta_box (
        'neighbourhoods_meta',
        'Neighbourhoods',
        'neighbourhoods_meta_box',
        'post',
        'side',
        'default'
    );
};

function neighbourhoods_meta_box() {
    $post_ID = get_the_ID();
    wp_nonce_field( basename( __FILE__ ), 'neighbourhoods_meta_nonce' );
    ?>
    <div>
      <label for="bloomsbury">Bloomsbury</label>
      <input type="checkbox" name="bloomsbury" id="bloomsbury" <?php if (get_post_meta($post_ID, 'bloomsbury', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="fitzrovia">Fitzrovia</label>
      <input type="checkbox" name="fitzrovia" id="fitzrovia" <?php if (get_post_meta($post_ID, 'fitzrovia', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="kingsCross">King's Cross</label>
      <input type="checkbox" name="kingsCross" id="kingsCross" <?php if (get_post_meta($post_ID, 'kingsCross', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="coventGarden">Covent Garden</label>
      <input type="checkbox" name="coventGarden" id="coventGarden" <?php if (get_post_meta($post_ID, 'coventGarden', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="holborn">Holborn</label>
      <input type="checkbox" name="holborn" id="holborn" <?php if (get_post_meta($post_ID, 'holborn', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="denmarkStreet">Denmark Street</label>
      <input type="checkbox" name="denmarkStreet" id="denmarkStreet" <?php if (get_post_meta($post_ID, 'denmarkStreet', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="hattonGarden">Hatton Garden</label>
      <input type="checkbox" name="hattonGarden" id="hattonGarden" <?php if (get_post_meta($post_ID, 'hattonGarden', true) == "true" ) echo 'checked'?> size="30" />
    </div>
    <?php
};

function save_neighbourhoods_meta( $post_id, $post ) {
    /*Verification of permissions*/
    if ( !isset( $_POST['neighbourhoods_meta_nonce'] ) || !wp_verify_nonce( $_POST['neighbourhoods_meta_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    $post_type = get_post_type_object( $post->post_type );
  
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    $neighbourhoods = array (
        'bloomsbury',
        'fitzrovia',
        'kingsCross',
        'coventGarden',
        'holborn',
        'denmarkStreet',
        'hattonGarden'
    );

    /*Verification of existence of meta for each CA*/
    foreach($neighbourhoods as $neighbourhood) {
        if (!metadata_exists('post', $post_id, $neighbourhood)) {
            add_post_meta( $post_id, $neighbourhood, '', true );
        }
    }

    /*Do stuff*/
    foreach($neighbourhoods as $neighbourhood) {
        $newValue = ( isset( $_POST[$neighbourhood] ) ? 'true' : 'false' );
        $oldValue = get_post_meta( $post_id, $neighbourhood, true );
        if ($newValue != $oldValue) {
            update_post_meta( $post_id, $neighbourhood, $newValue );
        };
    }
};
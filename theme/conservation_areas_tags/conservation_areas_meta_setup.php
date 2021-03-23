<?php

add_action( 'load-post.php', 'conservation_areas_meta_setup' );
add_action( 'load-post-new.php', 'conservation_areas_meta_setup' );

function conservation_areas_meta_setup() {
    add_action( 'add_meta_boxes', 'add_conservation_areas_meta_box' );
    add_action( 'save_post', 'save_conservation_areas_meta', 10, 2 );
};

function add_conservation_areas_meta_box() {
    add_meta_box (
        'conservation_areas_meta',
        'Conservation Areas Affected',
        'conservation_areas_meta_box',
        'post',
        'side',
        'default'
    );
};

function conservation_areas_meta_box() {
    $post_ID = get_the_ID();
    wp_nonce_field( basename( __FILE__ ), 'conservation_areas_meta_nonce' );
    ?>
    <div>
      <label for="bloomsbury">Bloomsbury</label>
      <input type="checkbox" name="bloomsbury" id="bloomsbury" <?php if (get_post_meta($post_ID, 'bloomsbury', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="charlotteStreet">Charlotte Street</label>
      <input type="checkbox" name="charlotteStreet" id="charlotteStreet" <?php if (get_post_meta($post_ID, 'charlotteStreet', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="denmarkStreet">Denmark Street</label>
      <input type="checkbox" name="denmarkStreet" id="denmarkStreet" <?php if (get_post_meta($post_ID, 'denmarkStreet', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="fitzroySquare">Fitzroy Square</label>
      <input type="checkbox" name="fitzroySquare" id="fitzroySquare" <?php if (get_post_meta($post_ID, 'fitzroySquare', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="hanwayStreet">Hanway Street</label>
      <input type="checkbox" name="hanwayStreet" id="hanwayStreet" <?php if (get_post_meta($post_ID, 'hanwayStreet', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="kingsway">Kingsway</label>
      <input type="checkbox" name="kingsway" id="kingsway" <?php if (get_post_meta($post_ID, 'kingsway', true) == "true" ) echo 'checked'?> size="30" />
      <br />
      <label for="sevenDials">Seven Dials</label>
      <input type="checkbox" name="sevenDials" id="sevenDials" <?php if (get_post_meta($post_ID, 'sevenDials', true) == "true" ) echo 'checked'?> size="30" />
    </div>
    <?php
};

function save_conservation_areas_meta( $post_id, $post ) {
    /*Verification of permissions*/
    if ( !isset( $_POST['conservation_areas_meta_nonce'] ) || !wp_verify_nonce( $_POST['conservation_areas_meta_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    $post_type = get_post_type_object( $post->post_type );
  
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    $conservationAreas = array (
        'bloomsbury',
        'charlotteStreet',
        'denmarkStreet',
        'fitzroySquare',
        'hanwayStreet',
        'kingsway',
        'sevenDials'
    );

    /*Verification of existence of meta for each CA*/
    foreach($conservationAreas as $conservationArea) {
        if (!metadata_exists('post', $post_id, $conservationArea)) {
            add_post_meta( $post_id, $conservationArea, '', true );
        }
    }

    /*Do stuff*/
    foreach($conservationAreas as $conservationArea) {
        $newValue = ( isset( $_POST[$conservationArea] ) ? 'true' : 'false' );
        $oldValue = get_post_meta( $post_id, $conservationArea, true );
        if ($newValue != $oldValue) {
            update_post_meta( $post_id, $conservationArea, $newValue );
        };
    }
};
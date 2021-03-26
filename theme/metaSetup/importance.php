<?php

add_action( 'load-post.php', 'importance_meta_setup' );
add_action( 'load-post-new.php', 'importance_meta_setup' );

function importance_meta_setup() {
    add_action( 'add_meta_boxes', 'add_importance_meta_box' );
    add_action( 'save_post', 'save_importance_meta', 10, 2 );
};

function add_importance_meta_box() {
    add_meta_box (
        'importance_meta',
        'Importance',
        'importance_meta_box',
        'post',
        'side',
        'default'
    );
};

function importance_meta_box() {
    $post_ID = get_the_ID();
    wp_nonce_field( basename( __FILE__ ), 'importance_meta_nonce' );

    $value = get_post_meta( $post_ID, 'importance_key', true );

    ?>
    <form>
      <label for="big">Big</label>
      <input type="radio" name="importance_radios" id="big" value="big" <?php checked( $value, 'big' ); ?> size="30" />
      <br />
      <label for="medium">Medium</label>
      <input type="radio" name="importance_radios" id="medium" value="medium" <?php checked( $value, 'medium' ); ?> size="30" />
      <br />
      <label for="small">Small</label>
      <input type="radio" name="importance_radios" id="small" value="small" <?php checked( $value, 'small' ); ?> size="30" />
      <br />
      <label for="tiny">Tiny (Snippet)</label>
      <input type="radio" name="importance_radios" id="tiny" value="tiny" <?php checked( $value, 'tiny' ); ?> size="30" />
    </form>
    <?php
};

function save_importance_meta( $post_id, $post ) {
    /*Verification of permissions*/
    if ( !isset( $_POST['importance_meta_nonce'] ) || !wp_verify_nonce( $_POST['importance_meta_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    $post_type = get_post_type_object( $post->post_type );
  
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    $new_meta_value = ( isset( $_POST['importance_radios'] ) ? sanitize_html_class( $_POST['importance_radios'] ) : '' );
        // Update the meta field in the database.
        update_post_meta( $post_id, 'importance_key', $new_meta_value );
};
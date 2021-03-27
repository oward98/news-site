<?php

add_action( 'load-post.php', 'author_meta_setup' );
add_action( 'load-post-new.php', 'author_meta_setup' );

function author_meta_setup() {
    add_action( 'add_meta_boxes', 'add_author_meta_box' );
    add_action( 'save_post', 'save_author_meta', 10, 2 );
};

function add_author_meta_box() {
    add_meta_box (
        'author_meta',
        'Author',
        'author_meta_box',
        'post',
        'side',
        'default'
    );
};

function author_meta_box() {
    $post_ID = get_the_ID();
    wp_nonce_field( basename( __FILE__ ), 'author_meta_nonce' );
    ?>
    <div>
      <label for="author">Author</label>
      <br />
      <textarea name="author" id="author" class="components-textarea-control__input"><?= get_post_meta( $post_ID, 'author', true ); ?></textarea>
    </div>
    <?php
};

function save_author_meta( $post_id, $post ) {
    /*Verification of permissions*/
    if ( !isset( $_POST['author_meta_nonce'] ) || !wp_verify_nonce( $_POST['author_meta_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    $post_type = get_post_type_object( $post->post_type );
  
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    /*Verification of existence of meta*/

    if (!metadata_exists('post', $post_id, 'author')) {
        add_post_meta( $post_id, 'author', '', true );
    }

    /*Do stuff*/

    $new_author = ( isset( $_POST['author'] ) ? $_POST['author'] : ’ );

    $old_author = get_post_meta( $post_id, 'author', true );

    if ($new_author != $old_author) {
        update_post_meta( $post_id, 'author', $new_author );
    };
};
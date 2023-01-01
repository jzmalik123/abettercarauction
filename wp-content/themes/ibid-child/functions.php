<?php
function ibid_child_scripts() {
    wp_enqueue_style( 'ibid-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'ibid_child_scripts' );
 
// Your php code goes here
?>
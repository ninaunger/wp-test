<?php
/*
Plugin Name: pubPlus
Description: Nina Unger - Test
Version: 1.0
Author: Nina Unger
*/
function get_query_param() {
   
      echo '<script type="text/javascript" src="' . get_theme_file_uri() . '/assets/js/getQueryStringParameter.js"></script>';
}

// Add hook in wp_head <head></head>
add_action( 'wp_head', 'get_query_param' );
add_action( 'wp_enqueue_script', 'get_query_param' );


?>
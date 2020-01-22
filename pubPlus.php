<?php
/*
Plugin Name: pubPlus
Description: Nina Unger - Test
Version: 1.0
Author: Nina Unger
*/


function insert_footer()
{
    echo '<div id ="additional-footer" >Additional Footer</div>';

}

add_action( 'wp_footer', 'insert_footer' );



?>
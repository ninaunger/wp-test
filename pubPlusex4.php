<?php
/*
Plugin Name: pubPlus
Description: Nina Unger - Test
Version: 1.0
Author: Nina Unger
*/


//bonus question
function read_webservice_bonus() {
try {
    
    $response = wp_remote_get( 'http://www.tomorrowoman.com/ads.txt' );
    
         if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            
            $body=  $response['body'] ;
                        
            $body = preg_replace("/.net|.tv/", ".com", $body);
            echo($body);
            //$body_arr = explode(',', $body);
            //$everyWord = preg_grep("/.com/", $body_arr);            
            //print_r($everyWord);
        
        }
 
  
    } 
catch ( Exception $ex ) {
        echo $ex->getMessage();
        
    } // end try/catch
finally{
    
    $body="";
    $response="";
}
}

add_action('the_content', 'read_webservice_bonus');

?>
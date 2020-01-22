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

function insert_footer()
{
    echo '<div id ="additional-footer" >Additional Footer</div>';

}

add_action( 'wp_footer', 'insert_footer' );


 //Exercise c and d 
 function read_webservice() {
    try {
        
    $response = wp_remote_get( 'http://www.tomorrowoman.com/ads.txt' );
         if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            
            $body64= base64_encode( $response['body'] );
            
            $descending_order = array();
            echo "<h5><strong>Exercise c - </strong>Count the number of occurrences of each character that appears in the encoded text </h5>";           
            echo '<table id="table-ex-3"> <tr> <th>Character</th><th>Occurrences </th></tr>';

            foreach (count_chars($body64, 1) as $i => $val) {                                

               echo '<tr><td>'.chr($i).'</td><td>'.$val.'</td></tr>';
               //Save values in array for descending 
               $descending_order[chr($i)] =  $val;
               
             }
             echo '</table>';    
             //Exercise d
             echo "<h5>Exercise d - Sort the characters by the number of their occurrences, descending </h5>";
             
             arsort($descending_order);
             echo '<table id="table-ex-3"> <tr> <th>Character</th><th>Occurrences </th></tr>';
             foreach ($descending_order as $i => $val) {                                

                echo '<tr><td>'.$i.'</td><td>'.$val.'</td></tr>';

              }  
              echo '</table>';     
              
    }
 
  
    } catch ( Exception $ex ) {
        echo $ex->getMessage();
    } // end try/catch
    finally{
    
        $body64="";
        $response="";
        $descending_order="";
    }
}

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
add_action('the_content', 'read_webservice');
add_action('the_content', 'read_webservice_bonus');

?>
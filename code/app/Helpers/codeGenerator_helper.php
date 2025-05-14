<?php 

/**
 * Generates a secure code
 * 
 * @return string Generated code
 * 
 */

function generateRandomCode() {
    $code = '';

    for ($i = 0; $i < 4; $i++) {
        $code .= mt_rand(0, 9);
    }
    
    return $code;
}

?>
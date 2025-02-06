<?php

    function generateKeyword($input) {
        // Replace accented characters with unaccented counterparts
        $input = iconv('UTF-8', 'ASCII//TRANSLIT', $input);
        
        // Replace non-alphanumeric characters, underscores, and spaces with underscores, and convert to lowercase
        $cleaned_input = strtolower(preg_replace(['/[^a-zA-Z0-9\s]/', '/[\s_]+/'], ['_', '_'], $input));
        
        // Remove underscores from the beginning and end of the string
        $cleaned_input = trim($cleaned_input, "_");
        
        return $cleaned_input;
    }

?>
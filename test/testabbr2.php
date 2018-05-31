<?php
function abbreviate($string) {
    $string = ucwords($string);
    $abbreviation = "";
    if(str_word_count($string) = 1) { 
        $abbreviation = "$string[0]$string[1]";  
    } else {
        $words = explode(" ", "$string");
        foreach($words as $word){
            $abbreviation = $word[0];
        }
    }
    return $abbreviation; 
}


$string = "albert heijn";
$string = preg_replace("/[^A-Za-z0-9]/", $string);
echo abbreviate(($string));

if () {
    
} else 
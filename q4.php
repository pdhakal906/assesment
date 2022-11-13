<?php 
function splitText(){
    $pattern = "/@/";
    $text = 'abc@grepsr.com';
    $matches = preg_split($pattern, $text);
    return $matches;
}
print_r(splitText());
?>
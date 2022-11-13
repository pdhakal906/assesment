<?php

function checkConditions($num){
    if(is_int($num)){
        echo "$num is an integer\n";
    }
    if(is_numeric($num)){
        echo "$num is numeric\n";    
    }
    if(is_integer($num)){
        echo "$num is integer\n";
    }
}

checkConditions(2);

?>
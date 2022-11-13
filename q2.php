<?php
function roundNumber($num, $p){
    $num = round($num, $p);
    echo $num."\n";
}

roundNumber(2.99999,2);
roundNumber(199.99999,4);
roundNumber(2.1234,2);



?>
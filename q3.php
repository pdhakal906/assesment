<?php
function convertDate($date){
    $orgDate = $date;
    $newDate = date('Y-m-d', strtotime($orgDate));
    return $newDate;
}

$date = convertDate('Sep 20 2021');
echo $date . "\n";

function convertDate2($date){
    $orgDate = $date;
    $formattedDate = "$date[0]$date[1]-$date[2]$date[3]-$date[4]$date[5]$date[6]$date[7]";
    $newDate = date('M-d-Y', strtotime($formattedDate));
    return $newDate;
}

$date = convertDate2('09092021');
echo $date . "\n";




?>
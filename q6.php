<?php 
function getData(){
    $ch = curl_init();
    $url = 'https://dummyjson.com/products/search?q=Laptop';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    $r = json_decode($resp, true);
    writeData($r);
}

function writeData($r){
    $file = fopen('output.csv', 'w');
    fputcsv($file, array("Title", "Price", "Brand"));

    foreach($r['products'] as $product){
        fputcsv($file, array($product['title'], $product['price'], $product['brand']));
    }
    fclose($file);
}

getData();





?>
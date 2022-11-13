<?php 
include('phpQuery-onefile.php');
function curlRequest(){
    $ch = curl_init();
    $url = "https://books.toscrape.com/catalogue/category/books/science_22/index.html";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    getData($resp);   
}
function getData($resp){
    $document = phpQuery::newDocument($resp);
    $books = [];
    foreach($document->find('ol.row li') as $item){
        $title = trim($document->find('h3 a',$item)->attr('title'));
        $price = trim($document->find('.price_color', $item)->text());
        $stock = trim($document->find('.instock',$item)->text());
        $category = 'Science';
        $category_url = 'https://books.toscrape.com/catalogue/category/books/science_22/index.html';
        $url = str_replace("../../..","https://books.toscrape.com/catalogue",$document->find('h3 a',$item)->attr('href'));
        $ratings = ["One"=>"1","Two"=>"2","Three"=>"3","Four"=>"4","Five"=>"5"];
        $star_rating = $document->find('p.star-rating', $item)->attr('class');
        $star_rating = trim(str_replace("star-rating", "", $star_rating));
        $rating_number = trim($ratings[$star_rating]);
        $id = generateId();
        array_push($books, array($id,$category,$category_url,$title,$price,$stock,$rating_number,$url));
    }
    writeData($books);
}
function writeData($books){
    $file_name = 'science_listing.csv';
    $file = fopen($file_name, 'w');
    fputcsv($file, array("id","category","category_url","title", "price","stock","rating","url"));
    foreach($books as $book){
        fputcsv($file, $book);
    }
}
function generateId(){
    $characters = "0123456789";
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $id = substr(str_shuffle($characters), 0, 8);
    return $id;
}
curlRequest();
?>
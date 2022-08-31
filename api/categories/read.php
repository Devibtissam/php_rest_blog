<?php

// Headers 
// enable an unthorized access 
//  set a mime type
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '../../config/Database.php';
include_once '../../models/categories.php';

// instantiate DB & connect

$db = new Database();
$db = $db->connect();

$post = new Category($db);
$data = $post->read();

$num = $data->rowCount();
if($num > 0){
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
$categories_arr = array();
foreach($data as $d ) {
    // extract($d);
    // echo $name;
    array_push($categories_arr, $d);
}

// echo '<pre>';
// print_r($categories_arr);
      echo json_encode($categories_arr);
       
 }else{
     // No categories
     echo json_encode(array('Message' => 'No Category Found'));

}

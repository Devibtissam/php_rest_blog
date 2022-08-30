<?php

// Headers 
// enable an unthorized access 'without access token'
//  set a mime type
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '../../config/Database.php';
include_once '../../models/post.php';

// instantiate DB & connect

$db = new Database();
$db = $db->connect();

$post = new Post($db);
$data = $post->read();

$num = $data->rowCount();
if($num > 0){
    // posts array 
  
    $posts_arr = array();
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $d){
        array_push($posts_arr, $d);
        
    }
        // turn to JSON & output

        echo json_encode($posts_arr);
      
    }
else{
    // No posts
    echo json_encode(array('Message' => 'No Posts Found'));

}



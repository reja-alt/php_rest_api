<?php

//Header
header('Allow-Access-Control-Origin: *');
header('Content-Type: application/json');

include '../../Database.php';
include '../../Post.php';

//Instantiate DB && Connect
$database = new Database();
$db = $database->connect();

//Instantiate post
$post = new Post($db);

//Blog post query
$result = $post->read(); 

//Get the row count
$num = $result->rowCount();

//Check if any posts exists
if($num > 0) {
    //Posts Array
    
}
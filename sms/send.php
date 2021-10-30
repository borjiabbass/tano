<?php
header("Access-Control-Allow-Origin: http://localhost/api");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require 'autoload.php';
$data = json_decode(file_get_contents("php://input"));

// you api key that generated from panel
$apiKey = "3EcoWZDkLnT_d01id3fkkaRz0ZOLDD46giug2AcYlXE=";

$client = new \IPPanel\Client($apiKey);


$bulkID = $client->send(
    "+983000505",          // originator
    ["989351894375"],    // recipients
    "ffff" // message
);
?>
<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/api");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

require 'vendor/autoload.php';
require 'models/Sms.php';

$data = json_decode(file_get_contents("php://input"));
$apiKey = "3EcoWZDkLnT_d01id3fkkaRz0ZOLDD46giug2AcYlXE=";
$client = new \IPPanel\Client($apiKey);
$sms= new Sms($data->phone);
$sms->generateCode();

$pattern = $client->sendPattern("mveg7tva5j", "983000505", $sms->phone, ['name' => "",'verification-code'=>$sms->verifidCode]);



<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/api");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

require 'autoload.php';
require 'src/IPPanel/Database.php';
$data = json_decode(file_get_contents("php://input"));
$Database = new Database();
$db = $Database->getConnection();
$sms = new \IPPanel\Sms($data->phone);
$User = new \IPPanel\User($db,$data->phone);

if($sms->confirm($data->code)){
    if($User->isAlreadyRegister()){

    }else{
        $User->Register();
        
    } 
}

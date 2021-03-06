<?php
session_start();

require 'vendor/autoload.php';
require 'models/Sms.php';
require 'models/database.php';
require 'models/User.php';
require 'models/token.php';
require 'models/res.php';
$data = json_decode(file_get_contents("php://input"));
$token =new Token();
$res= new Res();

if($token->TokenVal()){
    $Database = new Database();
    $db = $Database->getConnection();
    $tokenData=$token->TokenVal();
    $User = new User($db,$tokenData->phone);
    $User->id=$tokenData->id;
    $User->complate_profile($data);
    $resData= array(
        "message"=>"ok"
    );
    $res->responseCode(200);
    $res->response($resData);
}else{
    $resData= array(
        "message"=>"Invalid Token"
    );
    $res->responseCode(401);
    $res->response($resData);
}

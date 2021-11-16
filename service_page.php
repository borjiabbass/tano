<?php
require 'vendor/autoload.php';
require 'models/database.php';
require 'models/User.php';
require 'models/token.php';
require 'models/res.php';
require 'models/service.php';
$data = json_decode(file_get_contents("php://input"));
$token =new Token();
$res= new Res();

if($token->TokenVal()){
    $Database = new Database();
    $db = $Database->getConnection();
    $tokenData=$token->TokenVal();
    $service = new Service($tokenData->id,$db);
    $service->insertService($data);
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

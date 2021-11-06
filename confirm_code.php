<?php
session_start();

require 'vendor/autoload.php';
require 'models/Sms.php';
require 'models/database.php';
require 'models/User.php';
require 'models/token.php';
require 'models/res.php';
$data = json_decode(file_get_contents("php://input"));

$Database = new Database();
$db = $Database->getConnection();
$sms = new Sms($data->phone);
$User = new User($db,$data->phone);
$res= new Res();

if($sms->confirm($data->code)){
    
    if(!$User->isAlreadyRegister()){
        $User->Register();
        
    }
        $User->GetUserId();
        $data=array(
            "id" => $User->id,
            "phone" => $User->phone,
        );
        $token =new Token();
        $token->generateCode($data);
        $resData= array(
            "token"=>$token->tokenCode,
            "isARLogin"=>$User->isAlreadyLogin()
        );
        $res->responseCode(200);
        $res->response($resData);

}else{
    $resData= array(
        "message"=>"Invalid Code"
    );
    $res->responseCode(400);
    $res->response($resData);
}

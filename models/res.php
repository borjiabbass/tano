<?php

class Res{
 
   
    
    // constructor
    public function __construct(){
        header("Access-Control-Allow-Origin: http://localhost/api");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    }
    public function responseCode($code){
        http_response_code($code);
    }
    public function response($data){
        echo json_encode($data);
    }
   

}
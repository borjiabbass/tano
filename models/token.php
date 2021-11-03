<?php
use Firebase\JWT\JWT;

class Token{
 
    private $key="4D17E68FA26C214ADCF9B20AB482EA31371C9268E2ED366D341BDCF59A51D441";
    public $iss='http://localhost/tanoo';
    public $aud='http://localhost/';
    public $iat;
    public $data;
    public $tokenCode;

    // object properties
    
    // constructor
    public function __construct($data){
        $this->data=$data;
    }
    public function generateCode(){
        $data=array(
            "iat" => time(),
            "exp" => time() + (60 * 60)*24,
            "iss" => $this->iss,
            "data" => array(
                "id" => $this->data['id'],
                "phone" => $this->data['phone']
            ));
        $this->tokenCode = JWT::encode($data, $this->key,"HS256");
    }
   

}
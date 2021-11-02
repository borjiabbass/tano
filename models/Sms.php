<?php
class Sms{
 
    
 
    // object properties
    public $phone;
    public $verifidCode;
    
 
    // constructor
    public function __construct($phone){
        $this->phone =$this->getPhone($phone);
    }
    public function getPhone($phone){
        return "98".substr($phone, 1);
    }
    public function generateCode(){
        $this->verifidCode= mt_rand(100000,999999);
       $_SESSION['verfyCode']= $this->verifidCode;
    }
    public function confirm($code){
            if($code ==$_SESSION['verfyCode'])
                return true;
            else 
                return false;
    }
    
}
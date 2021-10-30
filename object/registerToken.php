<?php
class RegisterToken{
  
    // database connection and table name
    private $conn;
    private $table_name = "registertoken";
  
    // object properties
    public $id;
    public $isAlreadyRegister;
    public $verifyCode;
    public $TokenId;
    public $tokenStatus;
    public $category_name;
    public $created;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
?>
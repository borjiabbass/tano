<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "registertoken";
 
    // object properties
    public $phone;
    public $id;
 
    // constructor
    public function __construct($db,$phone){
        $this->phone=$phone;
        $this->conn = $db;
    }
    function Register(){
    
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    phone_number = :phone_number";
    
        $stmt = $this->conn->prepare($query);
    
    
        // bind the values
        $stmt->bindParam(':phone_number', $this->phone);
        print_r($this->phone);
       
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    function GetUserId(){
    
        // insert query
        $query = "SECECT ID FROM  " . $this->table_name . "
                WHERE 
                    phone_number = :phone_number";
    
        $stmt = $this->conn->prepare($query);
    
    
        // bind the values
        $stmt->bindParam(':phone_number', $this->phone);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    function isAlreadylogin(){
        $query = "SELECT is_already_register
            FROM " . $this->table_name . "
            WHERE is_already_register=1 And  phone_number = ?
            LIMIT 0,1";
 
    
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->phone=htmlspecialchars(strip_tags($this->phone));
    
        $stmt->bindParam(1, $this->phone);
    
        // execute the query
        $stmt->execute();
    
        // get number of rows
        $num = $stmt->rowCount();
    
        if($num>0){
            return true;
        }
        return false;
    }
    function isAlreadyRegister(){
        $query = "SELECT phone_number
            FROM " . $this->table_name . "
            WHERE phone_number = ?
            LIMIT 0,1";
 
    
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->phone=htmlspecialchars(strip_tags($this->phone));
    
        $stmt->bindParam(1, $this->phone);
    
        // execute the query
        $stmt->execute();
    
        // get number of rows
        $num = $stmt->rowCount();
    
        if($num>0){
            return true;
        }
        return false;
    }
    
    
 

}
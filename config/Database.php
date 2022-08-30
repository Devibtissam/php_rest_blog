<?php

// DB Params 
class Database {
    private $host = 'localhost';
    private $db_name = 'myblog';
    private $username = "root";
    private $password = "";
    private $conn;


    // DB Connection 
    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            // set error mode
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e){
            echo 'Connection error' . $e->getMessage();

        }

        return $this->conn;
    }
}

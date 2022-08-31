<?php

class Category{
      // DB stuff
    private $conn; 
    private $table = "categories";


    // category properties
    public $id;
    public $name;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

      // get Category name
    public function read(){
        // create our query 
        $query = 'SELECT * FROM '. $this->table .' as c ';
        
        //    prepare statement
        $stmt = $this->conn->prepare($query);
        // execute our query 
        $stmt->execute();

        return $stmt;
    }

}
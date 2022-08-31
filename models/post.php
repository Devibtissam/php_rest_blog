<?php 

class Post{
    // DB stuff
    private $conn; 
    private $table = "posts";

    // posts properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // constructor with DB 
    public function __construct($db){
        $this->conn = $db;
    }

    // get Posts
    public function read(){
        // create our query 
        $query = 'SELECT c.name as category_name,
        p.id,
        p.category_id,
        p.title,
        p.body,
        p.author,
        p.created_at
        FROM ' . $this->table . ' p
        LEFT JOIN
        categories c ON p.category_id = c.id
        ORDER BY
        p.created_at DESC';
        
        //    prepare statement
        $stmt = $this->conn->prepare($query);
        // execute our query 
        $stmt->execute();

        return $stmt;
    }

    // get single post
    public function read_single(){
        $query =  'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
        FROM ' . $this->table . ' p
        LEFT JOIN
        categories c ON p.category_id = c.id
        WHERE
        p.id = ?
        LIMIT 0,1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->title = $data['title'];
        $this->body = $data['body'];
        $this->author = $data['author'];
        $this->category_id = $data['category_id'];
        $this->category_name = $data['category_name'];

        
    }

      // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }


    public function delete(){
      // create query 
      $query = "DELETE FROM ". $this->table . " WHERE id = :id";

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;


    }
}
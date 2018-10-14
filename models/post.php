<?php
class Post{
    //DB
    private $conn;
    private $table='posts';

    //properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    //Get Posts
    public function read(){
        //query
        $query='SELECT c.name as category_name,p.id,p.category_id,p.category_name,p.title,p.body,p.author,p.created_at FROM ' .$this->table. ' p 
        LEFT JOIN
        categories c ON p.category_id = p.id
        ORDER BY
        p.created_at DESC';
    //prepared statement
    $stmt=$this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
    
    }
}
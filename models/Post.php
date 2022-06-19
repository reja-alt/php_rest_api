<?php

class Post {

    //DB stuff
    private $conn;
    private $table = 'posts';

    //Post properties
    private $id;
    private $title;
    private $category_name;
    private $body;
    private $category_id;
    private $author;
    private $created_at;

    //BD Connect
    public function __construct($db) {
        $this->conn = $db;
    }

    //Get Posts
    public function read() {
        //create query
        $query = 'SELECT
                c.name as category_name,
                p.id ,
                p.title,
                p.category_id,
                p.body,
                p.author,
                p.created_at
                FROM 
                '. $this->conn .' p
                LEFT JOIN 
                categories c ON p.category_id = c.id
                ORDERBY  p.created_at DESC';
     
        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Execution
        $stmt->execute();

        return $stmt;
    }


}
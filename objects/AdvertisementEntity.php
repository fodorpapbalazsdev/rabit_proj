<?php
class AdvertisementEntity{

    // database connection and table name
    private $conn;
    private $table_name = "advertisements";

    // object properties
    public $id;
    public $userId;
    public $title;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read()
    {
        // select all query
        $query = "SELECT a.id, a.user_id, a.title 
                  FROM " . $this->table_name . " a";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
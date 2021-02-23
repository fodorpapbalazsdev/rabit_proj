<?php

class UserEntity
{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $name;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        // select all query
        $query = "SELECT u.id, u.name 
                  FROM " . $this->table_name . " u";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
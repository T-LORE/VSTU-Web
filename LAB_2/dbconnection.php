<?php
class Database {
    private static $instance = null;
    private $connection;

    public function __construct($ip, $username, $password, $dbname) {       
        if (self::$instance === null) {
            $this->connection = new mysqli($ip, $username, $password, $dbname);

            if ($this->connection->connect_error != null) {
                die("Connection failed: " . $this->connection->connect_error);
            } else {
                self::$instance = $this;
            }  
        }     
    }
    
    public function getInstance() {
        
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
<?php
class Database {
    private static $instance = null;
    private $connection;

    public function __construct($ip, $username, $password, $dbname) {       
        if (self::$instance === null) {    
            try{
                $this->connection = new PDO("mysql:host=$ip;dbname=$dbname", $username, $password);
                self::$instance = $this;
            } catch (PDOException $e) {
                die("Connection failed");
            }
        }     
    }
    
    public static function getInstance() {
        
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
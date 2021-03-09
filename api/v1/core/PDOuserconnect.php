<?php

class Database{
    private $hostname = 'localhost';
    private $database = 'ctrlaltd_coneybeare';
    private $username = 'ctrlaltd_coneybeareuser';
    private $password = '^-MQ4iiADjRb';
    public $connection;

//Connect to database
    public function connect() {

        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
        }
        return $this->connection;
    }
}
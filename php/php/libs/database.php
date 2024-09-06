<?php
class Database {
    private $connection;

    public function __construct() {
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->connection = new PDO("mysql:host=127.0.0.1;dbname=practicas", "root", "", $option);
        $this->connection->exec("SEt CHARACTER SET utf8 ");
    }
    public function getConnection() {
        return $this->connection;
    }
    public function closeConnection() {
        $this->connection = null;
    }
}


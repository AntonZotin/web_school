<?php

namespace classes;

use PDO;
use PDOException;

class Database
{
    private string $host = 'localhost';
    private string $db_name = 'school_db';
    private string $username = 'user';
    private string $password = 'user_password';
    public ?PDO $conn;

    public function __construct()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}
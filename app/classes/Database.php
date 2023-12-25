<?php
// require_once './database_config.php';

class Database {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("set names UTF8");
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->db;
    }
}


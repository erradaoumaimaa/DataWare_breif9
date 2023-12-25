<?php
//recuperer le fichier dyal constans 7it ma3arfouch 
// require_once './constants.php';

class Database{

    private $db;

    public function __construct(){
        $this->db = new PDO(DSN,DB_USER,DB_PASS);
        $this->db->exec("set names UTF8");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
   
}
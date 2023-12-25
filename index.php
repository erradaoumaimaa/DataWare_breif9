<?php
require_once './app/autoload.php';

$database = new Database();
// Obtenez la connexion PDO
$db = $database->getConnection();
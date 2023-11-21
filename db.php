<?php

class Database {
    public $pdo;
 
    public function __construct($db ="test", $host = "localhost:3307", $user = "root", $pass= "") {
    try {
    $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database" ;
    } catch (Exception $e) {
        echo "Connection failed" . $e->getMessage();
     }
    }
}

$connectie= new database();

?>
<?php

class Database {
    public $pdo;

    public function __construct($db = "ziggo", $host = "localhost", $user = "root", $pass = "") {
        try {
            $this->pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to database $db <br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function Datatoevoegen($naam, $email, $telefoonnummer) {
        try {
            $sql = "INSERT INTO klanten (naam, email, telefoonnummer) VALUES (:naam, :email, :telefoonnummer)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':naam', $naam);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefoonnummer', $telefoonnummer);

            $stmt->execute();
            echo "Gegevens zijn toegevoegd <br>";
        } catch (PDOException $e) {
            echo "Fout bij het toevoegen van gegevens: <br>" . $e->getMessage();
        }
    }
}

?>

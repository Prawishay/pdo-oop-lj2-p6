<?php
include "db.php";

$db = new Database();


class Database {
    private $host = 'localhost';
    private $username = 'jouw_gebruikersnaam';
    private $password = 'jouw_wachtwoord';
    private $database = 'jouw_database';

    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertStudent($voornaam, $achternaam, $email) {
        try {
            $sql = "INSERT INTO Students (voornaam, achternaam, email) VALUES (:voornaam, :achternaam, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':voornaam', $firstName);
            $stmt->bindParam(':achternaam', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            echo "Student toegevoegd aan de database!";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}



?>
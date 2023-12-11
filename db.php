<?php 

class Database {
    public $pdo;

    public function __construct($db = "test", $user="root", $pwd="<Prawishay><2.0>", $host="localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to database $db";
        }  catch(PDOException $e) {
                echo "Connected failed: " . $e->getMessage();
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

public function selectUser($id = null) {
    if ($id == null) {
        $stmt = $this->pdo->query("SELECT * FROM user");
        $result = $stmt->fetchAll();
    } else {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
    }
    return $result;
}

public function updateUser(string $email, String $password, int $id){
    $stmt = $this->pdo->prepare("UPDATE user SET email =?, password = ? WHERE id = ?");
        $stmt->execute([$email, $password, $id]);
}

public function deleteUser(int $id) {
    $stmt = $this->pdo->prepare("DELETE from user WHERE id = ?");
    $stmt->execute([$id]);
}

public function register(string $naam, string $achternaam, string $geboortedatum,
                    string $email, string $password) {
    $stmt = $this->pdo->prepare("INSERT INTO users (naam, achternaam,
    geboortedatum, email, wachtwoord) values (?,?,?,?)");
    $stmt->execute([$naam, $achternaam, $geboortedatum, $email, $password]);
}

}


?>




<?php
require_once '../model/USER.php';

class Visteur extends User {

    public function __construct($id, $name, $role, $email, $password , $created_at) {
        parent::__construct($id, $name, $role, $email, $password , $created_at);
    }
    
    
    public function register($conn) {

        $name = $this->getName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $role = $this->getRole();

        
        if (!$this->isValidEmail($email) || $this->emailExists($email)) {
            return false;
        }
        $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }

    private function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function emailExists($email) {
        return $this->getUserByEmail($email) !== false;
    }

    public function getUserByEmail($email) {
        $db = new Database();
        $conn = $db->connect();
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function viewCatalog() {
        $db = new Database();
        $conn = $db->connect();
        $courses = [];

        $query = "SELECT title , description , image FROM courses limit 3";
        $stmt = $conn->prepare($query);
        $stmt->execute();
     
        
if ($stmt && $stmt->rowCount() > 0) {

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $courses[] = $row;
    }
}
        return $courses;
    }

}

?>

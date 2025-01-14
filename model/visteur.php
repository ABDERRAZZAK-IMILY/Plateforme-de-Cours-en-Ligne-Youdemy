<?php

require_once '../model/USER.php';

class Visteur extends User {

    private $student_id;

    public function __construct($name, $email, $password , $role) {
        parent::__construct($name, $email, $password, $role);
    }

    public function register($conn) {
        $name = $this->getName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $role = $this->getRole();

        $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }
}

?>

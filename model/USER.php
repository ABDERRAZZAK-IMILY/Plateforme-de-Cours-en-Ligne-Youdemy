<?php

abstract class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $created_at;

    public function __construct($name, $email, $password, $role) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function checkPassword($password) {
        return password_verify($password, $this->password);
    }

    abstract public function register($conn);

    public static function login($email, $password, $conn) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (password_verify($password, $userData['password'])) {
                if ($userData['role'] == 'student') {
                    return 'student';
                } elseif ($userData['role'] == 'teacher') {
                    return 'teacher';
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>

<?php
abstract class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $created_at;

    public function __construct($id, $name, $role, $email, $password , $created_at) {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getRole() {return $this->role;}
    public function getDate() {return $this->created_at;}
    public function getPassword() {return $this->password;}

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


    public static function login($email, $password, $conn) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (password_verify($password, $userData['password'])) {
                $_SESSION['id'] = $userData['id'];
                $_SESSION['name'] = $userData['name'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['role'] = $userData['role'];
                $_SESSION['password'] = $userData['password'];
                $_SESSION['created_at'] = $userData['created_at'];
                $_SESSION['status'] = $userData['status'];



                if ($userData['role'] == 'student') {
                    return 'student';
                } elseif ($userData['role'] == 'teacher') {
                    return 'teacher';
                } elseif ($userData['role'] == 'admin') {
                    return 'admin';
                }else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    
  

  abstract  public function viewCatalog();

}
?>

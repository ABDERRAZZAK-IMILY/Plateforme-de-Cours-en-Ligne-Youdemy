<?php

class Database {
    private $host = "localhost";
    private $db_name = "Youdemy"; 
    private $username = "root";   
    private $password = "";          
    private $conn;                    

    public function connect() {

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                  $this->username, 
                                  $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
            echo 'database connect';
     
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }


 
}

?>

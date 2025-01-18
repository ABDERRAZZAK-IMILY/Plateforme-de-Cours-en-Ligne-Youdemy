<?php

class Category {
    private $id;
    private $name;

    public function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }


    
    public function addCategory() {
        $db = new Database();
        $conn = $db->connect();
        $query = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$this->name]);
    }

    public function editCategory() {
        $db = new Database();
        $conn = $db->connect();

        $query = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$this->name, $this->id]);
    }

    public function deleteCategory() {
        $db = new Database();
        $conn = $db->connect();

        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$this->id]);
    }

    public function getAllCategories() {
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM categories";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id) {
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM categories WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>

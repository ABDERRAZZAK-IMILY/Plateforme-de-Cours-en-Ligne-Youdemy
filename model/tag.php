<?php

class Tag {
    private $id;
    private $name;

    public function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

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

    public function addTag() {
        $db = new Database();
        $conn = $db->connect();

        $query = "INSERT INTO tags (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$this->name]);
    }

    public function editTag() {
        $db = new Database();
        $conn = $db->connect();

        $query = "UPDATE tags SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$this->name, $this->id]);
    }

    public function deleteTag() {
        $db = new Database();
        $conn = $db->connect();

        $query = "DELETE FROM tags WHERE id = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$this->id]);
    }

    public function getAllTags() {
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM tags";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTagById($id) {
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM tags WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>

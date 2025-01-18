<?php
 class Cours {
    protected $title;
    protected $description;
    protected $image;
    protected $content;
    protected $category;

    public function __construct($title, $description, $image, $content, $category) {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->content = $content;
        $this->category = $category;
    }

    public function createCourse($teacher_id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO courses (teacher_id, content_url, created_at, description, image, title, catagugry_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $date_res = date('Y-m-d H:i:s');

        if ($stmt->execute([$teacher_id, $this->content, $date_res, $this->description, $this->image, $this->title, $this->category])) {
            return "Course created successfully!";
        } else {
            return "Error: " . implode(', ', $stmt->errorInfo());
        }
    }


    public function modifyCourse($courseId, $title, $description, $image, $content, $category) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("UPDATE courses SET title = ?, description = ?, image = ?, content_url = ?, catagugry_id = ? WHERE id = ?");

        if ($stmt->execute([$title, $description, $image, $content, $category, $courseId])) {
            return "Course updated successfully!";
        } else {
            return "Error: " . implode(', ', $stmt->errorInfo());
        }
    }

    // Delete a course
    public function deleteCourse($courseId) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");

        if ($stmt->execute([$courseId])) {
            return "Course deleted successfully!";
        } else {
            return "Error: " . implode(', ', $stmt->errorInfo());
        }
    }
}


?>
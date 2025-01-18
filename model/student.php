<?php

require_once 'User.php';
require_once '../model/Database.php';



class Student extends User {

    public function __construct($id, $name, $role, $email, $password , $created_at) {
        parent::__construct($id, $name, $role, $email, $password , $created_at);
    }

 public function viewCatalog() {
        $db = new Database();
        $conn = $db->connect();
        $courses = [];

        $query = "SELECT id, title , description , image FROM courses";
        $stmt = $conn->prepare($query);
        $stmt->execute();
     
        
if ($stmt && $stmt->rowCount() > 0) {

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $courses[] = $row;
    }
}
        return $courses;
    }



    public function enrollCourse($courseId , $studentId) {
        $db = new Database();
        $conn = $db->connect();

        $encrolecourse = "INSERT INTO course_enrollments (course_id, student_id) VALUES (?, ?)";
        $stmt3 = $conn->prepare($encrolecourse);

        if ($stmt3->execute([$courseId, $studentId])) {

            echo 'course id added successfully!';
        } else {
            echo 'error: unable to add course.';
        }

    }

    public function myCourses($id) {
        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT *
                  FROM courses
                  JOIN course_enrollments ON courses.id = course_enrollments.course_id
                  WHERE course_enrollments.student_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchCourses($keyword) {
        $db = new DATABASE();
        $conn = $db->connect();

        $sql = "SELECT * FROM courses WHERE title LIKE :keyword OR description LIKE :keyword";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

<?php

require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/USER.php');
require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/DATABASE.php');


class Teacher extends User {
    public function __construct($id, $name, $role, $email, $password , $created_at) {
        parent::__construct($id, $name, $role, $email, $password , $created_at);
    }

    public function createCourse(Cours $cours) {
        $teacher_id = $_SESSION['id'];
        return $cours->createCourse($teacher_id);
    }

   public function modifyArticle($newTitle , $newCategoryId ,$newContent ,$course_id){
    $db = new Database();
    $conn = $db->connect();

    $stmt = $conn->prepare("UPDATE courses SET title = ?, catagugry_id = ?, description = ? WHERE id = ?");
    if ($stmt->execute([$newTitle, $newCategoryId, $newContent, $course_id])) {
    } else {
        $message = 'Error: ' . implode(', ', $stmt->errorInfo());
    }



   }
   public function removecourse($course_id){
    $db = new Database();
    $conn = $db->connect();

    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    if ($stmt->execute([$course_id])) {
    } else {
        $message = 'Error: ' . implode(', ', $stmt->errorInfo());
    }

   }


   
   public function viewCatalog() {
    
    $db = new Database();
    $conn = $db->connect();

    $query = "SELECT courses.id, courses.title, courses.description, courses.created_at, courses.image, courses.catagugry_id, categories.name AS category_name
              FROM courses
              JOIN categories ON courses.catagugry_id= categories.id";
    $stmt = $conn->query($query);

    if ($stmt && $stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $courses[] = $row;
        }
    } else {
        $message = "No courses found.";
    }

    return $courses;
}



   public function Tagadd($course_id , $tagid){

  $db = new Database();
 $conn = $db->connect();

 
    if (isset($course_id) && !empty($course_id) && isset($tagid) && !empty($tagid)) {
        $addtagsid = "INSERT INTO course_tags (course_id, tag_id) VALUES (?, ?)";
        $stmt3 = $conn->prepare($addtagsid);

        if ($stmt3->execute([$course_id, $tagid])) {
        } else {
            echo 'error: unable to add tag to article.';
        }
    }
    
}


public function getStatistics() {
    $db = new Database();
    $conn = $db->connect();

    $statistics = [];

    $query = "SELECT COUNT(*) as total_courses FROM courses";
    $stmt = $conn->query($query);
    $statistics['total_courses'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_courses'];

    $query = "SELECT COUNT(DISTINCT student_id) as total_students FROM course_enrollments";
    $stmt = $conn->query($query);
    $statistics['total_students'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_students'];

    $query = "SELECT courses.title, COUNT(course_enrollments.course_id) as enrollments 
              FROM course_enrollments 
              JOIN courses ON course_enrollments.course_id = courses.id 
              GROUP BY course_enrollments.course_id 
              ORDER BY enrollments DESC 
              LIMIT 1";
    $stmt = $conn->query($query);
    $mostPopularCourse = $stmt->fetch(PDO::FETCH_ASSOC);
    $statistics['most_popular_course'] = $mostPopularCourse ? $mostPopularCourse['title'] : 'No data';

    $query = "SELECT COUNT(*) as total_categories FROM categories";
    $stmt = $conn->query($query);
    $statistics['total_categories'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_categories'];

    return $statistics;
}
}


?>

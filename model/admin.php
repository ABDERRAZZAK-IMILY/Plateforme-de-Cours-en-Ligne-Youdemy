<?php

require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/DATABASE.php');
require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/catagory.php');
require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/tag.php');
require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/USER.php');
require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/cours.php');

class Admin extends User {

    public function __construct($id, $name, $role, $email, $password, $created_at) {
        parent::__construct($id, $name, $role, $email, $password, $created_at);
    }

    public function manageUsers($action, $userId) {
        $db = new Database();
        $conn = $db->connect();
        $message = "";

        if ($action == 'activate') {
            $stmt = $conn->prepare("UPDATE users SET status = 'active' WHERE id = ?");
            if ($stmt->execute([$userId])) {
                $message = "User activated successfully.";
            } else {
                $message = "Error: Unable to activate user.";
            }
        } elseif ($action == 'suspend') {
            $stmt = $conn->prepare("UPDATE users SET status = 'suspended' WHERE id = ?");
            if ($stmt->execute([$userId])) {
                $message = "User suspended successfully.";
            } else {
                $message = "Error: Unable to suspend user.";
            }
        } elseif ($action == 'delete') {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            if ($stmt->execute([$userId])) {
                $message = "User deleted successfully.";
            } else {
                $message = "Error: Unable to delete user.";
            }
        } else {
            $message = "Invalid action.";
        }

        return $message;
    }

    public function manageCategories($action, $categoryId = null, $categoryName = null) {
        $message = "";

        $category = new Category($categoryId, $categoryName);

        if ($action == 'add' && $categoryName) {
            if ($category->addCategory()) {
                $message = "Category added successfully!";
            } else {
                $message = "Error: Unable to add category.";
            }
        } elseif ($action == 'edit' && $categoryId && $categoryName) {
            if ($category->editCategory()) {
                $message = "Category updated successfully!";
            } else {
                $message = "Error: Unable to update category.";
            }
        } elseif ($action == 'delete' && $categoryId) {
            if ($category->deleteCategory()) {
                $message = "Category deleted successfully!";
            } else {
                $message = "Error: Unable to delete category.";
            }
        } elseif ($action == 'view') {
            $categorys = $category->getAllCategories();
            return $categorys;
        } else {
            $message = "Invalid action or missing parameters.";
        }

        return $message;
    }

    public function manageTags($action, $tagId = null, $tagName = null) {
        $message = "";

        $tag = new Tag($tagId, $tagName);

        if ($action == 'add' && $tagName) {
            if ($tag->addTag()) {
                $message = "Tag added successfully!";
            } else {
                $message = "Error: Unable to add tag.";
            }
        } elseif ($action == 'delete' && $tagId) {
            if ($tag->deleteTag()) {
                $message = "Tag deleted successfully!";
            } else {
                $message = "Error: Unable to delete tag.";
            }
        } elseif ($action == 'view') {
            $tags = $tag->getAllTags();
            return $tags;
        } else {
            $message = "Invalid action or missing parameters.";
        }

        return $message;
    }

    public function viewCatalog() {
        $db = new Database();
        $conn = $db->connect();
        $courses = [];

        $query = "SELECT courses.id, courses.title, courses.description, courses.created_at, 
                         courses.image, courses.catagugry_id, categories.name AS category_name
                  FROM courses
                  JOIN categories ON courses.catagugry_id = categories.id";
        
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if ($stmt && $stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $course = $row;

                $tagQuery = "SELECT tags.name FROM tags 
                             JOIN course_tags ON tags.id = course_tags.tag_id
                             WHERE course_tags.course_id = ?";
                $tagStmt = $conn->prepare($tagQuery);
                $tagStmt->execute([$row['id']]);

                $tags = [];
                while ($tagRow = $tagStmt->fetch(PDO::FETCH_ASSOC)) {
                    $tags[] = $tagRow['name'];
                }

                $course['tags'] = $tags;
                $courses[] = $course;
            }
        } else {
            $message = "No courses found.";
        }

        return $courses;
    }

    public function viewStatistics() {
        $db = new Database();
        $conn = $db->connect();
        $stats = [];
    
        $stmt = $conn->prepare("SELECT COUNT(*) AS total_courses FROM courses");
        $stmt->execute();
        $stats['total_courses'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_courses'];
    
        $stmt = $conn->prepare("SELECT COUNT(*) AS total_students FROM users WHERE role = 'student'");
        $stmt->execute();
        $stats['total_students'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_students'];
    
        $stmt = $conn->prepare("SELECT COUNT(*) AS total_teachers FROM users WHERE role = 'teacher'");
        $stmt->execute();
        $stats['total_teachers'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_teachers'];
    
        $stmt = $conn->prepare("SELECT courses.title, COUNT(course_enrollments.student_id) AS student_count
                                FROM courses
                                LEFT JOIN course_enrollments ON courses.id = course_enrollments.course_id
                                GROUP BY courses.id
                                ORDER BY student_count DESC LIMIT 1");
        $stmt->execute();
        $stats['most_popular_course'] = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $stmt = $conn->prepare("SELECT users.name, COUNT(courses.id) AS course_count
                                FROM users
                                LEFT JOIN courses ON users.id = courses.teacher_id
                                WHERE users.role = 'teacher'
                                GROUP BY users.id
                                ORDER BY course_count DESC LIMIT 3");
        $stmt->execute();
        $stats['top_teachers'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $stmt = $conn->prepare("SELECT categories.name AS category_name, COUNT(courses.id) AS course_count
                                FROM categories
                                LEFT JOIN courses ON categories.id = courses.catagugry_id
                                GROUP BY categories.id");
        $stmt->execute();
        $stats['courses_by_category'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $stats;
    }

    public function manageCourses($action, $courseId = null, $title = null, $description = null, $image = null, $content = null, $category = null, $teacher_id = null) {
        $message = "";

       if ($action === 'modify') {
            $course = new Cours($title, $description, $image, $content, $category);
            $message = $course->modifyCourse($courseId, $title, $description, $image, $content, $category);
        } elseif ($action === 'delete') {
            $course = new Cours("", "", "", "", "");
            $message = $course->deleteCourse($courseId);
        } else {
            $message = "Invalid action.";
        }

        return $message;
    }
}

?>

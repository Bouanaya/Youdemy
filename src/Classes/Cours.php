<?php
namespace Src\Classes;
require_once "../../vendor";
use Src\config\Database;
use PDO;
class Cours{

    // public function createCourse($courseName, $courseDescription, $coursePrice, $courseCategory, $courseImage, $courseSlug){
    //     $sql = "INSERT INTO courses (courseName, courseDescription, coursePrice, courseCategory, courseImage, courseSlug) VALUES (:courseName, :courseDescription, :coursePrice, :courseCategory, :courseImage, :courseSlug)";
    //     $stmt = DB::prepare($sql);
    //     $stmt->bindParam(':courseName', $courseName);
    //     $stmt->bindParam(':courseDescription', $courseDescription);
    //     $stmt->bindParam(':coursePrice', $coursePrice);
    //     $stmt->bindParam(':courseCategory', $courseCategory);
    //     $stmt->bindParam(':courseImage', $courseImage);
    //     $stmt->bindParam(':courseSlug', $courseSlug);
    //     $stmt->execute();
    // }

    // public function updateCourse($courseName, $courseDescription, $coursePrice, $courseCategory, $courseImage, $courseSlug, $courseId){
    //     $sql = "UPDATE courses SET courseName = :courseName, courseDescription = :courseDescription, coursePrice = :coursePrice, courseCategory = :courseCategory, courseImage = :courseImage, courseSlug = :courseSlug WHERE courseId = :courseId";
    //     $stmt = DB::prepare($sql);
    //     $stmt->bindParam(':courseName', $courseName);
    //     $stmt->bindParam(':courseDescription', $courseDescription);
    //     $stmt->bindParam(':coursePrice', $coursePrice);
    //     $stmt->bindParam(':courseCategory', $courseCategory);
    //     $stmt->bindParam(':courseImage', $courseImage);
    //     $stmt->bindParam(':courseSlug', $courseSlug);
    //     $stmt->bindParam(':courseId', $courseId);
    //     $stmt->execute();
    // }

    // public function deleteCourse($courseId){
    //     $sql = "DELETE FROM courses WHERE courseId = :courseId";
    //     $stmt = DB::prepare($sql);
    //     $stmt->bindParam(':courseId', $courseId);
    //     $stmt->execute();
    // }


    public static function  select() {
    //     $conn = Database::connect();
    //     $query = "SELECT 
    //     c.*,  -- Select all columns from the Courses table
    //     ct.*, -- Select all columns from the CourseTags table
    //     t.*   -- Select all columns from the Tags table
    // FROM 
    //     Courses c
    // JOIN 
    //     CourseTags ct ON c.courseId = ct.courseId
    // JOIN 
    //     Tags t ON ct.tagId = t.tagId";
     
    //     $stmt = $conn->prepare($query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "merci";
    }

    // public function getAllCourses(){
    //     $sql = "SELECT * FROM courses";
    //     $stmt = DB::prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }
    
}






?>
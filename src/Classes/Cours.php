<?php

namespace src\Classes;
require_once __DIR__ . '/../../vendor/autoload.php';
use src\Classes\Crud;
use src\config\Database;
use PDO;

class Cours{

    public function addCours($data,$tagId){
        $course = Crud::insert('courses', $data);
        $courseId = Crud::select('courses', 'courseId', 'title = :title', [':title' => $data['title']]);
        $courseId = $courseId[0]['courseId'];
        $tag = ['courseId' => $courseId, 'tagId' => $tagId];
        $courseTag = Crud::insert('course_tag', $tag);
        return $course;
    }

    public function deleteCours($courseId){
        $course = Crud::delete('courses', 'courseId = :courseId', [':courseId' => $courseId]);
        return $course;
    }

    public function updateCours($data, $courseId){
        $course = Crud::update('courses', $data, 'courseId = :courseId', [':courseId' => $courseId]);
        return $course;
    }

    public function addTag($tag){
        $tag = Crud::insert('tags', ['name' => $tag]);
        return $tag;
    }

    public function deleteTag($tagId){
        $tag = Crud::delete('tags', 'tagId = :tagId', [':tagId' => $tagId]);
        return $tag;
    }

    public function updateTag($tag, $tagId){
        $tag = Crud::update('tags', ['name' => $tag], 'tagId = :tagId', [':tagId' => $tagId]);
        return $tag;
    }

    public function addCategory($category){
        $category = Crud::insert('categories', ['name' => $category]);
        return $category;
    }

    public function deleteCategory($categoryId){
        $category = Crud::delete('categories', 'categoryId = :categoryId', [':categoryId' => $categoryId]);
        return $category;
    }

    public function updateCategory($category, $categoryId){
        $category = Crud::update('categories', ['name' => $category], 'categoryId = :categoryId', [':categoryId' => $categoryId]);
        return $category;
    }

    public function selectall($teacherId){
            $conn = Database::connect();
            $query = "SELECT 
    c.courseId,
    ca.categoryName,
    c.title,
    c.description,
    c.content,
    c.teacherId,
    c.categoryId,
    c.status,
    c.price,
    c.devise,
    GROUP_CONCAT(DISTINCT t.tagName ORDER BY t.tagName SEPARATOR ', ') AS tags
FROM 
    Courses c
LEFT JOIN 
    CourseTags ct ON c.courseId = ct.courseId
JOIN 
    category ca ON c.categoryId = ca.categoryId
LEFT JOIN 
    Tags t ON ct.tagId = t.tagId
WHERE 
    c.teacherId = $teacherId
GROUP BY 
    c.courseId
ORDER BY 
    c.created_at DESC";

         
            $stmt = $conn->prepare($query);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
}







?>
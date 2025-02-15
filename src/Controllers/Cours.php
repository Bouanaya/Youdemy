<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use src\Classes\Teacher;
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = $_POST['title'];
$description = $_POST['description'];
$content_url = $_POST['content_url'];
$content_file = $_POST['content_file'];
$categoryId = $_POST['category'];
$price = $_POST['price'];
$enseignantId = $_SESSION["userId"];
$tagId = $_POST['tags'];

$data = ['title' => $title, 'description' => $description, 'content' => $content_url, 'categoryId' => $categoryId, 'price' => $price, 'teacherId' => $enseignantId];
    if (isset($_POST['submit'])) {
        $course = new Teacher();
        $course->addCours($data,$tagId);
     
    } 
   
} 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $courseId = $_GET['id'];
        $course = new Teacher();
        $course->deleteCours($courseId) ;
        header('Location: http://localhost/Youdemy/src/views/enseignant/enseignant.php');

        
    }
 

}
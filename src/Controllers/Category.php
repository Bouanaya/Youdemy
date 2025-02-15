<?php
require '../../vendor/autoload.php';
use src\Classes\Category;


$category = new Category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
       $category->addCategory();
    } 
    else if(isset($_POST['update'])){ {
        $category->updateCategory();
    }}  
    
    }  
    else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $category-> deleteCategory();
            header('Location: http://localhost/Youdemy/src/views/enseignant/enseignant.php');
        
        }
    
       
    }
?>
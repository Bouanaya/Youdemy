<?php
namespace src\Classes;
require_once __DIR__ . '/../../vendor/autoload.php';
 use src\Classes\Crud;
 

class Category
{
       private $table = 'category';
    public function addCategory()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['category'];
            $description = $_POST['description'];
            Crud::insert($this->table, ['categoryName' => $name , 'description'=> $description]);
        
            header('Location: http://localhost/Youdemy/src/views/Admin/pages/category.php');
           
          
        }
    }
    public function getCategory()
    {
        return  Crud::select($this->table);
    }

    public function updateCategory()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $cateory = Crud::select($this->table, '*', 'categoryId=:categoryId', ['categoryId' => $id]);
            return $cateory;
        };

        if (isset($_POST['update'])) {
            $id = $_POST['categoryId'];
            $name = $_POST['category'];
            $description = $_POST['description'];
            Crud::update($this->table, ['categoryName' => $name ,'description'=>$description ], 'categoryId=:categoryId', ['categoryId' => $id]);
            header('Location: http://localhost/Youdemy/src/views/Admin/pages/category.php');
        }
      
    }

    public function deleteCategory()
    {
        echo $_SERVER['REQUEST_METHOD'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Crud::delete($this->table, 'categoryId=:categoryId', ['categoryId' => $id]);
            header('Location: http://localhost/Youdemy/src/views/Admin/pages/category.php');

        }
    }

}




?>
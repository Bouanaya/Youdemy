<?php
namespace src\Classes;
require_once __DIR__ . '/../../vendor/autoload.php';
 use src\Classes\Crud;
 

class Tag
{
    private $table = 'tags';
    public function addtags()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['tags'];
            // var_dump($name);
            foreach ($name as  $value) {
           Crud::insert($this->table, ['tagName' => $value]);
           header('Location: http://localhost/Youdemy/src/views/Admin/pages/tag.php');

            }
            
           
           
          
        }
    

    }

    public function gettags()
    {
        return  Crud::select($this->table);
    }

    public function updatetags()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tags = Crud::select($this->table, '*', 'tagId=:tagId', ['tagId' => $id]);
            return $tags;
        };

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['tags'];
            echo $name;
            echo $id;
            Crud::update($this->table, ['tagName' => $name], 'tagId=:tagId', ['tagId' => $id]);
            header('Location: http://localhost/Youdemy/src/views/Admin/pages/tag.php');
        }
      
    }

    public function deletetags()
    {
        echo $_SERVER['REQUEST_METHOD'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Crud::delete($this->table, 'tagId=:tagId', ['tagId' => $id]);
            header('Location: http://localhost/Youdemy/src/views/Admin/pages/tag.php');

        }
    }

}




?>
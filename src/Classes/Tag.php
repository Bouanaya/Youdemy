<?php
require_once("Crud.php");

class Tag
{
    private $table = 'tags';
    public function addtags()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['tags'];
        
            header('Location: ../../public/layout/tagAuthor.php');
           
          
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
            $tags = Crud::select($this->table, '*', 'id=:id', ['id' => $id]);
            return $tags;
        };

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['tags'];
            echo "update";
            echo $id;
            Crud::update($this->table, ['name' => $name], 'id=:id', ['id' => $id]);
            header('Location: ../../public/layout/tagAuthor.php');
        }
      
    }

    public function deletetags()
    {
        echo $_SERVER['REQUEST_METHOD'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Crud::delete($this->table, 'id=:id', ['id' => $id]);
            header('Location: ../../public/layout/tagAuthor.php');
        }
    }

}




?>
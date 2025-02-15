<?php

require '../../vendor/autoload.php';
use src\Classes\Tag;

// $tags = $_POST['tags'] ;
// var_dump($tags) ;
$tags = new Tag();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
       $tags->addtags();
    } 
    else if(isset($_POST['update'])){ {
       $tags->updatetags();
    echo "<script>alert('Tag updated successfully')</script>";
    
    }}  
    
    }  
    else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
           $tags->deletetags();
        
        }
    
       
    }



?>
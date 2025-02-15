<?php
require_once __DIR__ ."../../../vendor/autoload.php";
use src\Classes\Admin;
$admin = new Admin();
if ($_SERVER["REQUEST_METHOD"] = "GET"){
    if($_GET["action"]== "active"){
        $status = "active";
        $id = $_GET["id"];
        $admin->validateUser($status , $id);
        header("Location: http://localhost/Youdemy/src/views/Admin/pages/users.php");

 
         

    }
    else if($_GET["action"]== "suspended"){
        $status = "suspended";
        $id = $_GET["id"];
        $admin->validateUser($status , $id);
        header("Location: http://localhost/Youdemy/src/views/Admin/pages/users.php");

    }
    else{
        $status = "pending";
        $id = $_GET["id"];
        $admin->validateUser($status , $id);
        header("Location: http://localhost/Youdemy/src/views/Admin/pages/users.php");

    }
    
 }
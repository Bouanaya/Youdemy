<?php
namespace Src\Classes;
require_once __DIR__ ."../../../vendor/autoload.php";
use src\Classes\Crud;
class Admin{



     public function validateUser($status , $id){
Crud::update("users",['status'=>$status ,'userId'=>$id],'userId=:userId', ['userId' => $id]);

    }
    
}






?>
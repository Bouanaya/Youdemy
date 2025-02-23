<?php
require_once "../../vendor/autoload.php";
use src\Classes\User;
session_start();
function generateSlug($string) {
    // Convert to lowercase
    $slug = strtolower($string);
    
    // Remove special characters
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    
    // Replace multiple spaces or dashes with a single dash
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    
    // Trim dashes from start and end
    return trim($slug, '-');
}



if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $user->login($email,$password);
      
}
 else {
$userName = $_POST['userName'] ;
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];
$slug = generateSlug($_POST['userName']);
$user = new User();
$user->register($userName, $email,$password,$role,$slug);
header('Location: http://localhost/Youdemy/src/views/Auth/signIn.php');
exit; 
   
}






?>
<?php
require_once("../Classes/User.php");

session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $user->login($email,$password);
      
}
 else {
$userName = $_POST['userName'];
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];
$user = new User();
$user->register($userName, $email,$password,$role);
header('Location: http://localhost/Youdemy/src/views/Auth/signIn.php');
exit; 
   
}






?>
<?php
namespace Actions;

use src\Model\User;
require_once __DIR__ . '/../../vendor/autoload.php';



class SignUp{

    public function signups() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $FullName = $_POST['FullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user =new User;
            
           
            $result = $user->signup($FullName, $email, $password);
        
            if ($result === true) {
                header('location:../../public/Layout/signIn.php');
            } else {
                echo "Erreur : " . $result;
            }
        }
                
            }

    
}


$sinup = new SignUp();
$sinup->signups();



   


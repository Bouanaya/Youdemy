<?php

require "../config/Database.php";
class User {

    protected string $username;
    protected string $email;
    protected string $password;
    protected string $role;


    public function register($userName,$email,$password,$role){
   


        $pdo=Database::connect();
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt=$pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $user =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['email']==$email){
           return;

        }
        else {
        $stmt=$pdo->prepare("INSERT INTO users(username,email,password,role) VALUES (?,?,?,?)");
        $stmt->execute([$userName,$email,$hashPassword,$role]);
        }


    }

    public function login($email,$password){

        $pdo=Database::connect();
        
        // $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt=$pdo->prepare("SELECT * FROM users where email=?");
        $stmt->execute([$email]);
        $user =$stmt->fetch(PDO::FETCH_ASSOC);
  
        if ($user && password_verify($password, $user['password']) ){
         
           $_SESSION['userId']=$user['userId'];
           $_SESSION['userName']=$user['username'];
           $_SESSION['email']=$user['email'];
           $_SESSION['role']=$user['role'];
           if($_SESSION['role']=="student"){
               
            var_dump($_SESSION['role']);
               header("Location: http://localhost/Youdemy/src/views/Student/Student.php");
            }
            else if ($_SESSION['role']=="teacher"){
                header("Location: http://localhost/Youdemy/src/views/enseignant/enseignant.php");

            }
            else if ($_SESSION['role']=="admin"){
                header("Location: http://localhost/Youdemy/src/views/Admin/dashbord.php");

            }
            
        }
 

           
 
     else {
       
    header("Location: http://localhost/Youdemy/src/views/Auth/signIn.php");
    echo "<script>
    document.getElementById('form').reset()
</script>";
        }
    }
    
        }
   

?>

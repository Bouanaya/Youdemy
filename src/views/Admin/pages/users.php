<?php
require_once '../../../../vendor/autoload.php';
use src\Classes\Tag;
use src\Classes\Crud;
use src\config\Database;
$tag = new Tag();
$tags = $tag->gettags(); 
$coutTeacher = Crud::select("users" , "count(*)as count", "role = 'teacher'" );
$coutusers = Crud::select("users" , "count(*)as count", "role != 'admin'" );
$coutStudent = Crud::select("users" , "count(userId) as count", "role = 'student'");
$teacher = Crud::select("users","*", "role = 'teacher' ");
$Database = new Database;

session_start();
if ( $_SESSION['role'] != 'admin') {
    header('Location: http://localhost/Youdemy/src/views/Auth/signIn.php');
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
if ($search) {
    // Prepare SQL query to search for a character in username, email, or any column

    $result = Crud::select("users","*", " username LIKE '$search' OR email LIKE '$search'");

}

$limit = 10;
$pages = $coutusers[0]['count'] / $limit;
$total_pages = ceil($pages);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Page actuelle
$start = ($page - 1) * $limit; 
$users = Crud::select("users","*", "role = 'teacher' or role ='student' LIMIT $start, $limit ");
if(isset($_GET['page'])){
    echo "<script>
        window.onload = function() {
            window.scrollTo(0, 300);  // Défilement vertical à 300px
        };
    </script>";
    
    }



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Articles Dashboard</title>
</head>
<body class="bg-green-100">

    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar -->
       <!-- Sidebar -->
       <aside class="bg-gray-900 w-64 min-h-screen p-4 flex flex-col justify-between fixed">
       <ul class="space-y-2 mt-4">
             
             <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2 "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white ">
  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
</svg><a href="../../Admin/dashbord.php" class="text-white ">
Dashboard</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
</svg>
<a href="./tag.php" class="text-white">Tags</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
</svg>
<a href="./Category.php" class=" text-white">Category</a></li>
               <li class="px-4 py-2 bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-300">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
</svg>
<a href="" class="text-green-300">Users</a></li>

         
                    
             
                
            </ul>
             

              

         
                    
             
       
        <div class="flex bg-red-700 items-center rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.49 12 3.74 8.248m0 0 3.75-3.75m-3.75 3.75h16.5V19.5" />
</svg>



<a href="../../Auth/signOut.php" class="px-4 py-2  text-white ">Déconnexion</a>




        </div>
        </aside>
        <!-- Content -->
    <div class="block w-full pl-64">
        <section class="flex-1 p-6">
            <div class="flex justify-between items-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Users</h1>
     
            </div>
           

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
           
                <div class="bg-[#FAFFC5] p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between">
                    <h2 class="text-xl font-bold mb-2">Total Teacher</h2>
                    <img src="../../../../assets/images/icons8-teacher-64 (2).png" alt="" class="w-16">
                    </div>
                  
                  
                    <p class="text-gray-700 font-bold text-4xl">
                    <?= $coutTeacher[0]["count"] ?>
                    </p>
                </div>
                <div class="bg-[#FAFFC5] p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between">
                    <h2 class="text-xl font-bold mb-2">Total Student</h2>
                    <img src="../../../../assets/images/icons8-student-94.png" alt="" class="w-16">
                    </div>
                 
                    
             
                    <p class="text-gray-700 font-bold text-4xl">
                    <?= $coutStudent[0]["count"] ?>
                    </p>
                </div>
              
             
                </div>
            
        </section>
<section class="flex-1 p-6">
    <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Users Table</h1>

    <div class="flex items-center gap-2 ">
        <form action="" >
                <input type="text" placeholder="Search..." name="search" class="outline-none py-2 rounded-lg px-2 w-[400px]">
                <input type="submit" class="bg-blue-400 text-white px-4 py-2 rounded-md cursor-pointer" value="Search">
                </form>
            </div>
            </div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-[#FAFFC5]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">username</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">email</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-center leading-tight t">Status</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">role</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result ?? $users as $user) :?>
                
                <tr class="border-b">
                    <td class="py-2 px-4 border-b border-gray-300"> <?=$user['userId']?> </td>
                    <td class="py-2 px-4 border-b border-gray-300"><?=$user['username']?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?=$user['email']?></td>
                    <td  class="py-2 px-2  flex justify-center items-center">
                        <img src="
                         <?php
                    if ($user['status'] == "pending") {
                       echo "../../../../assets/images/pending (1).png";
                    }
                    if ($user['status'] == "suspended") {
                        echo "../../../../assets/images/suspended.png";

                     }
                     if ($user['status'] == "active") {
                        echo "../../../../assets/images/check.png";

                     }


                    
                    ?>
                        
                        " alt="" class="w-6">
               </td>
                    <td class="py-2 px-4 border-b border-gray-300"> 
                      <?php if($user['role']=="teacher"){
                            echo 'Teacher';

                        }
                        else{
                            echo 'Student';
                        } ?>
                   
                    </td>
            
      
                    <td class="py-2 px-4  border-gray-300 flex space-x-4">
                        <a href="../../../Controllers/user.php?action=active&id=<?=$user['userId'] ?> " class="bg-green-400 text-white py-1 px-2 rounded hover:bg-green-600">active</a>
                            <a href="../../../Controllers/user.php?action=suspended&id=<?=$user['userId'] ?>" class="bg-red-400 text-white py-1 px-2 rounded hover:bg-red-600">suspended</a>
                            <a href="../../../Controllers/user.php?action=pending&id=<?=$user['userId'] ?>" class="bg-orange-400 text-white py-1 px-2 rounded hover:bg-orange-600">pending</a>
                        </td>
                        
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <nav class="flex space-x-2 mt-2 justify-center items-center">
        <!-- Précédent -->
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300">
                « Prev
            </a>
        <?php endif; ?>

        <!-- Pages -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="px-4 py-2 <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600 hover:bg-gray-300'; ?> rounded-md">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <!-- Suivant -->
        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300">
                Next »
            </a>
        <?php endif; ?>
    </nav>
    </div>
</section>

</div>

</main>
</body>
</html>
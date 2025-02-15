<?php
require_once '../../../../vendor/autoload.php';
use src\Classes\Tag;
use src\Classes\Crud;
$tag = new Tag();
$tags = $tag->gettags(); 
$coutUsers = Crud::select("users" , "count(*)");
$users = Crud::select("users","*", "role = 'teacher' or role ='student' ");
$teacher = Crud::select("users","*", "role = 'teacher' ");

session_start();
if ( $_SESSION['role'] != 'admin') {
    header('Location: http://localhost/Youdemy/src/views/Auth/signIn.php');
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
             
             <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="../../Admin/dashbord.php" class="text-white">Dashboard</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./tag.php" class="text-white">Tags</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./category.php" class=" text-white ">Category</a></li>
               <li class="px-4 py-2 bg-gray-800 rounded"><a href="" class=" text-green-300">Users</a></li>

         
                    
             
                
            </ul>
        <div class="flex bg-red-500 items-center rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
</svg>


<a href="../../Auth/signOut.php" class="px-4 py-2  text-white ">Déconnexion</a>




        </div>
        </aside>
        <!-- Content -->
    <div class="block w-full pl-64">
        <section class="flex-1 p-6">
            <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Users</h1>
     
            </div>
           

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <div class="bg-[#FAFFC5] p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Total Users</h2>
                    <?php
                    foreach ($coutUsers as $user)
                    
                    ?>
                    <p class="text-gray-700">
                    <?= $user["count(*)"] ?>
                    </p>
                </div>
              
             
                </div>
            
        </section>
<section class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Users Table</h1>


    <div class="overflow-x-auto">
    <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-[#FAFFC5]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">username</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">email</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">role</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Status</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) :?>
                
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300"> <?=$user['userId']?> </td>
                    <td class="py-2 px-4 border-b border-gray-300"><?=$user['username']?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?=$user['email']?></td>
                    <td class="py-2 px-4 border-b border-gray-300"> <?=$user['role']?></td>
            
                    <td class="py-2 px-4 border-b
                            <?php
                    if ($user['status'] == "pending") {
                       echo "text-orange-400";
                    }
                    if ($user['status'] == "suspended") {
                        echo "text-red-400";
                     }
                     if ($user['status'] == "active") {
                        echo "text-green-400";
                     }


                    
                    ?>
                    
                     border-gray-300"><?=$user['status']?></td>
                    <td class="py-2 px-4 border-b border-gray-300 flex space-x-4">
                        <a href="../../../Controllers/user.php?action=active&id=<?=$user['userId'] ?> " class="bg-green-400 text-white py-1 px-2 rounded hover:bg-green-600">active</a>
                            <a href="../../../Controllers/user.php?action=suspended&id=<?=$user['userId'] ?>" class="bg-red-400 text-white py-1 px-2 rounded hover:bg-red-600">suspended</a>
                            <a href="../../../Controllers/user.php?action=pending&id=<?=$user['userId'] ?>" class="bg-orange-400 text-white py-1 px-2 rounded hover:bg-orange-600">pending</a>
                        </td>
                        
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>
<section class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">teacher Table</h1>


    <div class="overflow-x-auto">
    <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-[#FAFFC5]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">username</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">email</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">role</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Status</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teacher as $user) :?>
                
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300"> <?=$user['userId']?> </td>
                    <td class="py-2 px-4 border-b border-gray-300"><?=$user['username']?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?=$user['email']?></td>
                    <td class="py-2 px-4 border-b border-gray-300"> <?=$user['role']?></td>
            
                    <td class="py-2 px-4 border-b
                            <?php
                    if ($user['status'] == "pending") {
                       echo "text-orange-400";
                    }
                    if ($user['status'] == "suspended") {
                        echo "text-red-400";
                     }
                     if ($user['status'] == "active") {
                        echo "text-green-400";
                     }


                    
                    ?>
                    
                     border-gray-300"><?=$user['status']?></td>
                    <td class="py-2 px-4 border-b border-gray-300 flex space-x-4">
                        <a href="../../../Controllers/user.php?action=active&id=<?=$user['userId'] ?> " class="bg-green-400 text-white py-1 px-2 rounded hover:bg-green-600">active</a>
                            <a href="../../../Controllers/user.php?action=suspended&id=<?=$user['userId'] ?>" class="bg-red-400 text-white py-1 px-2 rounded hover:bg-red-600">suspended</a>
                            <a href="../../../Controllers/user.php?action=pending&id=<?=$user['userId'] ?>" class="bg-orange-400 text-white py-1 px-2 rounded hover:bg-orange-600">pending</a>
                        </td>
                        
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>
</div>

</main>
</body>
</html>
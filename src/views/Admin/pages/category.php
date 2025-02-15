<?php
require_once '../../../../vendor/autoload.php';

use src\Classes\Category;
use src\Classes\Crud;
$category = new Category();
$categorys = $category->getCategory(); 
$countCategory = Crud::select("category" , "count(*)");



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
    <title>Category Dashboard</title>
</head>
<body class="bg-green-100">
 
    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-900 w-64 min-h-screen p-4 flex flex-col justify-between fixed">
            <ul class="space-y-2 mt-4">
             
             <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="../../Admin/dashbord.php" class="text-white ">Dashboard</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./tag.php" class="text-white">Tags</a></li>
               <li class="px-4 py-2 bg-gray-800 rounded"><a href="" class=" text-green-300">Category</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./users.php" class="text-white">Users</a></li>

         
                    
             
                
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
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Category</h1>
            <a href="../forms/category.php" class="bg-[#257fc4] text-white p-2 rounded-md" >NEW CATEGORY</a>
            </div>
           

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <div class="bg-[#B1F0F7] p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Total Categorys</h2>
                    <?php
                    foreach ($countCategory as $category)
                    
                    ?>
                    <p class="text-gray-700">
                    <?= $category["count(*)"] ?>
                    </p>
                </div>
              
             
                </div>
            
        </section>
<section class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Category Table</h1>


    <div class="overflow-x-auto">
        <table class=" w-3/4 bg-white"> 
            <thead>
                <tr class=" border-b-4 bg-[#B1F0F7]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">description</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Action</th>
                 
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($categorys as $category) : ?>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $category['categoryId'] ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $category['categoryName'] ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $category['description'] ?></td>
                        <td class="py-2 px-4 border-b border-gray-300 flex space-x-4">
                            <a href="../forms/updateCategory.php?action=update&id=<?= $category['categoryId'] ?>" class="bg-blue-400 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</a>
                            <a href="../../../Controllers/category.php?action=delete&id=<?= $category['categoryId'] ?>" class="bg-red-400 text-white py-1 px-2 rounded hover:bg-red-600">Delete</a>
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
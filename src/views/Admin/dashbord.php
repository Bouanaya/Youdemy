<?php
 
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
<body class="bg-gray-100">
    <!-- Header Section -->
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <a href="#" class="text-white">Dashboard Author</a>
            </div>
            <!-- Sign Out -->
            <div class="flex space-x-4">
                <!-- <a href="../index.php" class="hover:text-yellow-400">Sign Out</a> -->
            </div>
        </div>
    </header>
    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-900 w-64 min-h-screen p-4">
            <ul class="space-y-2 mt-4">
             
                <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="#" class="text-sky-400">Dashboard</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./pages/tag.php" class="text-white">tags</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="../Layout/categoryAdmin.php" class="text-white">Category</a></li>

         
                    
             
                
            </ul>
        </aside>
        <!-- Content -->
    <div class="block w-3/4">
        <section class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Dashboard  </h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
               
                <div class="bg-[#B1F0F7] p-6 rounded-lg shadow-lg">

                    <h2 class="text-xl font-bold mb-2">Total Articles</h2>
                   
                    <p class="text-gray-700">89</p>

                  
                </div>
            
                
                <div class="bg-[#FAFFC5] p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Pending Reviews</h2>
                    <p class="text-gray-700">5</p>
                </div>
                <div class="bg-[#EFF3EA] p-6 rounded-lg shadow-lg">
             
                    <h2 class="text-xl font-bold mb-2">Total tags</h2>
                    <p class="text-gray-700">55</p>
                    
                </div>
            
        </section>
<section class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">enseignant Table</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-[#B1F0F7]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Author</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Date</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">1</td>
                    <td class="py-2 px-4 border-b border-gray-300">Introduction to PHP</td>
                    <td class="py-2 px-4 border-b border-gray-300">John Doe</td>
                    <td class="py-2 px-4 border-b border-gray-300">2023-10-01</td>
                    <td class="py-2 px-4 border-b border-gray-300">Published</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">2</td>
                    <td class="py-2 px-4 border-b border-gray-300">Advanced JavaScript</td>
                    <td class="py-2 px-4 border-b border-gray-300">Jane Smith</td>
                    <td class="py-2 px-4 border-b border-gray-300">2023-10-02</td>
                    <td class="py-2 px-4 border-b border-gray-300">Draft</td>
                </tr>
               
            </tbody>
        </table>
    </div>
</section>
<div class="flex ">
<section class="w-full p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Articles Table</h1>
    <div class="overflow-x-auto">
        <table class="w-full  bg-white">
            <thead>
                <tr class="bg-[#98a588]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">1</td>
                    <td class="py-2 px-4 border-b border-gray-300">Introduction to PHP</td>
                  
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">2</td>
                    <td class="py-2 px-4 border-b border-gray-300">Advanced JavaScript</td>
                    
                </tr>
           
            </tbody>
        </table>
    </div>
</section>

<section class="w-full  p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">  Tags Table</h1>
    <div class="overflow-x-auto">
        <table class="w-full  bg-white">
            <thead>
                <tr class="bg-[#98a588]">
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">1</td>
                    <td class="py-2 px-4 border-b border-gray-300">Introduction to PHP</td>
                  
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">2</td>
                    <td class="py-2 px-4 border-b border-gray-300">Advanced JavaScript</td>
                    
                </tr>
           
            </tbody>
        </table>
    </div>
</section>

</div>
</div>

</main>
</body>
</html>
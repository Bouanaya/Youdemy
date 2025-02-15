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
<body class="bg-green-100">
    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-900 w-64 min-h-screen p-4 flex flex-col justify-between fixed">
            <ul class="space-y-2 mt-4">
             
             <li class="px-4 py-2 bg-gray-800 rounded"><a href="#" class="text-green-300">Dashboard</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./pages/tag.php" class="text-white">Tags</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./pages/category.php" class="text-white">Category</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./pages/users.php" class="text-white">Users</a></li>

         
                    
             
                
            </ul>
        <div class="flex bg-red-500 items-center rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
</svg>


        <a href="../Auth/signOut.php" class="px-4 py-2  text-white ">Déconnexion</a>

        </div>
        </aside>
        <!-- Content -->
    <div class="block w-full pl-64">
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
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Categorys Table</h1>
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



<?php

use src\Classes\Cours;
use src\Classes\Crud;

require_once "../../../../vendor/autoload.php";

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'teacher') {
    header('Location: ../../../../index.php');}


    $users = Crud::select('users', "*", "userId = :userId", [':userId' => $_SESSION['userId']]);
  $cou = new Cours();
  $teacherId = $_SESSION['userId'];
  $courses = $cou->selectall($teacherId);


if(isset($_POST['Update'])){
    $data = [
        'username' => $_POST['name'],
        'travailName' => $_POST['namejob'],
        'description' => $_POST['Description'],
        'headerPhoto' => $_POST['headerPhoto'],
        'phone' => $_POST['phone'],
        'photo' => $_POST['profilePhoto'],
        'address' => $_POST['adress'],
    ];
    $result = Crud::update('users', $data ,'userId = :userId', [':userId' => $_SESSION['userId']]);
    if($result){
        header('Location: profile.php');
        
    
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adviser - Kevin Smith Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .menu {
            display: none;
        }

    </style>
</head>
<body class="bg-green-50">

<div class="fixed  w-full h-full bg-green-700 bg-opacity-50 z-50 flex justify-center hidden  items-center " id="addModal">
        <div class="bg-white w-1/3 p-8  shadow-lg">
            <div class="flex justify-between items-center border-b border-green-500">
                <h2 class="text-2xl font-semibold mb-4 text-green-500  ">
               Update information
               </h2>
             
                <button id="close" class="w-6 h-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    

                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="">
                <div class="my-2">
                    <label for="contentTitle" class="block text-sm font-medium text-gray-700">FullName</label>
                    <input type="text" name="name" id="contentTitle" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition"
                  placeholder="Enter title" required>
                </div>
                <div class="my-2">
                    <label for="namejob" class="block text-sm font-medium text-gray-700">Name job</label>
                    <input type="text" name="namejob" id="namejob" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition"
                  placeholder="Enter namejob" required>
                </div>
                <div class="my-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700">phone</label>
                    <input type="tel" name="phone" id="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition"
                  placeholder="Enter phone" required>
                </div>
                <div class="mb-2">
                    <label for="contentDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="Description" id="contentDescription"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition" placeholder="Enter description" required></textarea>
                </div>

                <div class="mb-2">
                    <label for="contentTypeToggle" class="block text-sm font-medium text-gray-700">Photos</label>
                        <input type="text" name="headerPhoto"  id="urlInput" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition " placeholder="Enter headerPhoto url" required>
                        <input type="text" name="profilePhoto"  id="urlInput" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition " placeholder="Enter profilePhoto url" required>
                    </div>
                    <div class="my-2">
                    <label for="adress" class="block text-sm font-medium text-gray-700 ">Adress</label>
                    <input type="text" name="adress" id="adress" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition"
                  placeholder="Enter adress" required>
                </div>
                   
                  
                  
                  
                    
                  

                    <button type="submit" name="Update" class="bg-green-500 hover:bg-green-400  text-white px-4 py-1 rounded-lg w-full">Update</button>




                </div>
        </div>
    </div>
    <!-- Navigation -->
     <div class="">
     <div class="fixed top-[58px] right-10 z-50 menu border-2 border-t-0 border-green-400 ">
     <nav class="space-y-4  bg-white opacity-60 shadow-lg p-2">
            <a href="" class="flex gap-2 items-center py-2 px-4 rounded-lg hover:bg-green-100  "> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>
</a>

  <a href="../../../views\Auth\signOut.php" class="flex gap-2 py-2 items-center px-4 rounded-lg hover:bg-green-100 "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
</svg>


</a>
           
        </nav>
     </div>
    <nav class="fixed bg-transparent w-screen bg-white border-b-2 border-green-400 z-10 ">
        <div class="bg-white shadow flex items-center justify-between px-16 py-2 ">
            <!-- Left: LinkedIn Logo & Search -->
            <div class="flex items-center space-x-4">
                <img src="../../../../assets/images/letter-y-logo-3d-colorful-design-modern-icon_345408-515-removebg-preview.png" alt="LinkedIn" class="w-10 h-10 rounded">
                <div class="relative">
                    <input type="text" placeholder="Search" class="bg-gray-100 px-4 py-2 rounded-lg focus:outline-none w-64">
                </div>
            </div>

            <!-- Middle: Navigation Icons -->
            <nav class="flex items-center space-x-8">
                <!-- Accueil -->
                <div class="flex flex-col items-center cursor-pointer group text-gray-500  hover:text-blue-600">
                    <div class="relative">
                        <a href="../enseignant.php">
                        <svg class="W-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <p class="text-xs mt-1 text-gray-500 hover:text-blue-600">Accueil</p>
                    </a>
                </div>

                <!-- Mon Réseau -->
                <div class="flex flex-col items-center cursor-pointer group text-gray-500 hover:text-blue-600">
                    <div class="relative">
                        <svg class="W-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                            3
                        </span>
                    </div>
                    <p class="text-xs mt-1">Mon Réseau</p>
                </div>
                <!-- Messagerie -->
                <div class="flex flex-col items-center cursor-pointer group text-gray-500 hover:text-blue-600">
                    <div class="relative">
                        <svg class="W-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                            2
                        </span>
                    </div>
                    <p class="text-xs mt-1">Messagerie</p>
                </div>

                <!-- Notifications -->
                <div class="flex flex-col items-center cursor-pointer group text-gray-500 hover:text-blue-600">
                    <div class="relative">
                        <svg class="W-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                            5
                        </span>
                    </div>
                    <p class="text-xs mt-1">Notifications</p>
                </div>

                <!-- Séparateur vertical -->



            </nav>
            <!-- Profil -->

            <div class="flex flex-col items-center cursor-pointer group text-gray-500 hover:text-blue-600">

                <div class="relative">
                    <button class="showMenu flex flex-col items-center" >
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg><p class="text-xs mt-1 text-blue-600"><?php

                                        echo $_SESSION['userName']
                                        ?></p>
                    </button
                    >
                </div>
                
            </div>


        </div>
    </nav>

    <!-- Cover Image -->
    <div class="h-64 w-full bg-cover bg-center " style="background-image: url('<?=$users[0]["headerPhoto"] ?>')">
    <div class="flex flex-end absolute top-20 right-6">
            <button id="showModeel" class="bg-white text-black p-2 rounded-full w-10 h-10 flex justify-center items-center "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
</svg>
</button>
            </div>
    </div>

    <!-- Profile Section -->
    <div class="max-w-7xl mx-auto px-6 -mt-20">
        <!-- Profile Header -->
        <div class="flex items-start gap-6">
            <img src="<?=$users[0]["photo"] ?>"  alt="Kevin Smith" 
                 class="w-40 h-40 rounded-full border-4 border-white shadow-lg object-cover"/>
            <div class="mt-24">
                <h1 class="text-3xl font-bold"><?=$users[0]["username"] ?></h1>
                <p class="text-gray-600"><?=$users[0]["travailName"] ?></p>
                <div class="flex items-center gap-6 mt-2 text-sm text-gray-600">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <?=$users[0]["address"] ?>
                    </div>
         
           
                  
                </div>
            
     
               
            </div>
          
        
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-3 gap-6 mt-8">
            <!-- Left Column -->
            <div class="space-y-4 bg-slate-200 h-96 p-4 rounded-lg">
                <h2 class="text-xl font-bold">À propos</h2>
                <!-- Contact Info -->
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <?=$users[0]["phone"] ?>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <?=$users[0]["email"] ?>                    </div>
                        <div class="flex items-center gap-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
</svg><?=$users[0]["description"] ?></div>
                </div>

              
            </div>

            <!-- Middle Column - Video -->
            <div class="col-span-2 space-y-6">
                <!-- Introduction Video -->
                 <?php foreach ($courses as $course) :?>
                 
                
                <div class="">
                <div class="w-3/4 mx-auto rounded-xl overflow-hidden shadow p-4 bg-white">
                <img src="<?=$course["content"] ?>" alt="Course" class="w-full h-60 object-cover  rounded-xl "/>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-600"><?=$course["title"] ?></span>
                        <div>
                            <?php if($course["status"] == "draft"){
                                echo '<button class="bg-blue-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>';
                            } else if($course["status"] == "suspended"){
                                echo '<button class="bg-red-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>';
                            } else {
                                echo '<button class="bg-green-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>';
                            }
                            ?>
                           
                        </div>
                    </div>
                    <p class="text-lg mb-2"><?=$course["description"] ?></p>
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>15 Classes</span>
                        <span>150 Students</span>
                    </div>
                    <div class="flex items-center justify-between mt-4 border-t pt-4">
                        <span class="text-green-500 font-semibold text-3xl"><?= $course['price'] . " ". $course['devise']?></span>
                        <div class="flex items-center">
                            <img src="<?=$users[0]["photo"] ?>" alt="Instructor" class="w-8 h-8 object-cover rounded-full"/>
                            <span class="ml-2 text-sm text-gray-600"><?=$users[0]["username"] ?></span>
                        </div>
                    </div>
                    <div class="mt-4">
     

      <div class="mt-4 flex items-center justify-between text-gray-500">
        <div class="flex items-center space-x-1">
          <div class="flex -space-x-1">
            <span class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">👍</span>
          </div>
          <span>Lorem ipsum and 291 others</span>
        </div>
        <div>55 comments</div>
      </div>

      <div class="mt-4 border-t pt-4">
        <div class="flex justify-center items-center gap-2">
            <img src="../../../../assets/images/star.png" alt="" class="W-8 h-8 " >
            <img src="../../../../assets/images/star.png" alt="" class="W-8 h-8 ">
            <img src="../../../../assets/images/star.png" alt="" class="W-8 h-8 ">
            <img src="../../../../assets/images/rating.png" alt="" class="W-8 h-8 ">
         
      
        </div>
      </div>
    </div>
                </div>
            </div>
                </div>
                <?php endforeach; ?>
                </div>


                

              

        </body>

                <script>
                    const menu = document.querySelector('.menu');
                    const showMenu = document.querySelector('.showMenu');
                    showMenu.addEventListener('click', () => {
                        menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
                    });

                    const showModeel = document.querySelector('#showModeel');
                    const addModal = document.querySelector('#addModal');
                    const close = document.querySelector('#close');
                    showModeel.addEventListener('click', () => {
                        addModal.classList.remove('hidden');
                    });
                    close.addEventListener('click', () => {
                        addModal.classList.add('hidden');
                    });
          
          
                </script>
</html>





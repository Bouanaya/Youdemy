<?php
require_once  "../../../vendor/autoload.php";

use src\Classes\Cours;
use src\config\Database;
use src\Classes\Crud;




session_start();


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'teacher') {
    header('Location: ../../../index.php');}

    $teacherId = $_SESSION['userId'];
if(isset($_POST['update'])){
 
    $data = [
        'title' => $_POST['Title'],
        'description' => $_POST['Description'],
        'categoryId' => $_POST['category'],
        'price' => $_POST['price'],
        'teacherId' => $_SESSION['userId'],
        "content" => $_POST['fileInput'] ?? $_POST['urlInput'],
        'status' => $_POST['status'],
        'devise' => $_POST['devise'],
        'courseId' => $_GET['id']
    ];
   $updateecours =new Cours();
    $result = $updateecours->updateCours($data, $_GET['id']);
    if (!empty($_POST['tags']) && is_array($_POST['tags'])) {
        Crud::delete('coursetags', 'courseId = :courseId', ['courseId' => $_GET['id']]);
            $tags = $_POST['tags'];
            foreach ($tags as $tagId) {
                $data = [
                    'courseId' =>  $_GET['id'],
                    'tagId' => $tagId
                ];
                Crud::insert('coursetags', $data);
                $cou = new Cours;
$courses = $cou->selectall($teacherId);
header('Location: enseignant.php');
         
            } 
                 
    }

 
}
if (isset($_POST['submit'])) {
    if (isset($_POST['contentTypeToggle'])) {
        $data['Type'] = 'file';
        $data['URL'] = $_POST['fileInput'];
    } else {
        $data['Type'] = 'url';
        $data['URL'] = $_POST['urlInput'];
    }
    $data = [
        'title' => $_POST['Title'],
        'description' => $_POST['Description'],
        'categoryId' => $_POST['category'],
        'price' => $_POST['price'],
        'teacherId' => $_SESSION['userId'],
        "content" => $data['URL'],
        'status' => $_POST['status'],
        'devise' => $_POST['devise']


    ];
    $result = Crud::insert('courses', $data);
   $articleId = Database::connect()->lastInsertId();
    if ($result) {
        $tags = $_POST['tags'];
     
        if (isset($tags) && is_array($tags)) {
            foreach ($tags as $tagId) {
                $data = [
                    'courseId' =>  $articleId,
                    'tagId' => (int)$tagId
                ];
                Crud::insert('coursetags', $data);
       
            }
    } else {
        echo "<script>alert('Failed to add course')</script>";
    }
}
}


$tags = Crud::select('tags');
$categories = Crud::select('category');
$courses = new Cours;
$courses = $courses->selectall($teacherId);



if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
    $course = Crud::select('courses', '*', 'courseId = :courseId', ['courseId' => $_GET['id']]);

    echo "<script>
document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addModal').classList.toggle('hidden');
            document.body.style.overflow = 'hidden';
   
});
</script>";

}

if(isset($_GET['action']) && $_GET['action'] == 'dalete' && isset($_GET['id'])){
    $course = Crud::delete('courses', 'courseId = :courseId', ['courseId' => $_GET['id']]);
    header('Location: enseignant.php');
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <style>
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .slide-in {
            animation: slideIn 0.5s ease-out;
        }

        .input-transition {
            transition: all 0.3s ease;
        }

        .input-transition:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="relative">
    <div class="fixed  w-full h-full bg-green-700 bg-opacity-50 z-50 flex justify-center hidden items-center " id="addModal">
        <div class="bg-white w-1/3 p-8  shadow-lg">
            <div class="flex justify-between items-center border-b border-green-500">
                <h2 class="text-2xl font-semibold mb-4 text-green-500  ">
                <?= isset($course) ? 'Update Course' : 'Add Course' ?>
               </h2>
             
                <button id="close" class="w-6 h-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    

                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="">
                <div class="my-2">
                    <label for="contentTitle" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="Title" id="contentTitle" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition"
                    value="<?= isset($course) ? trim($course[0]["title"]) : '' ?>"placeholder="Enter title" required>

                    <input type="hidden" name="courseId" id="contentTitle" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition"
                    value=" <?= isset($course) ? $course[0]["courseId"] : '' ?>
                    "
                    placeholder="Enter title" required>
                </div>
                <div class="mb-2">
                    <label for="contentDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="Description" id="contentDescription"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition" placeholder="Enter description" required><?= isset($course) ? $course[0]["description"] : '' ?></textarea>
                </div>

                <div class="mb-2">
                    <label for="contentTypeToggle" class="block text-sm font-medium text-gray-700">Content Type</label>
                    <div class="flex items-center">
                        <input type="checkbox" name="contentTypeToggle"  id="contentTypeToggle" class="mr-2">
                        <label for="contentTypeToggle" class="text-sm text-gray-700">File</label>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="urlInput" value="<?= isset($course[0]["content"]) ? $course[0]["content"] : '' ?>" id="urlInput" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition hidden" placeholder="Enter URL">
                        <input type="file" name="fileInput" id="fileInput" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition hidden">
                    </div>

                    <div class="mb-2">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition" required> 

                            <?php
                           echo "<option value=''>Select category</option>";
                            foreach ($categories as $categorie) : ?>
                                <option value="<?= $categorie['categoryId'] ?>"><?= $categorie['categoryName'] ?></option>

                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                    <div class="mb-2  ">
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <div class="flex flex-wrap gap-2 ">
                        <?php foreach ($tags as $tag) : ?>
                         
                            <input type="checkbox" name="tags[]" id="tags" class="mr-2" value="<?= $tag['tagId'] ?>">
                            <label for="tags" class="text-sm text-gray-700"><?= $tag['tagName'] ?></label>
                         
                        <?php endforeach; ?>
                    </div>
                    </div>
                    <div class="mb-2 flex gap-3">
                        <div class="">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" min="0" id="price" value="<?= isset($course) ? $course[0]["price"] : '' ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition" placeholder="Enter price" required>
                        </div>
                        
                        <div class="">
                        <label for="devise" class="block text-sm font-medium text-gray-700">Devise</label>
                       <select  id="" name="devise" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition" required>
                            <option value="DH">DH</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                          
                       </select>
                      

                    </div>
                  
                    
                    </div>
                    <div class="mb-2">
                        <label for="Status" class="block text-sm font-medium text-gray-700">status</label>
                        <select name="status" id="" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm input-transition">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>

                    <button type="submit" name="<?= isset($course) ? "update" : 'submit' ?>" class="bg-blue-500 text-white px-4 py-1 rounded-lg w-full"><?= isset($course) ? "Update" : 'Submit' ?></button>




                </div>
        </div>
    </div>
    <!-- Navigation -->
    <nav class="fixed bg-transparent w-screen bg-white border-b-2 border-green-400 z-10 ">
        <div class="bg-white shadow flex items-center justify-between px-16 py-2 ">
            <!-- Left: LinkedIn Logo & Search -->
            <div class="flex items-center space-x-4">
                <img src="../../../assets/images/letter-y-logo-3d-colorful-design-modern-icon_345408-515-removebg-preview.png" alt="LinkedIn" class="w-10 h-10 rounded">
                <div class="relative">
                    <input type="text" placeholder="Search" class="bg-gray-100 px-4 py-2 rounded-lg focus:outline-none w-64">
                </div>
            </div>

            <!-- Middle: Navigation Icons -->
            <nav class="flex items-center space-x-8">
                <!-- Accueil -->
                <div class="flex flex-col items-center cursor-pointer group  text-blue-600">
                    <div class="relative">
                        <svg class="W-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <p class="text-xs mt-1 text-blue-600">Accueil</p>
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
                    <a href="./pages/profile.php?id=<?= $_SESSION['userId']?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    </a>
                </div>
                <p class="text-xs mt-1"><?php

                                        echo $_SESSION['userName']
                                        ?></p>
            </div>


        </div>
    </nav>
    <section>
        <div class="pt-24"></div>

    </section>
    <section class="container mx-auto px-6 pb-16 pt-10 bg-green-100 rounded-3xl">
        <div class="flex gap-10 items-center mb-8">
            <h2 class="text-4xl text-gray-800 w-full">Most Popular Courses</h2>
            <?php if(isset($course)){
                echo "";
               }else{
                echo '<button class="w-10  bg-blue-500 text-white p-2 rounded-full bounce-in-fwd" id="addo">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
</svg>

            </button>';
               } ?>
        
        
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Course Card -->
            <?php foreach ($courses as $course) : ?>
                <div class="bg-white rounded-xl overflow-hidden shadow p-4">
                    <img src="<?= $course['content'] ?>" alt="Course" class="w-full h-48 object-cover rounded-xl" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-gray-600 text-2xl font-semibold"><?= $course['title'] ?></span>
                            <div>
                            <?php

                            switch ($course['status']) {
                                case 'draft':
                                    echo '<button class="bg-blue-100 text-blue-700 px-2  rounded">draft</button>';
                                    break;
                                case 'published':
                                    echo '<button class="bg-green-100 text-green-700 px-2  rounded">published</button>';
                                    break;
                                default:
                                    echo '<button class="bg-red-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>';
                                    break;
                            }
                      
                         
                       
                            
                            ?>
                        
                            </div>
                        </div>
                        <p class="text-lg mb-2"><?php if (strlen($course['description'] > 75)) {
                                                    echo substr($course['description'], 0, 75) . '...';
                                                } else {
                                                    echo $course['description'];
                                                } ?></p>
                        <div class="flex items-center flex-wrap text-sm text-gray-600 gap-2">
                            <?php 
                            $tags = explode(',', $course['tags']);
                            foreach($tags as $tag): ?>
                            <span class="px-2 py-1 bg-green-300 text-black rounded "><?= $tag ?></span>
                           <?php endforeach  ?>
                        </div>
                        <div class="flex items-center justify-between mt-4 border-t pt-4">
                            <span class="text-yellow-600 font-semibold text-3xl"><?= $course['price'] . " ". $course['devise']?></span>
                            <div class="flex items-center gap-4">
                                <a href="enseignant.php?id=<?= $course["courseId"] ?>&action=update" class="w-6  rounded "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-600 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>
                                            </a>
                                <a href="enseignant.php?id=<?= $course["courseId"] ?>&action=dalete" class="w-6  rounded "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</a>                           
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional course cards -->
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16 mt-8">
        <div class="container mx-auto px-6">


            <div class=" border-b border-gray-400 py-6">
                <div class="md:grid grid-cols-4 gap-8 text-white">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <h1 class="text-3xl">🎓 E-Learning</h1>
                        </div>
                        <p class="text-sm">Empowering your learning journey with top-notch courses.</p>
                        <div class="flex space-x-5">
                            <a href="#"><i class="pi pi-facebook hover:text-[#4ADE80] duration-500" style="font-size: 2rem"></i></a>
                            <a href="#"><i class="pi pi-twitter hover:text-[#4ADE80] duration-500" style="font-size: 2rem"></i></a>
                            <a href="#"><i class="pi pi-instagram hover:text-[#4ADE80] duration-500" style="font-size: 2rem"></i></a>
                        </div>
                    </div>
                    <div class="space-y-4 mt-6">
                        <h1 class="text-xl text-[#4ADE80]">Company</h1>
                        <div class="flex flex-col gap-2 text-sm">
                            <a href="#">About</a>
                            <a href="#">Careers</a>
                            <a href="#">Mobile</a>
                            <a href="#">Blog</a>
                            <a href="#">How we work</a>
                        </div>
                    </div>
                    <div class="space-y-4 mt-6">
                        <h1 class="text-xl text-[#4ADE80]">Contact</h1>
                        <div class="flex flex-col gap-2 text-sm">
                            <a href="#">Help/FAQ</a>
                            <a href="#">Press</a>
                            <a href="#">Affiliates</a>
                            <a href="#">Hotel owners</a>
                            <a href="#">Partners</a>
                        </div>
                    </div>
                    <div class="space-y-4 mt-6">
                        <h1 class="text-xl text-[#4ADE80]">More</h1>
                        <div class="flex flex-col gap-2 text-sm">
                            <a href="#">Airline fees</a>
                            <a href="#">Airlines</a>
                            <a href="#">Low fare tips</a>
                            <a href="#">Badges & Certificates</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:px-8 px-4 flex justify-between items-center py-4 text-white">
                <h1 class="text-sm">&copy; 2025 E-Learning. All rights reserved</h1>
                <div class="hidden md:flex space-x-6">
                    <a href="#">Privacy policy</a>
                    <a href="#" class="border-l pl-4">Terms & conditions</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
 document.getElementById('close').addEventListener('click', function() {
            document.getElementById('addModal').classList.toggle('hidden');
            document.body.style.overflow = 'auto';
        });
     

        const addoButton = document.querySelector('#addo');
        if (addoButton) {
            addoButton.addEventListener('click', function() {
                document.getElementById('addModal').classList.toggle('hidden');
                document.body.style.overflow = 'hidden';

            });
        }

        const contentFile = document.getElementById('contentFile');
        if (contentFile) {
            contentFile.addEventListener('change', function(e) {
                const fileName = e.target.files.length > 0 ? e.target.files[0].name : '';
                document.getElementById('fileName').textContent = fileName;
            });
        }

        const contentTypeToggle = document.getElementById('contentTypeToggle');
        if (contentTypeToggle) {
            contentTypeToggle.addEventListener('change', function(e) {
                const urlInput = document.getElementById('urlInput');
                const fileInput = document.getElementById('fileInput');
                if (e.target.checked) {
                    urlInput.classList.add('hidden');
                    fileInput.classList.remove('hidden');
                } else {
                    urlInput.classList.remove('hidden');
                    fileInput.classList.add('hidden');
                }
            });
        }
    });
</script>
</body>
</html>
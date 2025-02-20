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

if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $updatecategory = $category->updateCategory();
    echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
          document.querySelector('.module').classList.toggle('active');
      });
    </script>";
}
if(isset($_POST['update'])){
    $category->updateCategory();
    header('Location: http://localhost/Youdemy/src/views/Admin/pages/category.php');
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Category </title>
    <style>
        @-webkit-keyframes bounce-in-fwd {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
                opacity: 0
            }

            38% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
                opacity: 1
            }

            55% {
                -webkit-transform: scale(.7);
                transform: scale(.7);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            72% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            81% {
                -webkit-transform: scale(.84);
                transform: scale(.84);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            89% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            95% {
                -webkit-transform: scale(.95);
                transform: scale(.95);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }
        }

        @keyframes bounce-in-fwd {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
                opacity: 0
            }

            38% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
                opacity: 1
            }

            55% {
                -webkit-transform: scale(.7);
                transform: scale(.7);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            72% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            81% {
                -webkit-transform: scale(.84);
                transform: scale(.84);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            89% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            95% {
                -webkit-transform: scale(.95);
                transform: scale(.95);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }
        }

        .bounce-in-fwd {
            -webkit-animation: bounce-in-fwd 1.1s both;
            animation: bounce-in-fwd 1.1s both
        }

        body {
            overflow: hidden;
        }

        .form-container {
            background-color: #B1F0F7;
            /* Added background color */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #00796b;
            /* Changed back to original color */
        }
        .ele::-webkit-scrollbar {
            display: none;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #b2dfdb;
            border-radius: 5px;
            box-sizing: border-box;
        }


        .module {
            right: -100%;
            position: absolute;
            transition: right 0.5s;
        }

        .module.active {
            right: 0;
        }

        .ele::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-green-100">
 
    <!-- Main Section -->
    <main class="flex">
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
               <li class="px-4 py-2 bg-gray-800 rounded flex gap-2 "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-300">
  <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
</svg>
<a href="" class=" text-green-300">Category</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
</svg>
<a href="./users.php" class="text-white">Users</a></li>

         
                    
             
                
            </ul>
        <div class="flex bg-red-700 items-center rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.49 12 3.74 8.248m0 0 3.75-3.75m-3.75 3.75h16.5V19.5" />
</svg>



<a href="../../Auth/signOut.php" class="px-4 py-2  text-white ">Déconnexion</a>




        </div>
        </aside>
        <div class="module w-1/3  h-full z-50">
            <div class="form-container absolute w-full h-full bg-white p-8">
                <div class="flex justify-between items-center  mb-6">
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'update') {
                        echo '<h2 class="text-2xl">UPDATE THE CATEGORY : </h2>';
                        echo '<a href="./category.php" >
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>
</a>';
                    } else {
                        echo '<h2 class="text-2xl">CREATE THE CATEGORY : </h2>';
                        echo '<button id="close">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>
</button>';
                    }
                    ?>

                </div>
                <form action="../../../Controllers/Category.php" method="post">
                    <label for="Category">Category Name</label>
                    <div class="parent">
    <input type="text" id="Category" name="category" 
        placeholder="Enter a Category PHP, Laravel, API..."  
        value="<?= (isset($_GET['action']) && $_GET['action'] == 'update') ? htmlspecialchars( $updatecategory[0]['categoryName']) : '' ?>" 
        required>

    <textarea class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"  
        rows="4" name="description" placeholder="Écrivez ici..."><?= trim($updatecategory[0]['description'] ?? '');?>
    </textarea>

    <input type="hidden" name="id" 
        value="<?=
            $updatecategory[0]['categoryId'] ?? '';
        ?>">
</div>
<?php
                    if (isset($_GET['action']) && $_GET['action'] == 'update') {

                        echo ' <input type="submit" name="update" value="Update " class="bg-blue-400 cursor-pointer text-white py-1 px-2 mt-2 rounded hover:bg-blue-600 w-full">';
                    } else {
                        echo ' <input type="submit" name="submit" value="Submit" class="bg-green-400 cursor-pointer text-white py-1 px-2 w-full rounded hover:bg-green-600">';
                    }
                    ?>

                </form>
            </div>
        </div>
        <!-- Content -->
    <div class="block w-full pl-64">
        <section class="flex-1 p-6">
            <div class="flex justify-between items-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Category</h1>
            <button class=" add  bg-[#257fc4] text-white p-2 rounded-full bounce-in-fwd"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">



<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
</svg>
</button>
            </div>

      
           

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <div class="bg-[#98a588] p-6 rounded-lg shadow-lg text-white">
                    <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold mb-2">Total Categorys</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
</svg>
                    </div>
                    <?php
                    foreach ($countCategory as $category)
                    
                    ?>
                    <p class="text-gray-700 font-bold text-4xl">
                    <?= $category["count(*)"] ?>
                    </p>
                </div>
              
             
                </div>
            
        </section>
<section class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Category Table</h1>


    <div class=" overflow-auto max-h-[340px] no-scrollbar ele">
        <table class=" w-[60%] bg-white"> 
            <thead class="sticky top-0 z-10">
                <tr class=" border-b-4 bg-[#98a588]">
                    <th class="py-2 px-4  border-gray-300 text-left leading-tight">ID</th>
                    <th class="py-2 px-4  border-gray-300 text-left leading-tight">Title</th>
                    <th class="py-2 px-4  border-gray-300 text-left leading-tight">description</th>
                    <th class="py-2 px-4  border-gray-300 text-left leading-tight">Action</th>
                 
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($categorys as $category) : ?>
                    <tr class="border-b">
                        <td class="py-2 px-4 border-gray-300"><?= $category['categoryId'] ?></td>
                        <td class="py-2 px-4 border-gray-300"><?= $category['categoryName'] ?></td>
                        <td class="py-2 px-4 border-gray-300"><?php
                   strlen($category['description']) > 12 ? $texte_affiche = substr($category['description'], 0, 12) . '...' : $texte_affiche = $category['description'];

                        echo $texte_affiche; // Résultat : "Ceci est un ..."
                        
                        
                        ?></td>
                        <td class="py-2 px-4 border-gray-300 flex space-x-4">
                            <a href="./Category.php?action=update&id=<?= $category['categoryId'] ?>" class="bg-blue-400 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</a>
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
<script>
        const btn = document.querySelector('.add');
        const module = document.querySelector('.module');
        btn.addEventListener('click', () => {
            module.classList.toggle('active');
        });
        const close = document.querySelector('#close');
        close.addEventListener('click', () => {
            module.classList.remove('active');
        });

        const addTag = document.querySelector('.addTag');
        const parent = document.querySelector('.parent');
        addTag.addEventListener('click', () => {
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'category[]';
            input.placeholder = 'Enter a tag  PHP, Laravel, API ...';
            input.required = true;
            parent.appendChild(input);
            const remove = document.createElement('button');
            remove.textContent = 'Remove';
            remove.classList = 'mb-2 py-1 px-3 rounded text-white bg-red-400';
            parent.appendChild(remove);
            remove.addEventListener('click', () => {
                parent.removeChild(input);
                parent.removeChild(remove);
            });

        });
    </script>
</body>
</html>
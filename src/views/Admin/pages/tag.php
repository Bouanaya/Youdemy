<?php
require_once '../../../../vendor/autoload.php';
use src\Classes\Tag;
$tag = new Tag();
$tags = $tag->gettags(); 

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
    <style>
@-webkit-keyframes bounce-in-fwd{0%{-webkit-transform:scale(0);transform:scale(0);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:0}38%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}55%{-webkit-transform:scale(.7);transform:scale(.7);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}72%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}81%{-webkit-transform:scale(.84);transform:scale(.84);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}89%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}95%{-webkit-transform:scale(.95);transform:scale(.95);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}100%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}@keyframes bounce-in-fwd{0%{-webkit-transform:scale(0);transform:scale(0);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:0}38%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}55%{-webkit-transform:scale(.7);transform:scale(.7);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}72%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}81%{-webkit-transform:scale(.84);transform:scale(.84);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}89%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}95%{-webkit-transform:scale(.95);transform:scale(.95);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}100%{-webkit-transform:scale(1);transform:scale(1);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}
.bounce-in-fwd{-webkit-animation:bounce-in-fwd 1.1s both;animation:bounce-in-fwd 1.1s both}
body{
    overflow: hidden;
}
.form-container {
            background-color: #B1F0F7; /* Added background color */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
        }
    
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #00796b; /* Changed back to original color */
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #b2dfdb;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            background-color: #00796b; /* Changed back to original color */
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #004d40; /* Changed back to original color */
        }
        .module{
            right: -100%;
            position: absolute;
            transition: right 0.5s;
        }
        .module.active{
            right: 0;
        }
        .ele::-webkit-scrollbar {
  display: none;
}
    </style>
</head>
<body class="bg-green-100">
    <!-- Main Section -->
    <main class="flex ">
        <!-- Sidebar -->
      <!-- Sidebar -->
      <aside class="bg-gray-900 w-64 min-h-screen p-4 flex flex-col justify-between fixed">
            <ul class="space-y-2 mt-4">
             
             <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="../../Admin/dashbord.php" class="text-white">Dashboard</a></li>
               <li class="px-4 py-2 bg-gray-800 rounded"><a href="./pages/tag.php" class=" text-green-300">Tags</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./Category.php" class="text-white">Category</a></li>
               <li class="px-4 py-2 hover:bg-gray-800 rounded"><a href="./users.php" class="text-white">Users</a></li>

         
                    
             
                
            </ul>
        <div class="flex bg-red-500 items-center rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
</svg>


<a href="../../Auth/signOut.php" class="px-4 py-2  text-white ">Déconnexion</a>




        </div>
        </aside>
        <div class="module w-1/3  h-full z-50">
            <div class="form-container absolute w-full h-full bg-white p-8">
                <div class="flex justify-between items-center  mb-6">
                <h2 class="text-2xl">CREATE THE TEGS : </h2>
<button id="close">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>
</button>
                </div>
                <form action="../../../Controllers/Tag.php" method="post">
                <label for="tag">Tag Name</label>
                <div class="parent">
<input type="text" id="tag" name="tags[]" placeholder="Enter a tag  PHP, Laravel, API ..." required>
</div>
<button class="my-2 py-1 px-3 rounded text-white bg-blue-400 addTag">Add Tag</button>
<input type="submit" name="submit" value="Submit">

                </form>
    </div>
        </div>
        <!-- Content -->
    <div class="block w-full pl-64">
        <section class="flex-1 p-6">
            <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Tags</h1>
            <button class=" add  bg-[#257fc4] text-white p-2 rounded-full bounce-in-fwd" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
</svg>
            </button>
            </div>
           

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <div class="bg-[#B1F0F7] p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Total Tag</h2>
                    <p class="text-gray-700">150</p>
                </div>
              
             
                </div>
            
        </section>
<section class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Tag Table</h1>


    <div class="overflow-auto max-h-[340px] no-scrollbar ele">
    <table class="w-1/2 bg-white">
        <thead class="bg-[#B1F0F7] sticky top-0 z-10">
            <tr class="border-b-4">
                <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag) : ?>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300"><?= $tag['tagId'] ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?= $tag['tagName'] ?></td>
                    <td class="py-2 px-4 border-b border-gray-300 flex space-x-4">
                        <a href="../forms/updateTag.php?action=update&id=<?= $tag['tagId'] ?>" class="bg-blue-400 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</a>
                        <a href="../../../Controllers/Tag.php?action=delete&id=<?= $tag['tagId'] ?>" class="bg-red-400 text-white py-1 px-2 rounded hover:bg-red-600">Delete</a>
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
        input.name = 'tags[]';
        input.placeholder = 'Enter a tag  PHP, Laravel, API ...';
        input.required = true;
        parent.appendChild(input);
        const remove = document.createElement('button');
        remove.textContent = 'Remove';
        remove.classList = 'mb-2 py-1 px-3 rounded text-white bg-red-400' ;
   parent.appendChild(remove);
        remove.addEventListener('click', () => {
            parent.removeChild(input);
            parent.removeChild(remove);
        });

    });

</script>
</body>
</html>
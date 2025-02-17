<?php
require_once "../../../vendor/autoload.php";

use src\Classes\Category;
use src\Classes\Tag;
use src\Classes\Crud;

session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: http://localhost/Youdemy/src/views/Auth/signIn.php');
}

$tag = new Tag();
$tags = $tag->gettags();
$tagcount = crud::select("tags", 'count(*) as count');

$category = new Category();
$categories = $category->getCategory();
$categorycount = crud::select("category", 'count(*) as count');
$countusers = crud::select("users", 'count(*) as count',"status != 'admin' ");




// Simulated data (Replace this with data from your database)
$labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
]; // X-axis (Months)

function getcount($user)
{
    $data = [];
    $dates = [
        '2025-01-01',
        '2025-02-01',
        '2025-03-01',
        '2025-04-01',
        '2025-05-01',
        '2025-06-01',
        '2025-07-01',
        '2025-08-01',
        '2025-09-01',
        '2025-10-01',
        '2025-11-01',
        '2025-12-01'
    ];

    for ($i = 0; $i < count($dates); $i++) {
        // Define start and end of the month
        $startDate = $dates[$i];
        $endDate = ($i < count($dates) - 1) ? $dates[$i + 1] : '2025-12-31';

        // Get count for the current month only
        $users = Crud::select("users", "COUNT(*) as count", "role = '$user' AND created_at BETWEEN '$startDate' AND '$endDate' AND status = 'active'");

        // Store count in array
        $data[] = $users[0]["count"] ?? 0; // Ensure valid data even if query fails
    }

    return $data;
}

// Get teacher data for each month
$data1 = getcount('teacher');

// Sample student data (static for example)
$data2 = getcount('student');

$userspanding = Crud::select("users", "*", "status ='pending' AND role != 'admin' LIMIT 6");
$userActive = Crud::select("users", "*", "status ='active' AND role != 'admin' LIMIT 6");
$usersSuspended = Crud::select("users", "*", "status ='suspended' AND role != 'admin' LIMIT 6");







?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <title>Articles Dashboard</title>

</head>

<body class="bg-green-100">
    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-900 w-64 min-h-screen p-4 flex flex-col justify-between fixed">
            <ul class="space-y-2 mt-4">

                <li class="px-4 py-2 bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-300 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg><a href="#" class="text-green-300">Dashboard</a></li>
                <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg><a href="./pages/tag.php" class="text-white">Tags</a></li>
                <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg><a href="./pages/category.php" class="text-white">Category</a></li>
                <li class="px-4 py-2 hover:bg-gray-800 rounded flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg><a href="./pages/users.php" class="text-white">Users</a></li>





            </ul>
            <div class="flex bg-red-700 items-center rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.49 12 3.74 8.248m0 0 3.75-3.75m-3.75 3.75h16.5V19.5" />
                </svg>



                <a href="../Auth/signOut.php" class="px-4 py-2  text-white ">Déconnexion</a>

            </div>
        </aside>
        <!-- Content -->
        <div class="block w-full pl-64">
            <section class="flex-1 p-6">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Dashboard </h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <div class="bg-[#B1F0F7] p-6 rounded-lg shadow-lg">

                        <h2 class="text-xl font-bold mb-2">Total Articles</h2>

                        <p class="text-gray-700">89</p>
                    </div>


                    <div class="bg-[#FAFFC5] p-6 rounded-lg shadow-lg">
                        <div class="flex justify-between items-start">
                            <h2 class="text-xl font-bold mb-2">Total users</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                        </div>
                        <p class="text-gray-700"><?=$countusers[0]["count"]?></p>
                    </div>
                    <div class="bg-[#e8f8d4] p-6 rounded-lg shadow-lg">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold mb-2">tags</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>

                        </div>

                        <p class="text-gray-700"><?= $tagcount[0]["count"] ?></p>

                    </div>

            </section>
            <section class="flex-1 p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Users Statistique</h1>
                <div class="overflow-x-auto">


                    <canvas id="myChart" class="w-1/2"></canvas>






                </div>
            </section>
            <section class="flex-1 p-6">
                <div class="flex gap-4 w-full">
                    <div class="w-1/3">
                        <div class="flex gap-2 justify-between px-2 items-center">
                    <h1 class="text-3xl font-bold text-green-400 mb-4">Users Active</h1>
<div class="w-5 h-5 bg-green-400 rounded-full"></div>
                        </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-green-400 text-white">

                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">username</th>

                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">role</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userActive as $user) : ?>

                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $user['username'] ?></td>

                                        <td class="py-2 px-4 border-b border-gray-300"> <?= $user['role'] ?></td>

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
                
                 border-gray-300"><?= $user['status'] ?></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <button class="bg-green-500 w-full  py-2"><a href="./pages/users.php">view all</a> </button>
                    </div>
                </div>

                <div class="w-1/3">
                <div class="flex gap-2 justify-between px-2 items-center">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">Users panding</h1>
<div class="w-5 h-5 bg-orange-400 rounded-full"></div>
                        </div>
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white">
                            <thead>
                                <tr class="bg-orange-400 text-white">

                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">username</th>
                                   
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">role</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userspanding as $user) : ?>

                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $user['username'] ?></td>

                                        <td class="py-2 px-4 border-b border-gray-300"> <?= $user['role'] ?></td>

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
                
                 border-gray-300"><?= $user['status'] ?></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <button class="bg-orange-400 w-full py-2"><a href="./pages/users.php">view all</a></button>
                    </div>
                </div>
                <div class="w-1/3">
                <div class="flex gap-2 justify-between px-2 items-center">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">Users Suspended</h1>
<div class="w-5 h-5 bg-red-500 rounded-full"></div>
                        </div>
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white">
                            <thead>
                                <tr class="bg-red-500 text-white">

                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">username</th>
                                   
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">role</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usersSuspended as $user) : ?>

                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $user['username'] ?></td>
                                        <td class="py-2 px-4 border-b border-gray-300"> <?= $user['role'] ?></td>

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
                
                 border-gray-300"><?= $user['status'] ?></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <button class="bg-red-500 w-full py-2"><a href="./pages/users.php">view all</a></button>
                    </div>
                </div>
            </div>
                

            </section>
            <div class="flex ">
                <section class="w-full p-6">
                    <div class="flex justify-between items-center ">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4"> Categorys Table</h1>
                        <a href="./pages/category.php" class="mr-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full  bg-white">
                            <thead>
                                <tr class="bg-[#98a588]">
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category) : ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $category['categoryId'] ?></td>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $category['categoryName'] ?></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="w-full  p-6">
                    <div class="flex justify-between items-center ">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4"> Tags Table</h1>
                        <a href="./pages/tag.php" class="mr-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full  bg-white">
                            <thead>
                                <tr class="bg-[#e8f8d4]">
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">ID</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left leading-tight">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tags as $tag) : ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $tag['tagId'] ?></td>
                                        <td class="py-2 px-4 border-b border-gray-300"><?= $tag['tagName'] ?></td>

                                    </tr>
                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </section>


            </div>
        </div>

    </main>

</body>
<script>
    const labels = <?= json_encode($labels) ?>;
    const data1 = <?= json_encode($data1) ?>;
    const data2 = <?= json_encode($data2) ?>;

    // Create Line Chart
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Numbers teachers',
                    data: data1,
                    borderColor: '#003049',
                    backgroundColor: '#003049',
                    borderWidth: 2,
                    fill: false,
                    tension: 0.4,
                    
                },
                {
                    label: 'Numbers students',
                    data: data2,
                    borderColor: 'red',
                    backgroundColor: "red",
                    borderWidth: 2,
                    fill: false,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

</html>
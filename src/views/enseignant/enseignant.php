<?php  
                session_start();
               
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">

        <!-- Navigation -->
        <nav class="fixed bg-transparent w-screen bg-white border-b-2 border-green-400 z-10">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="" class="text-2xl text-green-500">🎓 E-Learning</a>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="./src/views/Auth/SignIn.php" class="bg-green-200 text-white px-4 py-2 rounded-md animate__animated animate__swing">Sign In</a>
                <a href="./src/views/Auth/SignUp.php" class="bg-green-500 text-white px-4 py-2 rounded-md animate__animated animate__swing">Sign Up</a>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-green-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden">
            <a href="./src/views/Auth/SignIn.php" class="block bg-green-200 text-white px-4 py-2 rounded-md animate__animated animate__swing">Sign In</a>
            <a href="./src/views/Auth/SignUp.php" class="block bg-green-500 text-white px-4 py-2 rounded-md animate__animated animate__swing">Sign Up</a>
        </div>
    </nav>

    <section class="container mx-auto px-6 pt-32 pb-16 flex flex-col md:flex-row items-center">
        <div class="flex justify-center  w-full">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Welcome    <?php  
             
                echo $_SESSION['userName']
                ?>
        
            </h1>
          
    </section>

  
   
    <section class="container mx-auto px-6 py-16 bg-green-100 rounded-3xl mb-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Most Popular Courses</h2>
            <div class="">
            <input type="text" placeholder="Search..." class="outline-none py-2 rounded-lg px-2">
            <a href="#" class="bg-green-400 text-white px-4 py-2 rounded-md">Search</a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
         
            <div class="bg-white rounded-xl overflow-hidden shadow">
                <img src="../assets/images/pexels-divinetechygirl-1181467.jpg" alt="Course" class="w-full h-48 object-cover"/>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="bg-green-100 text-green-500 px-3 py-1 rounded-full text-sm">4.5</span>
                        <span class="text-gray-600">Web Design</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Web Design & Development Course</h3>
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>15 Classes</span>
                        <span>150 Students</span>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-green-500 font-semibold">$85.00</span>
                        <div class="flex items-center">
                            <img src="../assets/images/Screenshot_from_2024-05-07_17-54-25-removebg-preview.png" alt="Instructor" class="w-8 h-8 rounded-full"/>
                            <span class="ml-2 text-sm text-gray-600">Wade Warren</span>
                        </div>

                        <div class="flex items-center">
                        <a href="./views/SignIn.php" class="bg-blue-500 text-white px-3 py-2 rounded-md">Achter</a>

                        </div>
                    </div>
                </div>
            </div>
       
        </div>
    </section>
   

      <!-- Footer -->
      <footer class="bg-gray-900 text-white py-16">
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
</body>
</html>


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
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center border-b-2 border-green-500">
        <div class="flex items-center">
            <a href="">
            <h3 class="text-xl font-bold mb-4">YOU🎓DEMY</h3>

            </a>
        </div>
        <div class="hidden md:flex items-center space-x-8">
          
            <a href="./views/SignIn.php" class="bg-green-400 text-white px-4 py-2 rounded-md">Sign In</a>
            <a href="./views/SignUp.php" class="bg-green-500 text-white px-4 py-2 rounded-md">Sign Up</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Grow your skill to<br/>
                <span class="text-green-500">advance your</span><br/>
                career path
            </h1>
            <p class="text-gray-600 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                fuget consecteteur od nique total tempericolous momentum.
            </p>
            <button class="bg-green-500 text-white px-6 py-3 rounded-md">Join For Free</button>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0">
            <img src="./assets/images/curriculum-icon-6-removebg-preview-DoHtAKGo.png" alt="Learning illustration" class="object-cover"/>
        </div>
    </section>

  
   
    <section class="container mx-auto px-6 py-16 bg-green-100 rounded-3xl">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Most Popular Courses</h2>
            <div class="">
            <input type="text" placeholder="Search..." class="outline-none py-2 rounded-lg px-2">
            <a href="#" class="bg-green-400 text-white px-4 py-2 rounded-md">Search</a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Course Card -->
            <div class="bg-white rounded-xl overflow-hidden shadow">
                <img src="./assets/images/pexels-divinetechygirl-1181467.jpg" alt="Course" class="w-full h-48 object-cover"/>
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
                            <img src="/api/placeholder/32/32" alt="Instructor" class="w-8 h-8 rounded-full"/>
                            <span class="ml-2 text-sm text-gray-600">Wade Warren</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional course cards -->
        </div>
    </section>
    <!-- Instructors -->
    <section class="container mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Meet our instructor</h2>
            <div class="flex space-x-2">
                <button class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Instructor Card -->
            <div class="text-center">
                <div class="rounded-t-full flex justify-center">
                    <img src="./assets/images/Screenshot_from_2024-05-07_17-54-25-removebg-preview.png" alt="Instructor" class="w-full  object-cover"/>
                  
                </div>
                <h3 class="font-semibold">Leslie Alexander</h3>
                <p class="text-gray-600 text-sm">UI/UX Designer</p>
            </div>
            <!-- Additional instructor cards -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">🎓 E-Learning</h3>
                    <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                            </svg>
                        </a>
                        <!-- Additional social icons -->
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Press</a></li>
                    </ul>
                </div>
                <!-- Additional footer columns -->
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">© 2025 Learning. All rights reserved</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white">Privacy policy</a>
                    <a href="#" class="text-gray-400 hover:text-white">Terms & conditions</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 
 
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

    <!-- Hero Section -->
    <section class="container mx-auto px-6 pt-32 pb-16 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2">
            <h1 class="text-5xl bg-clip-text text-transparent bg-gradient-to-r from-green-500 to-purple-500">
                Grow your skill to <br>
                advance your <br>
                career path
            </h1>
            <p class="text-gray-600 my-8 w-3/4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                fuget consecteteur od nique total tempericolous momentum.
            </p>
            <button class="bg-green-500 text-white px-6 py-3 rounded-md">Join For Free</button>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
            <img src="./assets/images/Enhanced-Creative-Story-Telling.png" alt="Learning illustration" class="object-cover w-3/4"/>
        </div>
    </section>

    <!-- Trusted Companies -->
    <section class="py-12 text-center">
        <h2 class="text-5xl mb-8">Trusted by 100+ Leading Companies</h2>
        <div class="flex  justify-center space-x-12">
            <img src="./assets/images/google-1-1-logo-svgrepo-com-CKRs7Y62.svg" alt="Google" class="brand-logo w-40">
            <img src="./assets/images/télécharger (1).svg" alt="LinkedIn" class="brand-logo w-40">
            <img src="./assets/images/microsoft-logo-svgrepo-com-BW1l55DS.svg" alt="Microsoft" class="brand-logo w-40">
            <img src="./assets/images/slack-logo-svgrepo-com-CABMsxVD.svg" alt="Slack" class="brand-logo w-40">
            <img src="./assets/images/spotify-1-logo-svgrepo-com-BMQu_51-.svg" alt="Spotify" class="brand-logo w-40">
            <img src="./assets/images/télécharger.svg" alt="Netflix" class="brand-logo w-40">
        </div>
    </section>

    <!-- Features -->
    <section class="pb-12 px-6 md:px-20">
        <h2 class="text-5xl text-center mb-12">More than just learning</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="mb-4">
                    <img src="./assets/images/movie-svgrepo-com.svg" alt="Support" class="mx-auto w-16 h-16"/>
                </div>
                <h3 class="font-bold mb-2">Training from expert</h3>
                <p class="text-gray-600 w-3/4 mx-auto text-center">Learn from industry experts with years of experience Training from expert</p>
                <a href="""#" class="""text-green-500 mt-4 inline-block">Learn More</a>
            </div>
            <div class="text-center">
                <div class="mb-4">
                    <img src="./assets/images/record-svgrepo-com.svg" alt="Support" class="mx-auto w-16 h-16"/>
                </div>
                <h3 class="font-bold mb-2">Training from expert</h3>
                <p class="text-gray-600 w-3/4 mx-auto text-center">Learn from industry experts with years of experience Training from expert</p>
                <a href="#" class="text-green-500 mt-4 inline-block">Learn More</a>
            </div>
            <div class="text-center">
                <div class="mb-4">
                    <img src="./assets/images/social-contact-svgrepo-com.svg" alt="Support" class="mx-auto w-16 h-16"/>
                </div>
                <h3 class="font-bold mb-2">Training from expert</h3>
                <p class="text-gray-600 w-3/4 mx-auto text-center">Learn from industry experts with years of experience Training from expert</p>
                <a href="#" class="text-green-500 mt-4 inline-block">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="container mx-auto px-6 pb-16 pt-10 bg-green-100 rounded-3xl">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-4xl text-gray-800">Most Popular Courses</h2>
            <div class="flex items-center gap-2">
                <input type="text" placeholder="Search..." class="outline-none py-2 rounded-lg px-2">
                <a href="#" class="bg-green-400 text-white px-4 py-2 rounded-md">Search</a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Course Card -->
            <div class="bg-white rounded-xl overflow-hidden shadow p-4">
                <img src="./assets/images/pexels-divinetechygirl-1181467.jpg" alt="Course" class="w-full h-48 object-cover rounded-xl"/>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-600">Web Design</span>
                        <div>
                            <button class="bg-blue-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>
                            <button class="bg-red-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>
                            <button class="bg-green-400 text-white px-2 py-1 rounded-full w-4 h-4"></button>
                        </div>
                    </div>
                    <p class="text-lg mb-2">Web Design Development Course Web Design Development Course...</p>
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>15 Classes</span>
                        <span>150 Students</span>
                    </div>
                    <div class="flex items-center justify-between mt-4 border-t pt-4">
                        <span class="text-green-500 font-semibold text-3xl">$85.00</span>
                        <div class="flex items-center">
                            <img src="./assets/images/Screenshot_from_2024-05-07_17-54-25-removebg-preview.png" alt="Instructor" class="w-8 h-8 rounded-full"/>
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
            <h2 class="text-5xl text-gray-800">Meet our instructor</h2>
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
                <div class="rounded-t-full flex justify-center bg-blue-200">
                    <img src="./assets/images/Screenshot_from_2024-05-07_17-54-25-removebg-preview.png" alt="Instructor" class="w-full object-cover"/>
                </div>
                <div class="p-4 bg-blue-200 rounded-b-lg">
                <h3 class="font-semibold text-xl">Leslie Alexander</h3>
                <p class="text-gray-600 text-sm">UI/UX Designer</p>
                </div>
            </div>
            <!-- Additional instructor cards -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="bg-gray-500 md:mt-14 rounded-lg"></div>
            <div class="relative flex justify-center">
                <div class="text-center items-center bg-[#DBF1E2] shadow-sm shadow-[#DBF1E2] rounded-lg md:w-1/2 py-4 space-y-4 md:absolute -top-6">
                    <h1 class="text-4xl font-semibold">Newsletter</h1>
                    <p class="text-sm">Stay updated with our latest news and offers.</p>
                    <div class="flex space-x-2 justify-center ">
                        <input type="email" placeholder="email address..." class="px-4 py-2 rounded-md border border-gray-300" />
                        <button class="bg-green-500 text-white px-4 py-2 rounded-md">send</button>
                    </div>
                </div>
            </div>
            <div class="md:pt-60 border-b border-gray-400 py-6">
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
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

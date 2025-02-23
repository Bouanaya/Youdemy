<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Web Design by Vako Shvili</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-black bg-opacity-95 text-white">
    <!-- Navigation -->
    <nav class="flex justify-between items-center p-4">
        <div class="text-2xl font-bold">
            <span class="text-orange-500">Brand</span>
            <span class="text-pink-500">Name</span>
        </div>
        <div class="flex gap-4 items-center">
            <a href="#" class="text-gray-200">Sign in</a>
            <a href="#" class="bg-gradient-to-r from-orange-500 to-pink-500 px-6 py-2 rounded-full">LOGIN</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Column -->
            <div class="space-y-8">
                <h1 class="text-4xl md:text-5xl font-bold text-center md:text-left">
                    Learn <span class="text-orange-500">Web</span> <span class="text-pink-500">Design</span> by Vako Shvili
                </h1>
                
                <p class="text-gray-300 text-center md:text-left">
                    Learn the basics of why things are funny, to joke writing, and performing live
                    and how to navigate the comedy circuit & build your career.
                </p>

                <!-- Features -->
                <div class="space-y-4">
                    <div class="bg-gray-800/50 p-4 rounded-lg flex items-center gap-3">
                        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            <path d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
                        </svg>
                        Get 16 lessons in 3 hours
                    </div>
                    <div class="bg-gray-800/50 p-4 rounded-lg flex items-center gap-3">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Daily guided exercises
                    </div>
                    <div class="bg-gray-800/50 p-4 rounded-lg flex items-center gap-3">
                        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        </svg>
                        Access to 50k+ community
                    </div>
                    <div class="bg-gray-800/50 p-4 rounded-lg flex items-center gap-3">
                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
                        </svg>
                        Regular expert feedback
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="bg-gray-800/50 p-4 rounded-lg">
                    <div class="flex items-center gap-4">
                        <img src="/api/placeholder/48/48" alt="Vako Shvili" class="w-12 h-12 rounded-full"/>
                        <div>
                            <p class="text-orange-500">by</p>
                            <h3 class="font-bold">Vako Shvili</h3>
                            <p class="text-sm text-gray-400">Web Designer</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center gap-2">
                            <div class="flex -space-x-2">
                                <img src="/api/placeholder/24/24" alt="User" class="w-6 h-6 rounded-full border-2 border-gray-800"/>
                                <img src="/api/placeholder/24/24" alt="User" class="w-6 h-6 rounded-full border-2 border-gray-800"/>
                                <img src="/api/placeholder/24/24" alt="User" class="w-6 h-6 rounded-full border-2 border-gray-800"/>
                            </div>
                            <span class="text-pink-500">3200098</span>
                            <span class="text-gray-400">people have joined already</span>
                        </div>
                    </div>
                    <button class="mt-4 w-full bg-gray-700 text-white py-2 rounded-lg flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        Watch Trailer
                    </button>
                </div>
            </div>

            <!-- Right Column -->
            <div class="relative">
                <div class="bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-xl p-4">
                    <img src="/api/placeholder/600/400" alt="Course Preview" class="rounded-lg w-full"/>
                    <div class="mt-4 text-center">
                        <h3 class="text-xl font-bold">Meet your web designer guru, Vako Shvili!</h3>
                        <p class="text-gray-300 mt-2">Complete Web Design: from Figma to Webflow to Freelancing</p>
                    </div>
                </div>
                <a href="#" class="block mt-8 bg-gradient-to-r from-orange-500 to-pink-500 text-center py-4 rounded-full text-white font-bold">
                    Buy Now for ₹499 <span class="line-through">₹1199</span>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
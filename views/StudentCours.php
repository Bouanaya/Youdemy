<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
  
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center border-b-2 border-green-500">
        <div class="flex items-center">
            <a href="">
            <h3 class="text-xl font-bold mb-4">YOU🎓DEMY</h3>
            </a>
        </div>
        <div class="flex">
            <ul class="flex gap-6 font-bold">

                <li><a href="./Student.php">Home</a></li>
                <li><a href="./StudentCours.php" class="text-green-500" >Cours</a></li>
            </ul>
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="./views/SignIn.php" class="bg-red-500 text-white px-4 py-2 rounded-md">login out</a>
          
        </div>
    </nav>

   
   
       

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

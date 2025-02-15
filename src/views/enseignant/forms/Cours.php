<?php
require_once '../../../../vendor/autoload.php';
use src\Classes\Tag;
use src\Classes\Category;

$tag = new Tag(); 
$tags = $tag->gettags();

$Category = new Category(); 
$Categorys = $Category->getCategory();


 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Gestion des Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-slide-down {
            animation: slideDown 0.5s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .input-scale {
            transform-origin: left;
            transition: transform 0.2s ease;
        }

        .input-scale:focus {
            transform: scale(1.01);
        }

        .btn-pop {
            transition: transform 0.2s ease;
        }

        .btn-pop:hover {
            transform: translateY(-2px);
        }

        .checkbox-pop {
            transition: transform 0.2s ease;
        }

        .checkbox-pop:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-indigo-500 min-h-screen py-12 px-4 sm:px-6">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8 animate-slide-down">
        <h1 class="text-2xl font-bold mb-8 text-center text-gray-800 animate-fade-in">Gérer un Cours</h1>
        
        <form action="../../../Controllers/Cours.php" method="POST" class="space-y-6">
            <!-- Titre -->
            <div class="space-y-2 animate-fade-in" style="animation-delay: 0.1s">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre du cours</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg  focus:ring-indigo-500 focus:border-transparent transition-all duration-300 input-scale hover:shadow-md"
                    placeholder="Entrez le titre du cours"
                    required
                />
            </div>

    
            <div class="space-y-2 animate-fade-in" style="animation-delay: 0.2s">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg  focus:ring-indigo-500 focus:border-transparent transition-all duration-300 input-scale hover:shadow-md resize-none"
                    placeholder="Entrez une description du cours"
                ></textarea>
            </div>

         
<div class="space-y-2 animate-fade-in" style="animation-delay: 0.3s">
    <label class="block text-sm font-medium text-gray-700">Type de contenu</label>
    
    <div class="flex items-center space-x-4 mb-3">
        <label class="inline-flex items-center cursor-pointer">
            <input type="radio" name="content_type" value="url" class="peer sr-only" checked>
            <span class="w-4 h-4 border-2 border-indigo-400 rounded-full flex items-center justify-center
                       peer-checked:border-indigo-500 peer-checked:bg-indigo-500 transition-all duration-300">
                <span class="w-2 h-2 rounded-full bg-white scale-0 peer-checked:scale-100 transition-transform duration-300"></span>
            </span>
            <span class="ml-2 text-sm text-gray-700">URL</span>
        </label>

        <label class="inline-flex items-center cursor-pointer">
            <input type="radio" name="content_type" value="file" class="peer sr-only">
            <span class="w-4 h-4 border-2 border-indigo-400 rounded-full flex items-center justify-center
                       peer-checked:border-indigo-500 peer-checked:bg-indigo-500 transition-all duration-300">
                <span class="w-2 h-2 rounded-full bg-white scale-0 peer-checked:scale-100 transition-transform duration-300"></span>
            </span>
            <span class="ml-2 text-sm text-gray-700">Fichier</span>
        </label>
    </div>

 
    <div class="url-input">
        <input
            type="url"
            id="content_url"
            name="content_url"
            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-indigo-500 focus:border-transparent transition-all duration-300 input-scale hover:shadow-md"
            placeholder="Entrez un lien vers le contenu"
        />
    </div>

 
    <div class="file-input hidden">
        <input
            type="file"
            id="content_file"
            name="content_file"
            class="w-full file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-medium
                   file:bg-indigo-50 file:text-indigo-700 file:rounded-lg
                   hover:file:bg-indigo-100 
                   text-sm text-gray-700
                   border border-gray-200 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                   transition-all duration-300"
        />
    </div>
</div>

    
            <div class="space-y-2 animate-fade-in" style="animation-delay: 0.4s">
                <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select
                    id="category"
                    name="category"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg  focus:ring-indigo-500 focus:border-transparent transition-all duration-300 input-scale hover:shadow-md bg-white"
                    required
                >
                <option value="">Sélectionnez une catégorie</option>
                <?php    foreach($Categorys as $Category) :  ?>
                    
                    <option value="<?= $Category['categoryId']?>"><?= $Category["categoryName"]?></option>

                <?php  endforeach  ?>
                   
                </select>
            </div>

 
            <div class="space-y-2 animate-fade-in" style="animation-delay: 0.5s">
                <label class="block text-sm font-medium text-gray-700">Tags</label>
                <div class="flex flex-wrap gap-3">
                    <?php foreach($tags as $tag) :?>
                        
                    <label class="relative inline-flex items-center group cursor-pointer checkbox-pop">
                        <input type="checkbox" name="tags[]" value="<?=$tag["tagId"]?>" class="peer sr-only"/>
                        <span class="w-5 h-5 border-2 border-indigo-400 rounded flex items-center justify-center
                                   peer-checked:bg-indigo-500 peer-checked:border-indigo-500
                                   group-hover:border-indigo-600 transition-all duration-300">
                            <svg class="w-3 h-3 text-white scale-0 peer-checked:scale-100 transition-transform duration-300" 
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M20 6L9 17L4 12" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm text-gray-700 group-hover:text-indigo-600 transition-colors duration-300"><?=$tag["tagName"]   ?></span>
                    </label>

                    <?php endforeach ?>
               

            

                 
                </div>
            </div>
            <div class="space-y-2 animate-fade-in" style="animation-delay: 0.35s">
    <label for="price" class="block text-sm font-medium text-gray-700">Prix du cours (DH)</label>
    <input
        type="number"
        id="price"
        name="price"
        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-indigo-500 focus:border-transparent transition-all duration-300 input-scale hover:shadow-md"
        placeholder="Entrez le prix du cours"
        step="0.01"
        min="0"
        required
    />
</div>

    
            <div class="flex justify-end space-x-4 pt-6 animate-fade-in" style="animation-delay: 0.6s">
                <button type="reset" 
                    class="px-6 py-2.5 rounded-lg text-gray-700 bg-gray-100 hover:bg-gray-200 transition-all duration-300 btn-pop hover:shadow-md">
                  <a href="../enseignant.php"> Réinitialiser</a> 
                </button>
                <button type="submit"
                name="submit"
                    class="px-6 py-2.5 rounded-lg text-white bg-indigo-500 hover:bg-indigo-600 transition-all duration-300 btn-pop hover:shadow-md">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</body>

<script>
    document.querySelectorAll('input[name="content_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const urlInput = document.querySelector('.url-input');
            const fileInput = document.querySelector('.file-input');
            
            if (this.value === 'url') {
                urlInput.classList.remove('hidden');
                fileInput.classList.add('hidden');
                document.getElementById('content_file').value = '';
            } else {
                urlInput.classList.add('hidden');
                fileInput.classList.remove('hidden');
                document.getElementById('content_url').value = '';
            }
        });
    });
</script>
</html>
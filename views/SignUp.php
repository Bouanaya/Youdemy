<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-to-r from-indigo-500 via-green-500 to-green-600 min-h-screen flex items-center justify-center p-4">
    <div class="bg-green-100 rounded-lg shadow-lg w-full max-w-md p-6 space-y-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900">Créer un compte</h2>
            <p class="mt-2 text-sm text-gray-600">Remplissez le formulaire ci-dessous</p>
        </div>

        <form class="space-y-4" method="post" action="../Actions/signUp.php">
            <!-- Nom -->
            <div>
                <label for="FullName" class="block text-sm font-medium text-gray-700">
                    FullName
                </label>
                <input
                    type="text"
                    id="FullName"
                    name="FullName"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Entrez votre nom"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Adresse email
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="bouanaya@exemple.com"
                    required>
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Mot de passe
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="••••••••"
                    required
                    minlength="8">
                <p class="mt-1 text-xs text-gray-500">
                    Le mot de passe doit contenir au moins 8 caractères
                </p>
            </div>
            <div class="flex gap-4 items-center">
                    <label for="role">I want to</label>
                    <select class="border-gray-300  outline-none border rounded-lg py-2 px-3 bg-transparent" id="role" name="role" required >
                        <option value="student">Student</option>

                        <option value="teacher">Teacher</option>
                    </select>
                </div>

        

            <!-- Bouton de soumission -->
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                S'inscrire
            </button>
        </form>

        <!-- Lien de connexion -->
        <div class="text-center text-sm">
            <p class="text-gray-600">
                Déjà un compte?
                <a href="signIn.php" class="font-medium text-blue-600 hover:text-blue-500">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</body>

</html>
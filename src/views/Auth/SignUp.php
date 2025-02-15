<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-white min-h-screen flex items-center justify-center p-4">
<div class="bg-green-300 w-1/2 h-full absolute right-0"></div>
    <div class="bg-green-200 rounded-lg shadow-lg w-full max-w-md p-8 space-y-6 rellative z-10">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900">Créer un compte</h2>
            <p class="mt-2 text-sm text-gray-600">Remplissez le formulaire ci-dessous</p>
        </div>

        <form class="space-y-4" id="form" method="post" action="../../Controllers/sign.php">
            <!-- Nom -->
            <div>
                <label for="userName" class="block text-sm font-medium text-gray-700">
                    userName
                </label>
                <input
                    type="text"
                    id="userName"
                    name="userName"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-300"
                    placeholder="Entrez votre nom"
                    required>
                    <span id="usernameError" class="text-red-500 text-sm hidden"></span>
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
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-300"
                    placeholder="bouanaya@exemple.com"
                  >
                    <span id="emailError" class="text-red-500 text-sm hidden">
                        
                    </span>
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
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-300"
                    placeholder="••••••••"
                    required
                    minlength="8">
                <p class="mt-1 text-xs text-gray-500 " id="passwordError">
                    Le mot de passe doit contenir au moins 8 caractères
                </p>
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">
                    Je veux être
                </label>
                <select
                    id="role"
                    name="role"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-slate-400 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-300"
                    required>
                    <option value="student">Étudiant</option>
                    <option value="teacher">Enseignant</option>
                </select>
            </div>

        

            <!-- Bouton de soumission -->
            <button
                type="submit"
                name="register"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                S'inscrire
            </button>
        </form>

        
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 
document.getElementById('form').addEventListener('submit', function (event) {
    event.preventDefault();  

    const username = document.getElementById('userName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    


    if (!validateUsername(username)) {
        document.getElementById('usernameError').classList.remove('hidden');
        document.getElementById('usernameError').innerText = 'Username must be at least 3 characters ';
        document.getElementById('userName').style.borderColor = 'red';
        return;
    }
    else{
        document.getElementById('usernameError').classList.add('hidden');
        document.getElementById('userName').style.borderColor = 'green';
    }

 
    if (!validateEmail(email)) {
        document.getElementById('emailError').classList.remove('hidden');
        document.getElementById('emailError').innerText = 'Invalid email address format';
        document.getElementById('email').style.borderColor = 'red';
        return;
    }
    else{
        document.getElementById('emailError').classList.add('hidden');
        document.getElementById('email').style.borderColor = 'green';
    }

  
    if (!validatePassword(password)) {
        document.getElementById('passwordError').style.color = 'red';
        document.getElementById('password').style.borderColor = 'red';  
        return;
    }
    else{
        document.getElementById('passwordError').style.color = 'green';
        document.getElementById('password').style.borderColor = 'green';
    }

 
    Swal.fire({
        icon: 'success',
        title: 'Form Submitted!',
        text: 'Your form has been submitted successfully.',
    }).then(() => {
      
        document.getElementById('form').submit();
    
    });
});

 
function validateUsername(username) {
 
    const usernamePattern = /^[a-zA-Z\s]+$/;
    return usernamePattern.test(username);
}

 
function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return emailPattern.test(email);
}

 
function validatePassword(password) {

    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    return passwordPattern.test(password);
}

</script>

</html>
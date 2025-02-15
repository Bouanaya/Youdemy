<?php
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
    <title>Tag Form</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:#141E16;

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        img{
            width: 40px;
            height: 40px;
        }
        .form-container {
            background-color: #B1F0F7; /* Added background color */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 450px;
        }
        .form-container h2 {
            margin-bottom: 25px;
            color: #00796b; /* Changed back to original color */
            text-align: center;
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
    </style>
</head>
<body>
    <div class="form-container">
        <img src="../../../../assets/images/tag.png" alt="">
        <form action="../../../Controllers/category.php" method="post">
            <label for="category">Cateory Name</label>
            <input type="text" id="category" name="category" placeholder="Enter category" required >
            <label for="description"> description Category</label>
            <textarea
    id="description"
    name="description"
    rows="5"
    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none"
    placeholder="Écrivez votre description ici..."
  ></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
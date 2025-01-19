<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tag Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #B1F0F7; /* Added background color */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
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
        <h2>Tag </h2>
        <form action="../../../Controllers/Tag.php" method="post">
            <label for="tag">Tag Name</label>
            <input type="text" id="tag" name="tags" placeholder="Enter tag" required >
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
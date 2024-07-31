<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Photo Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Custom CSS for 3D button effect */
        .btn-3d {
            background-color: #fbbf24;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 4px #c99700;
            transition: all 0.2s ease-in-out;
        }

        .btn-3d:hover {
            box-shadow: 0 2px #c99700;
            transform: translateY(2px);
        }

        /* Custom CSS for the logo font */
        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            color: white;
        }
    </style>
</head>



<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <span class="logo-text mr-6">Stock Photo Hub</span>
        </div>
        <ul class="flex space-x-4">
            <li><a href="../index.php" class="btn-3d">Home</a></li>
            <li><a href="shop.php" class="btn-3d">Shop</a></li>
            <li><a href="upload.php" class="btn-3d">Upload</a></li> <!-- Direct link to upload.html -->
            <li><a href="signin.php" class="btn-3d">Sign In</a></li>
            <li><a href="login.php" class="btn-3d">Log In</a></li>
        </ul>
    </div>
</nav>


<?php
require '../dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stock Photo Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">


    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <?php
        include '../dashboard/message.php';

        ?>
        <h2 class="text-2xl font-bold mb-6 text-center">Sign In</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 mb-2">Username:</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email:</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-2">Password:</label>
                <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>
            <button type="submit" name="save_user" class="w-full bg-yellow-500 text-white py-3 px-6 rounded-full text-lg hover:bg-yellow-600">Create</button>
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="login.php" class="text-yellow-500">Log In</a></p>
        <p class="mt-4 text-center"><a href="index.php" class="text-gray-500">Back to Home</a></p>
    </div>

</body>

</html>

<?php

if (isset($_POST['save_user'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        $_SESSION['message'] = "Only letters and white space allowed";
        header('location:dashboard/add_admin.php');
        exit(0);
    }

    if (strlen($password) < 5) {
        $_SESSION['message'] = "Password must be at least 5 characters";
        header('location:dashboard/add_admin.php');
        exit(0);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format";
        header('location:dashboard/add_admin.php');
        exit(0);
    }

    $sql = "SELECT * from users where email='$email' and password='$password'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $_SESSION['message'] = "User already Exits";
        header('location:signin.php');
        exit(0);
    } else {
        mysqli_query($conn, "INSERT into users (name,email,password) value ('$name','$email','$password')") or die('query failed');
        $_SESSION['message'] = "Register Sucessfull";
        header('location:userlogin.php');
        exit(0);
    }
}


?>
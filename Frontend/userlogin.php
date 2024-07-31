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
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email:</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-2">Password:</label>
                <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg" required>
            </div>
            <button type="submit" name="users_login" class="w-full bg-yellow-500 text-white py-3 px-6 rounded-full text-lg hover:bg-yellow-600">Login</button>
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="signin.php" class="text-yellow-500">Sign up</a></p>
        <p class="mt-4 text-center"><a href="index.php" class="text-gray-500">Back to Home</a></p>

    </div>

</body>

</html>

<?php

if (isset($_POST['users_login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $sql = "SELECT * from users where email='$email' and password='$password'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $data_fetch = mysqli_fetch_assoc($res);
        $_SESSION['login'] = true;
        $_SESSION['email'] = $data_fetch['email'];
        $_SESSION['user_id'] = $data_fetch['id'];
        $_SESSION['name'] = $data_fetch['name'];
        header('location:index.php');
        $_SESSION['message'] = "login Successfull";

        exit(0);
    } else {
        $_SESSION['message'] = "login Unsuccessfull";
        header('location:login.php');
        exit(0);
    }
}


?>
<?php
require_once('../Admin/config/connect.php');
if (isset($_POST['Login'])) {
    $response = login($_POST);
    extract($response);
    if (!empty($response)) {
        header("Location: dashboard.php?user=$firstname");
    } elseif (is_array($response)) {
        foreach ($response as $err) {
            echo "<script>alert('$err')</script>";
        }
    } else {
        echo "<script>alert('Oops! Try Again')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="./asset/images/Web_icon_-_Copy2-removebg-preview.png" />
    <link rel="stylesheet" href="./css/aos.css">
    <link rel="stylesheet" href="./css/Toastify.css">
    <title>Login</title>
    <style>
        body {
            background-image: url('./asset/images/low-poly-grid-haikei.svg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="mb-80 md:mb-2 w-full flex justify-center ">
        <form method="post" class="flex flex-col bg-gray-200 p-3 my-24 rounded-xl h-96 justify-center"
            data-aos="fade-up" data-aos-duration="2000">
            <h1 class="flex justify-center text-5xl p-4 font-mono">LOGIN</h1>
            <input type="email" name="email" placeholder="Email" required
                class="w-80 h-8 rounded bg-gray-300 my-2 p-2 text-black">
            <input type="password" placeholder="Password" name="password" required
                class="w-80 h-8 rounded bg-gray-300 my-2 p-2 text-black ">
            <button type="submit" value="Login" name="Login"
                class="w-90 bg-[#25769b] rounded my-4  h-8 hover:bg-teal-500 hover:text-white duration-700">Login</button>
            <a href="signup.php" class="w-36 text-teal-700 ">Sign Up</a>
            <a href="admin-login.php" class="w-36 text-teal-700 ">Admin Login</a>
        </form>
    </div>
    <script src="./Js/tailwind.js"></script>
    <script src="./Js/aos.js"></script>
    <script src="./Js/feather.js"></script>
    <script src="./Js/Toastify.js"></script>
</body>

</html>
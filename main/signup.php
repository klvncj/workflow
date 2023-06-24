<?php
require_once('../Admin/config/connect.php');

if (isset($_POST['sign-up'])) {
  $response = signup($_POST);
  if ($response === true) {
    echo "<script>alert('Sign Up successful')</script>";
    header("Location: login.php");
  } elseif (is_array($response)) {
    foreach ($response as $error) {
      echo "<script>alert('$error')</script>";
    }
  } else {
    echo "<script>alert('error while signing up')</script>";
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
  <title>Sign Up</title>
  <style>
    body {
      background-image: url('./asset/images/low-poly-grid-haikei.svg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>
  <div class="mb-80 md:mb-2 w-full flex justify-center">
    <form method="post" enctype="multipart/form-data"
      class="flex flex-col justify-center my-24 bg-gray-200 rounded-xl drop-shadow-lg p-1 w-82 py-4" data-aos="fade-up"
      data-aos-duration="2000">
      <h1 class="flex justify-center my-5 text-4xl font-bold">SIGN UP</h1>
      <div class="flex">
        <input type="text" name="firstname" id="firstname" placeholder="Firstname" required
          class="w-40 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-2 ">
        <input type="text" name="lastname" id="lastname" placeholder="Lastname" required
          class="w-40 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-2 ">
      </div>
      <input type="email" name="email" id="email" placeholder="Enter email" required
        class="w-80 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-3 ">
      <select title="gender" name="gender" class="w-80 bg-gray-300 rounded my-2 h-8 text-black mx-3 ">
        <option selected disabled>Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <select name="department" class="w-80 bg-gray-300 rounded my-2 h-8 text-black mx-3 ">
        <option selected disabled>Department</option>
        <?php
        $departments = get_department();
        if ($departments) {
          foreach ($departments as $dept) {
            extract($dept); ?>
            <option>
              <?= $department ?>
            </option>
          <?php }
        } ?>
      </select>
      <input type="text" name="position" placeholder="Enter Position" required
        class="w-80 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-3 ">
      <input type="tel" placeholder="Phone Number" name="phone"
        class="w-80 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-3 " required>
      <input type="password" placeholder="Password" name="password"
        class="w-80 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-3 " required>
      <input type="text" placeholder="Enter company code" id="code" name="code" required
        class="w-80 bg-gray-300 rounded my-2 h-8 text-black p-2 mx-3 ">
      <input type="file" name="image" accept=".jpeg , .png , .jpg"
        class="w-80 bg-gray-300 rounded my-2 h-8 text-black  mx-3 ">
      <input type="submit" name="sign-up" value="Sign up"
        class="w-80 bg-[#25769b] mx-3 mt-2 rounded h-8 hover:bg-teal-500 hover:text-white duration-700">
      <h1 class="flex justify-center mt-5">already have an account <a href="login.php"
          class="mx-2 text-blue-900 ">Login</a></h1>
    </form>
  </div>


  <script src="./Js/tailwind.js"></script>
  <script src="./Js/aos.js"></script>
  <script src="./Js/feather.js"></script>
  <script src="./Js/Toastify.js"></script>
  <script src="./Js/script.js"></script>
</body>

</html>
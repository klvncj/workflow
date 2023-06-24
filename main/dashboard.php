<?php
require_once('../Admin/config/connect.php');
allow_access($_SESSION['user'], "login.php");
if (isset($_GET['user'])) {
    $user = $_GET['user'];

    $response = get_user($user);
    if ($response) {
        extract($response);
    }
} else {
    echo "<script>alert('User not found')</script>";
    header("Location: login.php");
}

$page_message = "Welcome back, " . $firstname;
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
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/animations.css">
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/boxicons.css">
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/transformations.css">
    <title>Employee |
        <?= $firstname ?>
        <?= $lastname ?>
    </title>
</head>
<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        text-align: center;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;

    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<body bgcolor="#f1f4f5">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dashboard.php?user=<?= $firstname ?>">Dashboard</a>
        <a href="task.php?user=<?= $firstname ?>">Task</a>
        <a href="activities.php?user=<?= $firstname ?>">Activities</a>
        <a href="chat.php?user=<?= $firstname ?>">Chat</a>
        <a href="leave.php?user=<?= $firstname ?>">Leave</a>
    </div>


    <?php require_once 'base-dash.php'; ?>

    <div class=" w-[100%] md:ml-32 md:pl-44 drop-shadow-md p-4 md:w-[90%] " id="sidepage">

        <?php require_once 'base-nav.php'; ?>

        <div id="holder" class="grid grid-cols-1 w-[100%] md:grid-cols-2 lg:grid-cols-3 gap-4 mt-12 ">
            <div class=" bg-[#fffafa] drop-shadow-md flex flex-col rounded-lg p-4" data-aos="fade-up"
                data-aos-duration="3000">
                <h3 class="font-black">RECENT TASK</h3>

                <?php
                if (isset($_GET['user'])) {
                    $user = $_GET['user'];}
                                $histories = show_recent_task($user);
                                if (!empty($histories)) {
                                    foreach ($histories as $history) {
                                        extract($history); ?>
                <span class="flex justify-between rounded p-1 my-1 hover:translate-y-1 duration-500">
                    <p><?=$task?></p> <span
                        class="text-xs flex items-center bg-<?php if($assigned_by == 'admin'){echo 'purple';}else{echo 'green';}?>-400 p-1 rounded-md"><?php if($assigned_by == 'admin'){echo 'Admin';}else{echo 'Personal';}?></span>
                </span>
                <hr>
                <?php }}?>
            </div>

            <div class=" bg-[#fffafa] drop-shadow-md flex flex-col rounded-lg p-4" data-aos="fade-up"
                data-aos-duration="3000">
                <h3 class="font-black">General Activities Schedule</h3>
                <div class="flex flex-col">
                    <?php
                    $recent = diaplay_activites();
                    if ($recent) {
                        foreach ($recent as $an_activity) {
                            extract($an_activity); ?>
                            <span class="flex justify-between mt-2 bg-teal-300 text-teal-800 p-1 rounded-md">
                                <p>
                                    <?= $activity ?>
                                </p>
                                <p>
                                    <?= date('jS F,g:i a ', strtotime($date_time)); ?>
                                </p>
                            </span>
                        <?php }
                    } ?>
                </div>
            </div>

            <div class=" bg-[#fffafa] drop-shadow-md place-content-center flex flex-col rounded-lg p-4" data-aos="fade-up"
                data-aos-duration="3000">
                <h3 class="font-black">LEAVE REQUEST</h3>
                <button onclick="redirecting('leave.php?user=<?= $firstname ?>')"
                    class="inline-flex text-white bg-black mt-24 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 duration-700 rounded text-lg">
                    Request Leave
                </button>
            </div>
        </div>
    </div>








    <script src="./Js/tailwind.js"></script>
    <script src="./Js/aos.js"></script>
    <script src="./Js/feather.js"></script>
    <script src="./Js/Toastify.js"></script>
    <script src="./Js/script.js"></script>
</body>

</html>
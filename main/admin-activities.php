<?php
require_once('../Admin/config/connect.php');
allow_access($_SESSION['admin'], "login.php");
if (isset($_GET['u'])) {
    $user = $_GET['u'];

    $response = get_admin($user);
    if ($response) {
        extract($response);
    }
} else {
    echo "<script>alert('User not found')</script>";
    header("Location: admin-login.php");
}

if (isset($_POST['create-activity'])) {
    $response = create_activity($_POST);
    if ($response === true) {
        echo "<script>alert('Created')</script>";
    } elseif (is_array($response)) {
        foreach ($response as $error) {
            echo "<script>alert('$error')</script>";
        }
    } else {
        echo "<script>alert('error while creating activity')</script>";
    }

}
if (isset($_POST['create-department'])) {
    $response = create_department($_POST);
    if ($response === true) {
        echo "<script>alert('Created')</script>";
    } elseif (is_array($response)) {
        foreach ($response as $error) {
            echo "<script>alert('$error')</script>";
        }
    } else {
        echo "<script>alert('error while creating activity')</script>";
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
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/animations.css">
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/boxicons.css">
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="./asset/boxicons-2.1.4/css/transformations.css">
    <title>Admin Dashboard</title>
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

<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="admin-dash.php?u=<?= $admin_id ?>">Dashboard</a>
        <a href="staff.php?u=<?= $admin_id ?>">Staff</a>
        <a href="admin-task.php?u=<?= $admin_id ?>">Task</a>
        <a href="admin-activities.php?u=<?= $admin_id ?>">Activities</a>
        <a href="admin-chat.php?u=<?= $admin_id ?>">Chat</a>
        <a href="admin-leave.php?u=<?= $admin_id ?>">Leave</a>
    </div>

    <div class="flex w-full bg-[#f9f9f9]">
        <div class="hidden md:block" id="sidebar">
            <div class="hidden md:flex bg-gray-300 fixed left  flex-col h-screen w-56 justify-between">
                <div>
                    <div class="flex flex-col">
                        <div class="flex justify-center mt-5">
                            <img src="../Admin/profile/<?= $profile_pic ?>" alt="Add Profile Picture"
                                onclick="Toast('Profile page')"
                                class="w-24 flex justify-center rounded-[50%] outline outline-4 outline-offset-4 outline-[#25769b] aspect-square">
                        </div>
                        <div class="flex flex-col">
                            <h1 class="flex justify-center text-xl mt-2 font-semibold"><?=$firstname?> <?=$lastname?></h1>
                            <h5 class="flex justify-center mb-2">Admin</h5>
                          </div>
                    </div>
                    <div class="flex flex-col my-5">
                        <span onclick="redirecting('admin-dash.php?u=<?= $admin_id ?>')"
                            class="flex items-center text-align-left p-2 mx-4 " data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-dashboard bx-xs'></i>
                            <p class="ml-2  flex items-center">Dashboard</p>
                        </span>
                        <span onclick="redirecting('staff.php?u=<?= $admin_id ?>')" class="flex items-center text-align-left p-2 mx-4 "
                            data-aos="fade-up" data-aos-duration="2000"><i class='bx bxs-user-detail bx-xs'></i>
                            <p class="ml-2  flex items-center">Staff</p>
                        </span>
                        <span onclick="redirecting('admin-task.php?u=<?= $admin_id ?>')"
                            class="flex items-center text-align-left p-2 mx-4  font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bx-spreadsheet bx-xs'></i>
                            <p class="ml-2 mr-6  flex items-center">Task</p>
                        </span>
                        <span onclick="redirecting('admin-activities.php?u=<?= $admin_id ?>')"
                            class="bg-[#25769b] rounded  flex items-center text-white text-align-left p-2 mx-4 font-light"
                            data-aos="fade-up" data-aos-duration="2000"><i class='bx bx-calendar bx-xs'></i>
                            <p class="ml-2 mr-4  flex items-center">Activities</p>
                        </span>
                        <span onclick="redirecting('admin-chat.php?u=<?= $admin_id ?>')"
                            class=" flex items-center text-align-left p-2 mx-4   font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-paper-plane bx-xs'></i>
                            <p class="ml-2 mr-11 flex items-center">Chat</p>
                        </span>
                        <span onclick="redirecting('admin-leave.php?u=<?= $admin_id ?>')"
                            class=" flex items-center text-align-left p-2 mx-4  font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-share bx-xs'></i>
                            <p class="ml-2  flex items-center">Leave Requests</p>
                        </span>
                    </div>

                </div>

            </div>

            <div class="fixed" onclick="sideMenu()">
                <img src="./asset/feather/align-left.svg" alt="sidebar"
                    class="mt-40 ml-3 bg-gray-200 p-3 rounded drop-shadow-lg hidden" id="bringmenu">

            </div>
        </div>
    </div>
    <div class=" w-full md:ml-32 md:pl-44 drop-shadow-md p-4 md:w-[90%] ">
        <nav class="flex justify-between p-2 bg-[#f1f4f5] mb-5 ">
            <div class="flex justify-center items-center mt-2" id="close">
                <h2 class="mx-5 items-center mb-2 font-semibold" onclick="Show()">
                    Welcome back, <?=$firstname?>
                </h2>
            </div>
            <div class="flex items-center">
                <span class="hidden md:flex mx-5 items-center"><?= date("l, jS F") ?></span>
                <div>
                    <div class="flex justify-center items-center mt-2 outline outline-2 outline-[#25769b] p-1 m-1 rounded-lg"
                        id="user" onclick="toggleMenu()">
                        <span><i class='bx bxs-user bx-sm'></i></span>
                    </div>
                    <div class=" absolute w-32 right-0 my-5 bg-[#f1f4f5] p-2 rounded drop-shadow-md z-50" id="menus"
                        style="display: none;">
                        <ul>
                            <li class="flex justify-end" onclick="CloseMenu()"><i class='bx bx-x bx-xs'></i></li>
                            <li><span
                                    class="flex justify-start items-center gap-2 p-1 font-semibold text-gray-400 hover:text-blue-500 cursor-pointer duration-700"
                                    onclick="toggleFullScreen()"><i class='bx bx-expand bx-xs'></i>Focus</span>
                                <hr>
                            </li>
                            <li><span onclick="openNav()"
                                    class="flex justify-start items-center gap-2 p-1 font-semibold text-gray-400 hover:text-blue-500 cursor-pointer duration-700 md:hidden"
                                    onclick="toggleFullScreen()"><i class='bx bx-menu bx-xs'></i>Menu </span>
                                <hr>
                            </li>
                            <li><span onclick="move('admin-profile.php?u=<?=$admin_id?>')"
                                    class="flex justify-start items-center gap-2 p-1 font-semibold text-gray-400 hover:text-black cursor-pointer duration-700"><i
                                        class='bx bxs-cog bx-xs'></i>Settings</span>
                                <hr>
                            </li>
                            <li><span onclick="LogOut('../Admin/config/logout.php')"
                                    class="flex justify-start items-center gap-2 p-1 font-semibold text-gray-400 hover:text-red-500 cursor-pointer duration-700"><i
                                        class='bx bx-log-out bx-xs'></i>logout</span></li>
                        </ul>
                    </div>
                    </span>
                </div>

            </div>
        </nav>
        <div id="holder" class="flex flex-col gap-3 md:flex-row ">
            <div class=" bg-[#fffafa] drop-shadow-md flex flex-col my-1 rounded-lg p-4 md:w-96">
                <h3 class="font-black">Create Activity</h3>
                <form method="post" class="flex flex-col">
                    <input type="text" placeholder="Create Activity" name="activity"
                        class="bg-gray-300 p-1 mt-2 rounded">
                    <input type="datetime-local" name="date" class="bg-gray-300 p-1 mt-2 rounded">
                    <input type="submit" name="create-activity" class="bg-green-700 p-1 mt-2 rounded">
                </form>
            </div>
            <div id="recent" class=" bg-[#fffafa] drop-shadow-md flex flex-col my-1 rounded-lg p-4 md:w-96">
                <span class="font-black">Recent activities</span>
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
            <span class=" bg-[#fffafa] drop-shadow-md flex flex-col my-1 rounded-lg p-4 md:w-96 place-content-center">
                <h3 class="flex justify-center font-black text-xl">Create Department</h3>
                <form method="post" class="flex flex-col">
                    <input type="text" placeholder="Create Department" name="department"
                        class="bg-gray-300 p-1 mt-2 rounded">
                    <input type="submit" name="create-department" class="bg-green-700 p-1 mt-2 rounded">
                </form>
            </span>
        </div>
        <div>
            <h3 class="font-black my-5 text-center">All Activities</h3>
            <?php
                    $recent = diaplay_activites();
                    if ($recent) {
                        foreach ($recent as $an_activity) {
                            extract($an_activity); ?>
            <span class="flex flex-col rounded my-2 bg-[#f1f4f5] p-5">
                <div class="flex justify-between ">
                    <p id="Last_message" class="font-semibold">  <?= $activity ?></p><span
                        class="flex gap-4 items-center">
                        <p><?= date('jS F,g:i a ', strtotime($date_time)); ?></p><i onclick="move('../Admin/config/delete-act.php?id=<?=$activity_id?>&user=<?=$firstname?>')" class='bx bxs-x-square bx-xs'></i>
                    </span>
                </div>
            </span>
            <?php }}?>
        </div>

    </div>
    <script src="./Js/tailwind.js"></script>
    <script src="./Js/aos.js"></script>
    <script src="./Js/feather.js"></script>
    <script src="./Js/Toastify.js"></script>
    <script src="./Js/script.js"></script>

</body>

</html>
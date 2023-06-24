<?php
require_once('../Admin/config/connect.php');
allow_access($_SESSION['user'], "login.php");
if (isset($_GET['user'])) {
    $user = $_GET['user'];

    $response = get_user($user);
    if ($response) {
        extract($response);
        $user_department = $department;
    }
    if (isset($_POST['update'])) {
        $response = UpdatePost($_POST, $staff_id);
        if ($response === true) {
            echo "<script>Toast('Update sucessfull','green');</script>";
        } elseif (is_array($response)) {
            foreach ($response as $error) {
                echo "<script>alert('$error')</script>";
            }
        } else {
            echo "<script>alert('opps try again later')</script>";
        }

    }


}else{
    echo "<script>alert('User not found')</script>";
    header("Location: login.php");
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
    <title>Profile |
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

<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dashboard.php?user=<?= $firstname ?>">Dashboard</a>
        <a href="task.php?user=<?= $firstname ?>">Task</a>
        <a href="activities.php?user=<?= $firstname ?>">Activities</a>
        <a href="chat.php?user=<?= $firstname ?>">Chat</a>
        <a href="leave.php?user=<?= $firstname ?>">Leave</a>
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
                            <h1 class="flex justify-center text-xl mt-2 font-semibold">
                                <?= $firstname ?>
                                <?= $lastname ?>
                            </h1>
                            <h5 class="flex justify-center mb-2">
                                <?= $position ?>
                            </h5>
                            <!-- <div class="flex justify-center"><button class="p-2 py-1 rounded-xl text-center border-2 border-black" onclick="redirecting('#')">Edit</button></div> -->
                        </div>
                    </div>
                    <div class="flex flex-col my-5">
                        <span onclick="redirecting('dashboard.php?user=<?= $firstname ?>')"
                            class="bg-[#25769b] flex items-center text-align-left p-2 mx-4  rounded " data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-dashboard bx-xs'></i>
                            <p class="ml-2  flex items-center">Dashboard</p>
                        </span>

                        </span>
                        <span onclick="redirecting('task.php?user=<?= $firstname ?>)"
                            class=" flex items-center text-align-left p-2 mx-4  font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bx-spreadsheet bx-xs'></i>
                            <p class="ml-2 mr-6  flex items-center">Task</p>
                        </span>
                        <span onclick="redirecting('activities.php?user=<?= $firstname ?>')"
                            class=" flex items-center text-align-left p-2 mx-4 font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bx-calendar bx-xs'></i>
                            <p class="ml-2 mr-4  flex items-center">Activities</p>
                        </span>
                        <span onclick="redirecting('chat.php?user=<?= $firstname ?>')"
                            class=" flex items-center text-align-left p-2 mx-4   font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-paper-plane bx-xs'></i>
                            <p class="ml-2 mr-11 flex items-center">Chat</p>
                        </span>
                        <span onclick="redirecting('leave.php?user=<?= $firstname ?>')"
                            class=" flex items-center text-align-left p-2 mx-4  font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-share bx-xs'></i>
                            <p class="ml-2  flex items-center">Request Leave</p>
                        </span>
                    </div>

                </div>
                <!-- <div id="logout" class="flex justify-center items-center my-4 ">
            <span class="flex justify-center items-center bg-red-300 p-2 rounded-lg hover:cursor-pointer" onclick="Toast('Loging Out','red')"><p class="mb-1 mx-2 font-semibold">Log-out</p> <i class='bx bxs-tag-alt bx-sm'></i> </span></span>
        </div> -->
            </div>




        </div>
    </div>
    <div class="w-[100%] md:ml-32 md:pl-44 drop-shadow-md p-4 md:w-[90%] mt-5 ">
        <nav class="flex justify-between p-2 bg-[#f1f4f5] mb-5 ">
            <div class="flex justify-center items-center mt-2" id="close">
                <!-- <span><i class='bx bxs-chevrons-left bx-sm'></i></span> -->
                <!-- <div class="mx-5 items-center my-2">
                    <input type="search" placeholder="Search" class="flex justify-center items-center w-64 rounded-lg p-2">
                </div> -->
                <h2 class="mx-5 items-center mb-2 font-semibold">Joined at : <span>
                        <?= date('l , jS F Y', strtotime($joined_at)); ?>
                    </span></h2>
            </div>

            <div class="flex items-center">
                <span class="hidden md:flex mx-5 items-center ">
                    <?= date("l, jS F") ?>
                </span>
                <!-- <span class="flex justify-center items-center bg-red-300 p-1 rounded-lg hover:cursor-pointer" onclick="Toast('Loging Out','red')"><p class="mb-1 mx-2 font-semibold">Log-out</p> <i class='bx bxs-tag-alt bx-sm'></i> </span></span> -->
                <div>

                    <div class="flex justify-center items-center mt-2 outline outline-2 outline-[#25769b] p-1 m-1 rounded-lg"
                        id="user" onclick="toggleMenu()">
                        <span><i class='bx bxs-user bx-sm'></i></span>
                    </div>
                    <div class=" absolute w-32 right-0 my-5 bg-[#f1f4f5] p-2 rounded drop-shadow-md z-50" id="menus"
                        style="display: none;">
                        <ul>
                            <li class="flex justify-end" onclick="CloseMenu()"><i class='bx bx-x bx-xs'></i></li>
                            <li><span onclick="openNav()"
                                    class="flex justify-start items-center gap-2 p-1 font-semibold text-gray-400 hover:text-blue-500 cursor-pointer duration-700 md:hidden"
                                    onclick="toggleFullScreen()"><i class='bx bx-menu bx-xs'></i>Menu </span>
                                <hr>
                            </li>
                            <li><span
                                    class="flex justify-start items-center gap-2 p-1 font-semibold text-gray-400 hover:text-blue-500 cursor-pointer duration-700"
                                    onclick="toggleFullScreen()"><i class='bx bx-expand bx-xs'></i>Focus</span>
                                <hr>
                            </li>
                            <li><span onclick="move('profile.php?user=<?= $firstname ?>')"
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
        <form method="post" enctype="multipart/form-data">
            <div class=" bg-[#fffafa] drop-shadow-md flex flex-col rounded-lg p-4">
                <div>
                    <h1 class="flex text-xl mt-2 py-2 font-bold">Edit Profile</h1>
                </div>
                <hr class="border border-1 border-[#25769b]">
                <div class="grid grid-cols-1 md:grid-cols-2  flex gap-3 my-2">
                    <div id="form-group" class=" flex flex-col gap-1">
                        <label for="firstname" class="font-bold">FIRSTNAME</label>
                        <input type="text" placeholder="Firstname" name="firstname"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b] rounded"
                            value="<?= $firstname ?>">
                    </div>
                    <div id="form-group" class="flex flex-col gap-1">
                        <label for="firstname" class="font-bold">LASTNAME</label>
                        <input type="text" placeholder="lastname" name="lastname"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b]  rounded"
                            value="<?= $lastname ?>">
                    </div>
                </div>
                <div class=" grid grid-cols-1 md:grid-cols-2 flex gap-3 my-2">
                    <div id="form-group" class="flex flex-col gap-1">
                        <label for="email" class="font-bold">EMAIL</label>
                        <input type="text" placeholder="Firstname" name="email"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b]  rounded"
                            value="<?= $email ?>">
                    </div>
                    <div id="form-group" class="flex flex-col gap-1">
                        <label for="phone" class="font-bold">PHONE NO</label>
                        <input type="tel" placeholder="phone number" name="phone"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b]  rounded"
                            value="<?= $phone ?>">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 flex gap-3 my-2">
                    <div id="form-group" class="flex flex-col gap-1">
                        <label for="department" class="font-bold">DEPARTMENT</label>
                        <select name="department"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b]  rounded">
                            <option disabled>Department</option>
                            <?php
                            $departments = get_department();
                            if ($departments) {
                                foreach ($departments as $dept) {
                                    extract($dept); ?>
                                    <option <?php if ($user_department == $department):
                                        echo "selected";
                                    endif; ?>
                                        value="<?= $department ?>"><?= $department ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div id="form-group" class="flex flex-col gap-1">
                        <label for="firstname" class="font-bold">Profile Picture - Current image :
                            <?= $profile_pic ?>
                        </label>
                        <input type="hidden" value="<?= $profile_pic ?>" name="oldimage">
                        <input type="file" name="image"
                            class="w-80 md:w-96 bg-gray-200 h-11 p-1 border border-2 border-[#25769b] focus:border-[#25769b]  rounded">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2  flex gap-1 my-2">
                    <div id="form-group" class=" flex flex-col gap-1">
                        <label for="firstname" class="font-bold">Date Of Birth</label>
                        <input type="date" placeholder="Date of Birth"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b] rounded">
                    </div>
                    <div id="form-group" class="flex flex-col gap-1">
                        <label for="firstname" class="font-bold">Position</label>
                        <input type="text" placeholder="position" name="position"
                            class="w-80 md:w-96 bg-gray-200 p-2 border border-2 border-[#25769b] focus:border-[#25769b]  rounded"
                            value="<?= $position ?>">
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <input type="submit" class="w-24 mt-5 p-2 rounded-lg bg-teal-700 hover:bg-teal-500 duration-700"
                        name="update" value="Update">
                    <a href="../Admin/config/delete.php?id=<?= $staff_id ?>"
                        class="bg-red-500 p-2 mt-5 rounded-md px-3">Delete</a>
                </div>
            </div>
        </form>
    </div>








    <script src="./Js/tailwind.js"></script>
    <script src="./Js/aos.js"></script>
    <script src="./Js/feather.js"></script>
    <script src="./Js/Toastify.js"></script>
    <script src="./Js/script.js"></script>
</body>

</html>
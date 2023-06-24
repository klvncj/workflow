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


if (isset($_POST['create-task'])) {
    $response = create_task($_POST);
    if ($response === true) {
       echo "<script>alert('Created')</script>";
    }
} else {
    // echo "<script>alert('error')</script>";
}

if (isset($_POST['send-report'])) {
    $response = send_report($_POST);
    if ($response === true) {
       echo "<script>alert('Report has been Sent!!!')</script>";
    }
} else {
    
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
    <title>Employee Page |
        <?= $firstname; ?>
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

    /* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
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
                                <?=$firstname ?> <?=$lastname ?>
                            </h1>
                            <h5 class="flex justify-center mb-2">
                            <?= $position ?>
                            </h5>
                        </div>
                    </div>
                    <div class="flex flex-col my-5">
                        <span onclick="redirecting('dashboard.php?user=<?= $firstname?>')" class="flex items-center text-align-left p-2 mx-4"
                            data-aos="fade-up" data-aos-duration="2000"><i class='bx bxs-dashboard bx-xs'></i>
                            <p class="ml-2  flex items-center">Dashboard</p>
                        </span>

                        </span>
                        <span onclick="redirecting('task.php?user=<?= $firstname?>')"
                            class="bg-[#25769b] flex items-center text-align-left p-2 mx-4  font-light rounded"
                            data-aos="fade-up" data-aos-duration="2000"><i class='bx bx-spreadsheet bx-xs'></i>
                            <p class="ml-2 mr-6  flex items-center">Task</p>
                        </span>
                        <span onclick="redirecting('activities.php?user=<?= $firstname?>')"
                            class=" flex items-center text-align-left p-2 mx-4 font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bx-calendar bx-xs'></i>
                            <p class="ml-2 mr-4  flex items-center">Activities</p>
                        </span>
                        <span onclick="redirecting('chat.php?user=<?= $firstname?>')"
                            class=" flex items-center text-align-left p-2 mx-4   font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-paper-plane bx-xs'></i>
                            <p class="ml-2 mr-11 flex items-center">Chat</p>
                        </span>
                        <span onclick="redirecting('leave.php?user=<?= $firstname?>')"
                            class=" flex items-center text-align-left p-2 mx-4  font-light" data-aos="fade-up"
                            data-aos-duration="2000"><i class='bx bxs-share bx-xs'></i>
                            <p class="ml-2  flex items-center">Request Leave</p>
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class=" w-full md:ml-32 md:pl-44 drop-shadow-md p-4 md:w-[90%] ">
        <nav class="flex justify-between p-2 bg-[#f1f4f5] mb-5 ">
            <div class="flex justify-center items-center mt-2" id="close">
                <h2 class="mx-5 items-center mb-2 font-semibold">
                    Manage Task
                </h2>
            </div>
            <div class="flex items-center">
                <span class="hidden md:flex mx-5 items-center mb-2"><?= date("l, jS F") ?></span>
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
        <div id="holder" class="grid grid-cols-1 w-[100%] md:grid-cols-2 lg:grid-cols-3 gap-4 mt-12 ">
            <div class=" bg-[#fffafa] drop-shadow-sm flex flex-col p-6" data-aos="fade-up" data-aos-duration="3000">
                <h3 class="font-black">Add To-Do</h3>
                <form method="post">
                    <div>
                        <input type="hidden" name="user" value="<?=$firstname?>">
                        <input type="hidden" name="assigned" value="me">
                        <input type="text" name="task" placeholder="Create to-do" required
                            class="w-80 h-8 rounded bg-gray-300 my-2 p-2 text-black">
                        <button type="submit"
                        name="create-task"
                            class="flex justify-center text-white bg-black w-80 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 duration-700 rounded text-lg">
                            Create Task
                        </button>
                    </div>
                </form>
            </div>
            <div class=" bg-[#fffafa] drop-shadow-md flex flex-col rounded-lg p-4" data-aos="fade-up"
                data-aos-duration="3000">
                <h3 class="font-black">To-Do</h3>
                <?php
                if (isset($_GET['user'])) {
                    $user = $_GET['user'];}
                                $histories = show_personal_task($user);
                                if (!empty($histories)) {
                                    foreach ($histories as $history) {
                                        extract($history); ?>
                <span class="flex justify-between rounded p-1 my-1">
                    <p><?=$task?></p> <span><i class='bx bxs-edit-alt bx-xs'></i><i
                            class='bx bxs-x-square bx-xs' onclick="move('../Admin/config/delete-task.php?id=<?=$task_id?>&user=<?=$firstname?>')"></i></span>
                </span>
                <hr>
                <?php }}?>
            </div>
            <div class=" bg-[#fffafa] drop-shadow-sm flex flex-col p-6" data-aos="fade-up" data-aos-duration="3000">
               <form method="post">
               <div>
                        <input type="hidden" name="user" value="<?=$firstname?> <?=$lastname?>">
                        <textarea type="text" name="report" placeholder="Create to-do" required
                            class="w-80 h-8 rounded bg-gray-300 my-2 p-2 text-black"></textarea>
                        <button type="submit"
                        name="send-report"
                            class="flex justify-center text-white bg-black w-80 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 duration-700 rounded text-lg">
                            SEND REPORT
                        </button>
                    </div>
               </form> 
            </div>
        </div>
        <div class=" bg-[#fffafa] drop-shadow-md flex flex-col rounded-lg p-4 my-5" data-aos="fade-up"
            data-aos-duration="3000">
            <h3 class="font-black">ADMIN TASK</h3>
            <?php
                if (isset($_GET['user'])) {
                    $user = $_GET['user'];}
                                $histories = show_admin_task($user);
                                if (!empty($histories)) {
                                    foreach ($histories as $history) {
                                        extract($history); ?>
            <span class="flex justify-between rounded p-1 my-1 hover:translate-y-1 duration-500">
                <p><?=$task?></p> <span  style="width:auto;" onclick="Toast('Feature coming soon','green')"
                    class="text-xs flex items-center bg-green-400 p-1 rounded-md">Write Report</span>
            </span>
            <hr>
           <?php }}else{
            echo 'No Available Task';
           }?>
        </div>

    </div>

    <div id="id01" class="modal">
  
  <form class="modal-content animate"method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Response To : Make the website responsive</b></label>
      <input type="hidden" name="reply" required>
      <input type="text" placeholder="Write a Response" name="report" required>
    </div>

    <div class="container flex justify-around" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <button type="button" class="bg-green-400 w-24 rounded p-3">SEND</button>
     
    </div>
  </form>
</div>






    <script src="./Js/tailwind.js"></script>
    <script src="./Js/aos.js"></script>
    <script src="./Js/feather.js"></script>
    <script src="./Js/Toastify.js"></script>
    <script src="./Js/script.js"></script>
    <script>
        //to be used when adding the respond to task feature
        onclick="document.getElementById('id01').style.display='block'"
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon" type="png" href="./main/asset/images/Web_icon_-_Copy2-removebg-preview.png" />
  <link rel="stylesheet" href="./main/css/aos.css">
  <link rel="stylesheet" href="./main/css/Toastify.css">
  <link rel="stylesheet" href="./main/asset/boxicons-2.1.4/css/animations.css">
  <link rel="stylesheet" href="./main/asset/boxicons-2.1.4/css/boxicons.css">
  <link rel="stylesheet" href="./main/asset/boxicons-2.1.4/css/boxicons.min.css">
  <link rel="stylesheet" href="./main/asset/boxicons-2.1.4/css/transformations.css">
  <title>Delta Tech - WorkFlow
  </title>
</head>
<style>
  html {
    scroll-behavior: smooth;
  }

  #navbar {
    overflow: hidden;
    background-color: #333;
  }

  .content {
    padding: 16px;
  }

  .sticky {
    position: fixed;
    top: 0;
    width: 100%;
  }

  .sticky+.content {
    padding-top: 60px;
  }
</style>

<body bgcolor="#f1f4f5">
  <div id="navbar" class="flex justify-between bg-black z-50 md:flex justify-around sticky p-2" role="navigation">
    <div class="flex justify-center" >
      <img src="./main/asset/images/3-removebg-preview (1).png" alt="logo" class="mx-6" width="180px" height="10px">
    </div>
    <div class="hidden md:flex">
      <ul class="flex gap-16 text-white font-mono items-center my-1 justify-around text-xl font-bold ">
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
    <div class="hidden md:flex items-center gap-2 mx-6">
      <a href="./main/login.php"
        class="hidden md:flex text-white outline outline-2 outline-offset-2 outline-white p-1 gap-2 rounded-md font-semibold font-mono flex items-center"><i
          class='bx bx-lock-alt'></i> login</a>
      <a href="./main/signup.php" class="hidden md:flex bg-black text-white p-2 rounded-md font-semibold font-mono">Get
        Started</a>
    </div>
    <div class="flex justify-center items-center mt-2 text-white  p-1 m-1  md:hidden" id="user" onclick="toggleMenu()">
      <span><i class='bx bx-menu bx-sm'></i></span>
    </div>

  </div>
  <div class="absolute w-32 right-0 my-5 bg-[#f1f4f5] p-2 rounded drop-shadow-md z-40" id="menus"
    style="display: none;">
    <ul>
      <li class="flex justify-end" onclick="CloseMenu()"><i class='bx bx-x bx-xs'></i></li>
      <li class="flex items-center justify-center p-2 bg-[#f4f1f1] text-black font-semibold font-mono"><a href="#about">About</a></li>
      <hr class="border-t-1 border-gray-500">
      <li class="flex items-center justify-center p-2 bg-[#f4f1f1] text-black font-semibold font-mono"><a href="#features">Features</a></li>
      <hr class="border-t-1 border-gray-500">
      <li class="flex items-center justify-center p-2 bg-[#f4f1f1] text-black font-semibold font-mono"><a href="#contact">Contact</a></li>
    </ul>
  </div>
  <div class="invisible" id="about">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur molestias consequatur deleniti quae voluptatibus
      ut et ipsam, porro doloremque vel explicabo laboriosam, mollitia dolorem. Maxime ducimus commodi iure voluptates
      quae!</p>
  </div>
  <div id="introduction" class="content flex justify-center items-center">
    <div class="hidden md:flex flex-wrap justify-center mt-32">
      <span class="flex font-bold font-sans  justify-center text-4xl">INTRODUCING <p class="font-black mx-2 text-4xl  ">
          WORK FLOW</p></span></p>
      <div class="flex justify-center font-bold font-mono my-6 text-center text-lg">Streamline, Collaborate, Succeed.
        Our powerful staff management system, Workflow, empowers your team's success.<br> Seamlessly streamline
        operations, enhance collaboration, and boost productivity. From task management to real-time collaboration,<br>
        leave management, insightful reporting, and responsive design, Workflow revolutionizes your workforce
        management.<br> Experience the future of success today with Workflow.</div>
    </div>
    <div class="flex flex-col md:hidden">
      <div class="flex justify-center gap-5 text-4xl">
        <p class="mb-5">Introducing <br><span class="font-black">WORK FLOW</span></p>
      </div>
      <div class="flex justify-center font-semibold font-mono my-12">Streamline, Collaborate, Succeed.
        Our powerful staff management system, Workflow, empowers your team's success. Seamlessly streamline operations,
        enhance collaboration, and boost productivity. From task management to real-time collaboration, leave
        management, insightful reporting, and responsive design, Workflow revolutionizes your workforce management.
        Experience the future of success today with Workflow.</div>
    </div>
  </div>


  <div class="flex justify-center items-center mt-4">
    <button
      class="inline-flex text-white bg-[#242424] border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 duration-500 rounded text-lg flex items-center"
     >
      <a href="./main/signup.php">Get Started</a> <i class='bx bx-right-arrow-alt bx-sm'></i>
    </button>
  </div>
  <div class="my-24 invisible" id="features">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur molestias consequatur deleniti quae voluptatibus
      ut et ipsam, porro doloremque vel explicabo laboriosam, mollitia dolorem. Maxime ducimus commodi iure voluptates
      quae!</p>
  </div>
  <!-- Features Section -->
  <section>
    <div>
      <h1 class="font-black text-black text-2xl mx-6 font-mono my-6">/Features</h1>
      <div class="flex justify-center">
        <h1
          class="font-black text-black text-xl mx-6 font-mono gap-2 flex  items-center outline outline-2 outline-offset-2 outline-black rounded ">
          <i class='bx bxs-user bx-sm'></i> Staff Features</h1>
      </div>
      <!-- Staff Features end -->
      <!-- Admin features Starts -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-10" data-aos="fade-in">
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-spreadsheet bx-md'></i>
            <h1 class="font-black">Task Efficiency and Organization</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Stay organized and focused by easily creating personal
              tasks with deadlines and priorities.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i> Collaborate seamlessly with your team by effortlessly
              receiving tasks assigned by your admin.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Keep your admin informed by sending comprehensive
              reports on your assigned tasks, showcasing your productivity and progress.</li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bx-calendar bx-md'></i>
            <h1 class="font-black">Activities : Stay Up-to-Date and Informed</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Latest Meeting Date and Time: Never miss a beat with
              the ability to see the date and time of upcoming meetings at a glance.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Experience the power of the Activities page and stay
              connected to the pulse of your team.</li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-paper-plane bx-md'></i>
            <h1 class="font-black">Chat Feature: Connect and Collaborate Seamlessly</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Staff Presence: See all the staff members who are
              actively using the system in real-time.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Seamless Chat: Engage in effortless conversations with
              staff members using the system.</li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-share bx-md'></i>
            <h1 class="font-black">Task Efficiency and Organization</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Send Leave Requests: Submit leave requests conveniently
              through the system.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i> Leave Status Tracking: Stay informed about the
              progress of your leave requests.</li>
          </ol>
        </div>
      </div>
      <div class="flex justify-center my-24">
        <h1
          class="font-black text-black text-2xl mx-6 font-mono gap-2 flex  items-center outline outline-2 outline-offset-4 outline-black rounded ">
          Admin Features</h1>
        </h1>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-10" data-aos="fade-in">
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-dashboard bx-md'></i>
            <h1 class="font-black">Admin Dashboard: Command Center for Effective Management</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Latest Reports: Stay informed with real-time access to the latest reports.</li>

            <li class="gap-2"><i class='bx bxs-check-square'></i>Recent Activity: Monitor the pulse of your organization with the Recent Activity section.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i> Gain valuable insights into your progress by accessing
              your personal task history and admin-assigned tasks.</li>   </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-user-detail bx-md'></i>
            <h1 class="font-black">Staff Management Section: Effortlessly Manage Your Team</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Staff List: Access a comprehensive list of all staff members in one place.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Individual Staff View: Dive deeper into each staff member's profile.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Remove Staff Members: Simplify your team management by removing staff members when necessary.
<li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-spreadsheet bx-md'></i>
            <h1 class="font-black">Task Management Section: Streamline Assignments and Track Progress</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Create Self Tasks: Stay organized and focused by effortlessly creating tasks for yourself.</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Assign Tasks to Staff Members: Delegate tasks to your staff members seamlessly. </li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Task History: Access a comprehensive task history for both assigned and self tasks.</li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-calendar bx-md'></i>
            <h1 class="font-black">Activity Management Section: Stay Informed and Organized</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Create Activities: Effortlessly create new activities within the system..</li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Manage Activities: Stay organized with a centralized hub for all your activities.

           </li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-paper-plane bx-md'></i>
            <h1 class="font-black"> Chat Section: Seamless Communication and User Interaction</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Chat with Users: Engage in real-time conversations with users through our intuitive chat interface.<li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>User List: Access a comprehensive list of all users actively using the system.</li>
          </ol>
        </div>
        <div
          class="bg-[#fffafa] p-10 flex flex-col shadow-md rounded hover:shadow-2xl duration-800 hover:translate-y-2 duration-500 gap-2"
          data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
          <span class="flex items-center gap-2 my-1 rounded"><i class='bx bxs-share bx-md'></i>
            <h1 class="font-black">Leave Management Section: Streamline and Approve Leave Requests</h1>
          </span>
          <hr class="border-t-2 border-gray-500 rounded">
          <ol class="font-semibold flex flex-col gap-4 text-gray-700">
            <li class="gap-2"><i class='bx bxs-check-square'></i>Receive Leave Requests: Staff members can submit their leave requests through the system. </li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Approve or Decline Requests: Review each leave request and make informed decisions.. </li>
            <li class="gap-2"><i class='bx bxs-check-square'></i>Leave Status Tracking: Stay updated on the status of leave requests. </li>
          </ol>
        </div>

      </div>
      <div class="flex justify-center">
  </section>
  <!-- Features Section End  -->
  <!-- Contact -->
  <div class="my-24 invisible" id="contact">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur molestias consequatur deleniti quae voluptatibus
      ut et ipsam, porro doloremque vel explicabo laboriosam, mollitia dolorem. Maxime ducimus commodi iure voluptates
      quae!</p>
  </div>
  <section class="hidden lg:block">
    <h1 class="font-black text-black text-2xl mx-6 my-6 font-mono">/Contact</h1>
    <div class="flex justify-around bg-zinc-900 p-12">
<div class="flex flex-col justify-center items-center hover:bg-zinc-800 duration-500 rounded-md w-96 text-white font-mono font-black border border-4 border-white">
<i class='bx bx-mail-send bx-lg' ></i>
<span>Drop us an email</span>
<span class="outline outline-2 outline-white outline-offset-2 p-2 my-2 rounded-md hover:cursor-pointer"><a href="mailto:ckelvin196@gmail.com">ckelvin196@gmail.com</a></span>

</div>
<div class="w-96">  <form class="flex flex-col justify-center gap-2 my-12">
    <label class="text-white font-bold font-mono text-xl">Full Name :</label>
  <input type="text" placeholder="Enter Your Full name" class="w-96 p-2 h-10 bg-gray-700 rounded-md" required>
  <label class="text-white font-bold font-mono text-xl">Email :</label>
      <input type="email" placeholder="Enter Your email" class="w-96 p-2 h-10 bg-gray-700 rounded-md" required>
      <label class="text-white font-bold font-mono text-xl">subject</label>
      <textarea cols="180" class="w-96 bg-[#f4f1f1] rounded-md p-2" placeholder="Write Something..." required></textarea>
      <button class="bg-green-600 w-96 p-2 rounded-md text-white flex items-center justify-center gap-2 font-mono font-bold hover:bg-green-800 duration-500"><i  class='bx bxs-paper-plane bx-sm'></i>SEND</button>
  </form></div>
    </div>
  </section>
  <hr>
  <!-- Footer  -->
  <section>
    <footer class="flex justify-around bg-zinc-900 p-8 text-white font-mono font-bold text-lg py-12">
     <span> &copy  <?= date("Y") ?> WorkFlow Designed By <a href="https://kelvincj.netlify.app">Kelvin</a> - Delta Tech</span>
     <span class="flex gap-4">
     <a href="https://www.instagram.com/klvncj"><i class='bx bxl-instagram bx-sm'></i></a>
     <a href="https://github.com/klvncj"><i class='bx bxl-github bx-sm'></i></a>
     <a href="https://kelvincj.netlify.app"><i class='bx bx-info-circle bx-sm'></i></a>

    </span>
    </footer>
  </section>
  <script src="./main/Js/tailwind.js"></script>
  <script src="./main/Js/aos.js"></script>
  <script src="./main/Js/feather.js"></script>
  <script src="./main/Js/Toastify.js"></script>
  <script src="./main/Js/script.js"></script>
</body>

</html>
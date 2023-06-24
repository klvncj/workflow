<nav class="flex justify-between p-2 bg-[#f1f4f5] ">
    <div class="flex justify-center items-center mt-2" id="close">
        <!-- <span><i class='bx bxs-chevrons-left bx-sm'></i></span> -->
        <!-- <div class="mx-5 items-center my-2">
                    <input type="search" placeholder="Search" class="flex justify-center items-center w-64 rounded-lg p-2">
                </div> -->
        <h2 class="mx-5 items-center mb-2 font-semibold">
            <?= $page_message; ?>
        </h2>
    </div>

    <div class="flex items-center">
        <span class="hidden md:flex mx-5 items-center font-semibold">
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
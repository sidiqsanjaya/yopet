<body class="font-inter">
    <div class="container px-8 mx-auto lg:px-32 xl:px-40">
        <!-- Navbar -->
        <nav class="py-4">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <!-- logo -->
                <a href="/" class="flex">
                    <svg class="h-10 mr-3" viewBox="0 0 52 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.87695 53H28.7791C41.5357 53 51.877 42.7025 51.877 30H24.9748C12.2182 30 1.87695 40.2975 1.87695 53Z" fill="#76A9FA"/><path d="M0.000409561 32.1646L0.000409561 66.4111C12.8618 66.4111 23.2881 55.9849 23.2881 43.1235L23.2881 8.87689C10.9966 8.98066 1.39567 19.5573 0.000409561 32.1646Z" fill="#A4CAFE"/><path d="M50.877 5H23.9748C11.2182 5 0.876953 15.2975 0.876953 28H27.7791C40.5357 28 50.877 17.7025 50.877 5Z" fill="#1C64F2"/></svg>
                    <span class="self-center text-lg font-semibold whitespace-nowrap ">YoPet</span>
                </a>

                <!-- menu -->
                <?php if(empty($_SESSION["loggedin"])){ ?>
                <div class="flex md:order-2">
                    <a href="?page=signin" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center md:mr-0 ">Login</a>

                    </a>
                </div>
                <?php }else{ ?>
                <div class="flex md:order-2">
                    <div class="relative inline-block dropdown">
                        <button class="inline-flex items-center px-4 py-2 font-semibold text-white bg-gradient-to-r from-cyan-500 to-blue-500 rounded">
                          <span class="mr-1"><?php echo $_SESSION['username'];?></span>
                          <svg class="w-4 h-4 ml-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                            <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 rounded-t hover:bg-blue-500 hover:text-white" href="?page=profile">Profile</a></li>
                            <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?page=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="/" class="block py-2 pl-3 pr-4 font-semibold text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Home</a>
                        </li>
                        <li>
                            <a href="?page=forum" class="block py-2 pl-3 pr-4 font-semibold text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Forum</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 font-semibold text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">About us</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
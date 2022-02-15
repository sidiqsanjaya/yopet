<body class="font-inter">
    <div class="container px-8 lg:px-32 xl:px-40 mx-auto">
        <!-- Navbar -->
        <nav class="py-4">
            <div class="flex flex-wrap justify-between items-center mx-auto">
                <!-- logo -->
                <a href="#" class="flex">
                    <svg class="mr-3 h-10" viewBox="0 0 52 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.87695 53H28.7791C41.5357 53 51.877 42.7025 51.877 30H24.9748C12.2182 30 1.87695 40.2975 1.87695 53Z" fill="#76A9FA"/><path d="M0.000409561 32.1646L0.000409561 66.4111C12.8618 66.4111 23.2881 55.9849 23.2881 43.1235L23.2881 8.87689C10.9966 8.98066 1.39567 19.5573 0.000409561 32.1646Z" fill="#A4CAFE"/><path d="M50.877 5H23.9748C11.2182 5 0.876953 15.2975 0.876953 28H27.7791C40.5357 28 50.877 17.7025 50.877 5Z" fill="#1C64F2"/></svg>
                    <span class="self-center text-lg font-semibold whitespace-nowrap ">YoPet</span>
                </a>

                <!-- menu -->
                <div class="flex md:order-2">
                    <a href="./signup.html" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center md:mr-0 ">Create an account</a>

                    </a>
                </div>
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="index.html" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">Home</a>
                        </li>
                        <li>
                            <a href="forum.html" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">Forum</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">About us</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section>
            <div class="WriteForum">
                <textarea class="border-transparent focus:border-blueGray-500 px-4 py-2.5 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 w-full bg-gray-200 mt-4 rounded-lg ease-in-out placeholder-gray-600"
                    name="desc" id="desc" cols="32" rows="3" placeholder="Write a Forum"></textarea>
                <div class="flex flex-row-reverse p-3">
                    <div class="flex-initial pl-3">
                        <button type="button" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-gradient-to-r from-cyan-500 to-blue-500 rounded-md hover:bg-gray-800  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                             
                             <span class="mx-1">Submit</span>
                          </button>
                    </div>
                </div>
            </div>
            <div class="border-t mt-2"></div>



            <!-- posting -->
            <div class="posting mt-8">
                <div class="border rounded-xl">
                    <div class="post px-6 py-4">
                        <h1 class="text-xl font-semibold">Juliadit Syahputri</h1>
                        <div class="category">
                            <p class="bg-cyan-500 inline-flex px-6 py-1 text-white rounded-lg mt-2">Cat</p>
                            <p class="bg-cyan-500 inline-flex px-6 py-1 text-white rounded-lg mt-2">Problem</p>
                        </div>

                        <p class="mt-2">kenapa ya ko kucing saya tidak suka pada saya? padahal saya udah ngasih perhatian banget ke dia sampai saya udah jatuh cinta sama dia? ga bales = pki</p>

                        <div class="replycomment mt-4 ml-12">
                            <div class="border px-6 py-4 rounded-lg">
                                <h1 class="font-semibold text-xl">Ade Kurniawan</h1>
                                <p>Mana say tahu kan saya pki</p>
                            </div>
                        </div>

                        <form action="">
                            <div class="mt-8 flex gap-4">
                                <input class="w-full border-none bg-gray-200 rounded-lg" placeholder="Write a comment" type="text">
                                <button class="bg-gradient-to-r from-cyan-500 to-blue-500 px-6 rounded-lg text-white">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="posting mt-8">
                <div class="border rounded-xl">
                    <div class="post px-6 py-4">
                        <h1 class="text-xl font-semibold">Juliadit Syahputri</h1>
                        <div class="category">
                            <p class="bg-cyan-500 inline-flex px-6 py-1 text-white rounded-lg mt-2">Cat</p>
                            <p class="bg-cyan-500 inline-flex px-6 py-1 text-white rounded-lg mt-2">Problem</p>
                        </div>

                        <p class="mt-2">kenapa ya ko kucing saya tidak suka pada saya? padahal saya udah ngasih perhatian banget ke dia sampai saya udah jatuh cinta sama dia? ga bales = pki</p>

                        <div class="replycomment mt-4 ml-12">
                            <div class="border px-6 py-4 rounded-lg">
                                <h1 class="font-semibold text-xl">Ade Kurniawan</h1>
                                <p>Mana say tahu kan saya pki</p>
                            </div>
                        </div>

                        <form action="">
                            <div class="mt-8 flex gap-4">
                                <input class="w-full border-none bg-gray-200 rounded-lg" placeholder="Write a comment" type="text">
                                <button class="bg-gradient-to-r from-cyan-500 to-blue-500 px-6 rounded-lg text-white">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="posting mt-8">
                <div class="border rounded-xl">
                    <div class="post px-6 py-4">
                        <h1 class="text-xl font-semibold">Juliadit Syahputri</h1>
                        <div class="category">
                            <p class="bg-cyan-500 inline-flex px-6 py-1 text-white rounded-lg mt-2">Cat</p>
                            <p class="bg-cyan-500 inline-flex px-6 py-1 text-white rounded-lg mt-2">Problem</p>
                        </div>

                        <p class="mt-2">kenapa ya ko kucing saya tidak suka pada saya? padahal saya udah ngasih perhatian banget ke dia sampai saya udah jatuh cinta sama dia? ga bales = pki</p>

                        <div class="replycomment mt-4 ml-12">
                            <div class="border px-6 py-4 rounded-lg">
                                <h1 class="font-semibold text-xl">Ade Kurniawan</h1>
                                <p>Mana say tahu kan saya pki</p>
                            </div>
                        </div>

                        <form action="">
                            <div class="mt-8 flex gap-4">
                                <input class="w-full border-none bg-gray-200 rounded-lg" placeholder="Write a comment" type="text">
                                <button class="bg-gradient-to-r from-cyan-500 to-blue-500 px-6 rounded-lg text-white">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </section>

</body>

</html>
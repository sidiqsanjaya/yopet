<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
phpinfo();
}

?>
<body class="font-inter">
    <div class="container px-8 lg:px-32 xl:px-40 mx-auto">
        <!-- Navbar -->
        <nav class="py-4">
            <div class="flex flex-wrap justify-between items-center mx-auto">
                <!-- logo -->
                <a href="/" class="flex">
                    <svg class="mr-3 h-10" viewBox="0 0 52 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.87695 53H28.7791C41.5357 53 51.877 42.7025 51.877 30H24.9748C12.2182 30 1.87695 40.2975 1.87695 53Z" fill="#76A9FA"/><path d="M0.000409561 32.1646L0.000409561 66.4111C12.8618 66.4111 23.2881 55.9849 23.2881 43.1235L23.2881 8.87689C10.9966 8.98066 1.39567 19.5573 0.000409561 32.1646Z" fill="#A4CAFE"/><path d="M50.877 5H23.9748C11.2182 5 0.876953 15.2975 0.876953 28H27.7791C40.5357 28 50.877 17.7025 50.877 5Z" fill="#1C64F2"/></svg>
                    <span class="self-center text-lg font-semibold whitespace-nowrap ">YoPet</span>
                </a>

                <!-- menu -->
                <div class="flex md:order-2">
                    <a href="?page=logout" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center md:mr-0 ">Logout</a>

                    </a>
                </div>
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1">
                    <!-- <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">How it works?</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">About us</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-semibold ">FAQ</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>



        <div class="mt-5 bg-white rounded-lg shadow border">
            <div class="mt-12">
                <div class="">
                <form action='?page=postpet' method='POST' enctype='multipart/form-data'>
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Post your pet</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <input type="text" placeholder="Title" name="inputtitle" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                        <textarea class="border-transparent focus:border-blueGray-500 px-4 py-2.5 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 w-full bg-gray-200 mt-4 rounded-lg ease-in-out placeholder-gray-600"
                            name="inputdesc" id="desc" cols="32" rows="3" placeholder="Description"></textarea>
                        <div class="grid grid-cols-3 gap-4">    
                            <div class="">
                                <input type="text" placeholder="Age" name="inputage" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                            </div>
                            <div class="flex justify-center gap-4 mt-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="gender" id="inlineRadio1" value="male">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="gender" id="inlineRadio2" value="female">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">Female</label>
                                </div>
                            </div>
                            <div class="">
                                <input type="text" placeholder="Weight (Kg)" name="inputweight" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                            </div>
                        </div>

                        <div class="">
                            <input class="mt-4 border rounded-lg w-full bg-white" name="inputfile[]" type="file" multiple>
                        </div>
                    </div>

                    <div class="px-5 ">
                    </div>
                    <hr class="mt-4">
                    <div class="flex flex-row-reverse p-3">
                        <div class="flex-initial pl-3">
                            <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-gradient-to-r from-cyan-500 to-blue-500 rounded-md hover:bg-gray-800  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z" opacity=".3"></path>
                                <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z"></path>
                             </svg>
                             <span class="pl-2 mx-1">Save</span>
                          </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>




    </div>
</body>

</html>
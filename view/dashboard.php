<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt Pet - With more adoptable pets than ever, we have an urgent need for pet adopters</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/charity-31/512/CharityIcons-50-512.png">
</head>

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
                    </ul>
                </div>
            </div>

        </nav>

        <!-- header -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <div class="bg-white">

            <main class="my-4">
                <div class="container mx-auto">
                    <div class="h-96 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('images/dog.jpg')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl md:text-3xl text-white font-semibold">Adopt a Dog</h2>
                                <p class="mt-2 md:mt-4 text-white opacity-50">Adopting is often less expensive than buying a new one. The average cost to purchase a puppy is between $300 and $1,500, while the average adoption fee is much lower, typically between $50 and $300. </p>
                                <button class="flex items-center mt-4 md:mt-8 px-3 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 text-white text-sm uppercase rounded-lg hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span class="font-semibold pl-2">Adopt Now</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mt-8 md:-mx-4">
                        <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('images/cat.jpg')">
                            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                <div class="px-10 max-w-xl">
                                    <h2 class="text-2xl text-white font-semibold">Adopt a Cat</h2>
                                    <p class="mt-2 text-gray-400"></p>
                                    <button class="flex items-center mt-4 text-white text-sm uppercase font-semibold rounded hover:underline focus:outline-none">
                                <span>Adopt Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('images/rabbit.jpg')">
                            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                <div class="px-10 max-w-xl">
                                    <h2 class="text-2xl text-white font-semibold">Adopt a Rabbit</h2>
                                    <p class="mt-2 text-gray-400"></p>
                                    <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>adopt Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            </div>

            <!-- Pet Available -->
            <div class="mt-12">
                <div class="">
                    <div class="flex justify-between">
                        <h1 class="text-xl font-semibold md:text-2xl">Pets Available for Adoption</h1>
                        <a class="text-blue-600" href="#">See more</a>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <!-- items 1 -->

                        <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden my-4">
                            <a href="adekurniawan.html">
                                <img class="w-full h-56 object-cover object-center" src="availablepet/persian-cat.jpg" alt="avatar">
                                <div class="flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 justify-between">
                                    <h1 class="text-white font-semibold">Cat <span> : </span> <span>Persian</span></h1>
                                    <a class="text-white tracking-wide hover:text-blue-300" href="#">Detail</a>
                                </div>
                                <div class="py-4 px-6">
                                    <h1 class="text-2xl font-semibold text-gray-800">Ade Kurniawan</h1>
                                    <ul class="py-2 text-sm text-gray-700 list-disc list-inside flex gap-4">
                                        <li>18 Month</li>
                                        <li>Male</li>
                                        <li>Large</li>
                                    </ul>
                                    <div class="flex items-center mt-2 text-gray-700">
                                        <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                        <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                                    </svg>
                                        <h1 class="px-2 text-sm">Bandung, Indonesia</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- items 2 -->
                        <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden my-4">
                            <a href="/juliadit">
                                <img class="w-full h-56 object-cover object-center" src="availablepet/mainecoon.jpg" alt="avatar">
                                <div class="flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 justify-between">
                                    <h1 class="text-white font-semibold">Cat <span> : </span><span>Maine Coon</span></h1>
                                    <a class="text-white tracking-wide hover:text-blue-300" href="#">Detail</a>
                                </div>
                                <div class="py-4 px-6">
                                    <h1 class="text-2xl font-semibold text-gray-800">Juliadit Syahputra</h1>
                                    <ul class="py-2 text-sm text-gray-700 list-disc list-inside flex gap-4">
                                        <li>18 Month</li>
                                        <li>Male</li>
                                        <li>Large</li>
                                    </ul>
                                    <div class="flex items-center mt-2 text-gray-700">
                                        <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                        <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                                    </svg>
                                        <h1 class="px-2 text-sm">Bandung, Indonesia</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- items 3 -->
                        <div class="max-w-full bg-white shadow-lg rounded-lg overflow-hidden my-4">
                            <a href="/rafy">
                                <img class="w-full h-56 object-cover object-center" src="availablepet/hushki.jpg" alt="avatar">
                                <div class="flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 justify-between">
                                    <h1 class="text-white font-semibold">Dog <span> : </span> <span>Siberian Husky</span></h1>
                                    <a class="text-white tracking-wide hover:text-blue-300" href="#">Detail</a>
                                </div>
                                <div class="py-4 px-6">
                                    <h1 class="text-2xl font-semibold text-gray-800">Rafy Ardhanie</h1>
                                    <ul class="py-2 text-sm text-gray-700 list-disc list-inside flex gap-4">
                                        <li>18 Month</li>
                                        <li>Male</li>
                                        <li>Large</li>
                                    </ul>
                                    <div class="flex items-center mt-2 text-gray-700">
                                        <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                        <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                                    </svg>
                                        <h1 class="px-2 text-sm">Bandung, Indonesia</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- See more button -->
            <button class="flex mx-auto border border-gray-300 text-gray-400 hover:border-blue-600 hover:text-blue-600  py-2 px-8 rounded-lg my-4">
                See more
            </button>



        </div>

        <div class="">
            <footer class="text-gray-600 body-font bg-gray-700">
                <div class="container px-8 lg:px-32 xl:px-40 mx-auto p-8 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="flex items-center">
                            <img class="w-24 h-24" src="https://cdn2.iconfinder.com/data/icons/charity-31/512/CharityIcons-50-512.png" alt="">
                            <div class="ml-4 mt-2">
                                <h1 class="text-xl font-semibold">YoPet</h1>
                                <p class=" opacity-60 font-thin">Adopt your next pet and give them second chance at life.</p>
                            </div>
                        </div>
                        <div class="mt-8 text-center md:text-left">
                            <h1 class="font-semibold text-xl">Information</h1>
                            <p class=" opacity-60 mt-2 font-thin">Website ini dibuat untuk memenuhi tugas besar mata kuliah Rekayasa Perangkat Lunak 2 Universitas Komputer Indonesia.</p>
                        </div>
                        <div class="mt-8 text-center md:text-left">
                            <h1 class="font-semibold text-xl">Anggota Kelompok :</h1>
                            <ul class="opacity-60 mt-2 font-thin">
                                <li>10119142 - Mochammad Rafy Ardhanie</li>
                                <li>10119143 - Ade Kurniawan</li>
                                <li>101191 - Muhamad Farid Laksmana</li>
                                <li>10119147 - Juliadit Syahputra</li>
                                <li>10119152 - Resa Endrawan</li>
                                <li>10119167 - Siddiq Sanjaya Bakti</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p class="text-center text-white py-4 bg-slate-800">
                    &copy; Copyright 2022 : Adopt Pet | All Rights Reserved
                </p>
            </footer>
</body>

</html>
<?php
if(!empty($_SESSION["loggedin"])){
    if(isset($_GET['delete'])){
        $removepost = $_GET['delete'];
        $post = new post();
        //init check its have or no
        $cek = $post->remove($removepost,$_SESSION['iduser'],$_SESSION['username'],$_SESSION['level']);
        if($cek=="oke"){
            sleep(2);
            header("location: /");
        }elseif($cek=="gagal"){
            header("location: /");
        }
    }

}
?>
        <!-- header -->
        <div class="bg-white">
            <main class="my-4">
                <div class="container mx-auto">
                    <div class="md:flex mt-8 md:-mx-4">
                        <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('/view/images/cat.jpg')">
                            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                <div class="px-10 max-w-xl">
                                    <h2 class="text-2xl text-white font-semibold">Adopt a pet</h2>
                                    <p class="mt-2 text-gray-400"></p>
                                    <a href="?page=adoptpet" class="flex items-center mt-4 text-white text-sm uppercase font-semibold rounded hover:underline focus:outline-none">
                                        <span>Adopt Now</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('/view/images/rabbit.jpg')">
                            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                <div class="px-10 max-w-xl">
                                    <h2 class="text-2xl text-white font-semibold">Post a pet</h2>
                                    <p class="mt-2 text-gray-400"></p>
                                    <a href="?page=postpet" class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                        <span>Post Now</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
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
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <!-- items 1 -->
                        <?php
                        $db = dbconnect();
                        $post = new post();
                        $verify = new verify();
                        $page = isset($_GET['ipage'])? (int)$_GET["ipage"]:1;
                        $limit = 10;
                        $start = ($page>1) ? ($page * $limit) - $limit : 0;
                        $sql = $db->query("SELECT `post_adopt`.*
                        FROM `post_adopt`");
                        $total = mysqli_num_rows($sql);
                        $pages = ceil($total/$limit);
                        
                        
                        $data = $post->dashboard($start,$limit);
                        foreach ($data as $datas) {
                            $img  = $post->dashimg($datas['id_post_adopt']);
                        ?>
                        <!-- //mulai sini -->
                        <div class="max-w-full my-4 overflow-hidden bg-white rounded-lg shadow-lg">
                            <a href="?page=adopt-details&adopt-post<?php echo $datas['id_post_adopt']; ?>">
                                <img class="object-cover object-center w-full h-56" src="<?php echo $img[0]; ?>" alt="avatar">
                                <div class="flex items-center justify-between px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500">
                                    <h1 class="font-semibold text-white"><span><?php echo $datas['title_post_adopt']; ?> </span></h1>
                                    <!-- aaaa -->
                                    <?php if($_SESSION['level'] == "admin" OR $_SESSION['iduser']== $datas['id_user']){
                                     ?>
                                    <div class="flex md:order-2">
                                            <div class="relative inline-block dropdown">
                                                
                                                <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                                  <span class="mr-1"></span>
                                                  <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                                </button>
                                                <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                                    <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?delete=<?php echo $datas['id_post_adopt']; ?> ">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- aaaaa -->
                                    <?php } ?>
                                </div>
                                <div class="px-6 py-4">
                                    <div class="flex items-center justify-between">            
                                        
                                    </div>
                                    <ul class="flex gap-4 py-2 text-sm text-gray-700 list-disc list-inside">
                                        <li><?php echo $datas['animal_age']; ?> Month</li>
                                        <li><?php echo $datas['animal_gender'];?></li>
                                        <li><?php echo $datas['animal_size'];?> Kg</li>
                                    </ul>
                                    <div class="flex items-center mt-2 text-gray-700">
                                        <svg class="w-6 h-6 fill-current" viewBox="0 0 512 512">
                                        <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                                    </svg>
                                        <h1 class="px-2 text-sm">Bandung, Indonesia</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- //berhenti sini -->
                        <?php } ?>
                    </div>

                </div>
            </div>

            <!-- See more button -->
            
            <ul class="mb-6 mt-4 flex justify-center mx-auto my-8">
                <?php 
                    for ($i=1; $i<=$pages ; $i++){
                ?>
                <li class="px-3 py-2 mx-1 text-gray-700 rounded-lg <?php if($page==$i) echo "bg-gradient-to-r from-cyan-500 to-blue-500"; echo "bg-gray-200 rounded-lg hover:bg-gray-700"; ?>  hover:text-gray-200 ">
                    <a class="" href="?ipage=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
            </ul>




        </div>

        
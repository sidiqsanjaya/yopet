<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }    
if(empty($_SESSION["loggedin"])){
    header("location: /?page=signin");
    die;
}
$account = new account();
$post = new post();
$profile = $account->profile($_SESSION['iduser'],$_SESSION['username'],$_SESSION['email']);
$profpost= $post->profilepost($_SESSION['iduser']);
$profform= $post->profileforum($_SESSION['iduser']);

if(isset($_GET['deletep'])){
    $removepost = $_GET['deletep'];
    $post = new post();
    //init check its have or no
    $cek = $post->removepost($removepost,$_SESSION['iduser'],$_SESSION['username'],$_SESSION['level']);
    if($cek=="oke"){
        sleep(2);
        header("location: /?page=profile");
    }elseif($cek=="gagal"){
        header("location: /?page=profile");
    }
}

if(isset($_GET['deletef'])){
    $removepost = $_GET['deletef'];
        $post = new post();
        //init check its have or no
        $cek = $post->removeforum($removepost,$_SESSION['iduser'],$_SESSION['username'],$_SESSION['level']);
        if($cek=="oke"){
            sleep(2);
            header("location: /?page=profile");
        }elseif($cek=="gagal"){
            header("location: /?page=profile");
        }
}

?>
        <div class="flex justify-end mt-16">
            <a href="?page=edit-profile" class="px-4 py-2 text-white rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500">Edit Profile</a>
        </div>
        <section class="flex items-center justify-center profile">
            <div class="identity">
                <h1 class="text-xl tracking-wide text-center"><?php echo htmlspecialchars($profile['fullname']);?></h1>
                <p class="text-center"><?php echo htmlspecialchars("0".$profile['number_phone']);?></p>
                <p class="text-center text-slate-500"><?php echo $profile['city'];?></p>
                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div class="">
                        <p class="text-center">Post Adoption</p>
                        <h1 class="text-2xl font-semibold text-center"><?php echo $profile['jpost'];?></h1>
                    </div>
                    <div class="">
                        <p class="text-center">Post Forum</p>
                        <h1 class="text-2xl font-semibold text-center"><?php echo $profile['jforum'];?></h1>
                    </div>
                </div>
            </div>
        </section>
        <hr class="my-6">
 
        <div class="flex justify-between">
            <h1 class="text-xl font-semibold md:text-2xl">Post Adoption</h1>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- items 1 -->
            <?php
            foreach ($profpost as $datas) {$img  = $post->dashimg($datas['id_post_adopt']);
            if($datas['id_post_adopt'] != NULL){
            ?>
            <div class="max-w-full my-4 overflow-hidden bg-white rounded-lg shadow-lg">
                <a href="?page=adopt-details&adopt-post=<?php echo htmlspecialchars($datas['id_post_adopt']); ?>">
                    <img class="object-cover object-center w-full h-56" src="<?php echo htmlspecialchars($img[0]); ?>" alt="avatar">
                    <div class="flex items-center justify-between px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500">
                        <h1 class="font-semibold text-white"><?php echo htmlspecialchars($datas['category_animal']); ?> <span> : </span> <span><?php echo htmlspecialchars($datas['title_post_adopt']); ?></span></h1>
                        <?php if(!empty($_SESSION['loggedin'])){if($_SESSION['level'] == "admin" OR $_SESSION['iduser']== $datas['id_user']){
                                     ?>
                        <div class="flex md:order-2">
                                <div class="relative inline-block dropdown">
                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                      <span class="mr-1"></span>
                                      <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                        <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?page=profile&deletep=<?php echo $datas['id_post_adopt']; ?>">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }} ?>
                    </div>
                    <div class="px-6 py-4">  
                        <ul class="flex gap-4 py-2 text-sm text-gray-700 list-disc list-inside">
                            <li><?php echo htmlspecialchars($datas['animal_age']); ?> Month</li>
                            <li><?php echo htmlspecialchars($datas['animal_gender']);?></li>
                            <li><?php echo htmlspecialchars($datas['animal_size']);?> Kg</li>
                        </ul>
                        <div class="flex items-center mt-2 text-gray-700">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 512 512">
                            <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                        </svg>
                            <h1 class="px-2 text-sm"><?php echo $profile['city'];?></h1>
                        </div>
                    </div>
                </a>
            </div>
            <?php }} ?>
        </div>

        <div class="flex justify-between mt-6">
            <h1 class="text-xl font-semibold md:text-2xl">Forum</h1>
        </div>

        <?php
            foreach ($profform as $dataf) {
            ?>
            <!-- posting -->
            <div class="mt-8 posting">
                <div class="border rounded-xl">
                    <div class="px-6 py-4 post">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-semibold"><?php echo htmlspecialchars($profile['fullname']);?></h1>
                            <?php if(!empty($_SESSION)){if($_SESSION['level'] == "admin" OR $_SESSION['iduser'] == $dataf['id_user']){ ?>
                            <div class="flex md:order-2">
                                <div class="relative inline-block dropdown">
                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                      <span class="mr-1"></span>
                                      <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                        <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?page=profile&deletef=<?php echo $dataf['id_forum']; ?>">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        <p class="mt-2"><?php echo htmlspecialchars($dataf['content_post']); ?></p>

                </div>
            </div>
            <?php } ?>

        <div class="mb-12"></div>

        </section>

</body>

</html>
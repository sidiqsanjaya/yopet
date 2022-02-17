<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }    
if(empty($_SESSION["loggedin"])){
    header("location: /?page=signin");
    die;
}

$account = new account();
$profile = $account->profile($_SESSION['iduser'],$_SESSION['username'],$_SESSION['email']);

$post = new post();
$profpost= $post->profilepost($_SESSION['iduser']);
$profform= $post->profileforum($_SESSION['iduser']);

?>
        <div class="flex justify-end mt-16">
            <a href="editprofile" class="px-4 py-2 text-white rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500">Edit Profile</a>
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
            foreach ($profpost as $datas) {$img  = $post->dashimg($datas['id_post_adopt']);?>
            <div class="max-w-full my-4 overflow-hidden bg-white rounded-lg shadow-lg">
                <a href="?page=adopt-details&adopt-post=<?php echo htmlspecialchars($datas['id_post_adopt']); ?>">
                    <img class="object-cover object-center w-full h-56" src="<?php echo htmlspecialchars($img[0]); ?>" alt="avatar">
                    <div class="flex items-center justify-between px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500">
                        <h1 class="font-semibold text-white">Cat <span> : </span> <span>Persian</span></h1>
                        <a class="tracking-wide text-white hover:text-blue-300" href="#">Detail</a>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h1 class="text-2xl font-semibold text-gray-800">Ade Kurniawan</h1>
                            <div class="flex md:order-2">
                                <div class="relative inline-block dropdown">
                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                      <span class="mr-1"></span>
                                      <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                        <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="flex gap-4 py-2 text-sm text-gray-700 list-disc list-inside">
                            <li>18 Month</li>
                            <li>Male</li>
                            <li>2.8 Kg</li>
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
            <?php } ?>
            

        </div>

        <div class="flex justify-between mt-6">
            <h1 class="text-xl font-semibold md:text-2xl">Post Adoption</h1>
        </div>

        <div class="mt-4 posting">
            <div class="border rounded-xl">
                <div class="px-6 py-4 post">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-semibold">Juliadit Syahputri</h1>
                        <div class="flex md:order-2">
                            <div class="relative inline-block dropdown">
                                <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                  <span class="mr-1"></span>
                                  <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                </button>
                                <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                    <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <p class="mt-2">kenapa ya ko kucing saya tidak suka pada saya? padahal saya udah ngasih perhatian banget ke dia sampai saya udah jatuh cinta sama dia? ga bales = pki</p>




                </div>
            </div>
        </div>

        <div class="mb-12"></div>

        </section>

</body>

</html>
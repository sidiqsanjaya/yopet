<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
 
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
                            <a href="?page=adopt-details&adopt-post=<?php echo htmlspecialchars($datas['id_post_adopt']); ?>">
                                <img class="object-cover object-center w-full h-56" src="<?php echo htmlspecialchars($img[0]); ?>" alt="avatar">
                                <div class="flex items-center justify-between px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500">
                                    <h1 class="font-semibold text-white"><span><?php echo htmlspecialchars($datas['title_post_adopt']); ?> </span></h1>
                                    <!-- aaaa -->
                                    <?php if(!empty($_SESSION['loggedin'])){if($_SESSION['level'] == "admin" OR $_SESSION['iduser']== $datas['id_user']){
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
                                    <?php }} ?>
                                </div>
                                <div class="px-6 py-4">
                                    <div class="flex items-center justify-between">            
                                        
                                    </div>
                                    <ul class="flex gap-4 py-2 text-sm text-gray-700 list-disc list-inside">
                                        <li><?php echo htmlspecialchars($datas['animal_age']); ?> Month</li>
                                        <li><?php echo htmlspecialchars($datas['animal_gender']);?></li>
                                        <li><?php echo htmlspecialchars($datas['animal_size']);?> Kg</li>
                                    </ul>
                                    
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
                    <a class="" href="?page=more-adopt&ipage=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
            </ul>
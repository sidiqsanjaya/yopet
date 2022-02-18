<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
}
$post = new post();
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){  
    $url = "https://";   
}else{  
    $url = "http://";
}      
    $url.= $_SERVER['HTTP_HOST'];     
    $url.= $_SERVER['REQUEST_URI'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_SESSION['loggedin'])){
        header("location: ?page=signin");
    }else{
        $aaa = $post->savecommentpost(htmlspecialchars($_SESSION['iduser']),htmlspecialchars($_GET['adopt-post']),htmlspecialchars(htmlspecialchars($_POST['comment'])));  
        $inpost  = $_GET['adopt-post']; 
        header("location: ?page=adopt-details&adopt-post=".$inpost);     
    }
}
if(!empty($_GET['adopt-post']) && !empty($_GET['deletec'])){
    $removec = $_GET['deletec'];
    $inpost  = $_GET['adopt-post'];
    $cek = $post->deletecompot($inpost,$_SESSION['iduser'],$_SESSION['username'],$_SESSION['level'],$removec);
    if($cek=="oke"){
        header("location: ?page=adopt-details&adopt-post=".$inpost);
    }elseif($cek=="gagal"){
        header("location: ?page=adopt-details&adopt-post=".$inpost);
    }
}

if(trim($_GET['adopt-post'])!=""){
    $detailpost = $post->adoptdetail($_GET['adopt-post']);
    if($detailpost == "notfound"){
        header("location: /");
    }else{
        $img = $post->dashimg($detailpost[0]);
        $imgfull = $post->fullimg($detailpost[0]);
        $comment = $post->loadcommentpost($_GET['adopt-post']);
    }      
}else{
    header("location: /");
}
?>
<!-- component -->
        <div class="grid grid-cols-1 gap-0 mt-2 lg:grid-cols-3 lg:gap-4 lg:mt-12">
            <div class="min-w-full">
                <img class="object-cover w-full h-full rounded-lg max-h-64 md:max-h-96" src='<?php echo htmlspecialchars($img[0]);?> ' alt='images'>
            </div>
            <div class="col-span-2 mt-4 lg:mt-0">
                <div class="flex justify-between">
                    <p class="text-2xl font-semibold">
                        <?php echo htmlspecialchars($detailpost[2]); ?>
                    </p>
                    <p class="flex items-center text-slate-500"><?php echo htmlspecialchars($detailpost[4]); ?></p>
                </div>
                <h2 class="mt-2">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="Type bg-lime-100 p-4 rounded-xl">
                            <h1 class="text-xl text-cyan-600">Age</h1>
                            <p><?php echo htmlspecialchars($detailpost[5]); ?> Month</p>
                        </div>


                        <div class="Type bg-violet-100 p-4 rounded-xl">
                            <h1 class="text-xl text-cyan-600">Sex</h1>
                            <p><?php echo htmlspecialchars($detailpost[7]); ?></p>
                        </div>

                        <div class="Type bg-orange-100 p-4 rounded-xl">
                            <h1 class="text-xl text-cyan-600">Weight</h1>
                            <p><?php echo htmlspecialchars($detailpost[6]); ?> Kg</p>
                        </div>

                    </div>

                    <div class="">

                    </div>
                </h2>
                <p class="mt-2 text-lg text-justify text-gray-500 mt-4"> <?php echo $detailpost[3]; ?>
                </p>

                <div class="grid md:grid-cols-4 grid-cols-2 gap-1 mt-4">
                    <div class="">
                        <button  onclick="shareinsocialmedia('https://api.whatsapp.com/send?phone=+62<?php echo htmlspecialchars($detailpost['number_phone']); ?>&text=Halo, saya tertarik dengan <?php echo htmlspecialchars($detailpost[2]);?> yang berasal dari postingan adopt YoPet')" class="bg-gradient-to-r from-green-400 to-green-500 text-white  py-2 px-4 rounded-lg inline-flex w-full items-center">
                            <img class="w-8" src="view/icon/whatsapp.svg" alt="">
                            <span class="ml-2">Chat via whatsapp</span>
                          </button>
                    </div>

                    <div class="">
                        <button onclick="shareinsocialmedia('http://www.facebook.com/sharer.php?u=<?php echo $url; ?>&title=<?php echo htmlspecialchars($detailpost[2]);; ?>')" href=""  class="bg-gradient-to-r from-blue-400 to-blue-600 text-white  py-2 px-4 rounded-lg inline-flex w-full items-center">
                            <img class="w-8" src="view/icon/facebook.svg" alt="">
                            <span class="ml-2">Share to Facebook</span>
                          </button>
                    </div>

                    <div class="">
                        <button onclick="setClipboard('<?php echo $url; ?>')" class="bg-gradient-to-r from-gray-300 to-gray-400 text-white  py-2 px-4 rounded-lg inline-flex w-full items-center">
                            <img class="w-8" src="view/icon/copy.svg" alt="">
                            <span class="ml-2">Copy to clipboard</span>
                          </button>
                    </div> 
</div>           
            </div>
        </div>

        <!-- Galleries -->
        <section class="mt-12">
            <div class="">
                <h1 class="font-semibold text-xl text-center my-4">Galleries</h1>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <?php  foreach ($imgfull as $datas) { ?>
                <img class="object-cover h-32 w-96 rounded-lg" src="<?php echo htmlspecialchars($datas['photo_img_post']); ?>" alt="">
                <?php } ?>
            </div>
        </section>

        <!-- Discussion -->
        <section class="bg-gray-50 p-4 mt-12 rounded-xl">

            <div class="discussion">
                <h1 class="text-xl font-semibold mb-4 text-center  ">Discussion</h1>
                <div class="border mb-6 rounded-lg">
                    <form action="?page=adopt-details&adopt-post=<?php echo $_GET['adopt-post']; ?>" class="" method="POST">
                        <div class="flex items-center py-2">
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-4 leading-tight  focus:outline-none" type="text" name="comment" placeholder="Write a comment" aria-label="Full name">
                            <button class="flex-shrink-0 mr-4 bg-gradient-to-r from-cyan-500 to-blue-500 text-white py-2 px-6 rounded" type="submit">
                          submit
                        </button>
                        </div>
                    </form>
                </div>
                <?php 
                foreach ($comment as $datac) {
                ?>
                <div class="mb-6 px-4 py-2 mt-4 border rounded-lg">
                    <p>
                        <div class="flex items-center justify-between">
                            <h1 class="font-semibold"><?php echo htmlspecialchars($datac['fullname']); ?></h1>
                            <?php if(!empty($_SESSION['loggedin'])){if($_SESSION['level'] == "admin" OR $_SESSION['iduser']== $datac['id_user']){
                                     ?>
                                    <div class="flex md:order-2">
                                            <div class="relative inline-block dropdown">
                                                
                                                <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                                  <span class="mr-1"></span>
                                                  <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                                </button>
                                                <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                                    <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?page=adopt-details&adopt-post=<?php echo $_GET['adopt-post'];?>&deletec=<?php echo $datac['id_comment']; ?> ">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- aaaaa -->
                                    <?php }} ?>
                            
                        </div>
                        <p class="text-gray-400"><?php echo htmlspecialchars($datac['date_comment']); ?></p>
                    </p>
                    <p class="mt-2"><?php echo htmlspecialchars($datac['content_comment']); ?></p>
                </div>
                <?php } ?>
        </section>
        </div>
    </div>
</body>
<script type="text/javascript" async >
    function shareinsocialmedia(url){
    window.open(url,'sharein','toolbar=0,status=0,width=648,height=395');
    return true;
    }
</script>
<script>
function setClipboard(value) {
    var tempInput = document.createElement("input");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = value;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
}
</script>
</html>
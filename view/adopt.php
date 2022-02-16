<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
}
$post = new post();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_SESSION['loggedin'])){
        header("location: ?page=signin");
    }else{
        $aaa = $post->savecommentpost(htmlspecialchars($_SESSION['iduser']),htmlspecialchars($_GET['adopt-post']),htmlspecialchars(htmlspecialchars($_POST['comment'])));
        
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
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-0 lg:gap-4 mt-2 lg:mt-12">
            <div class="min-w-full">
                <img class="w-full h-full object-cover max-h-64 md:max-h-96 rounded-lg" src='<?php echo htmlspecialchars($img[0]);?> ' alt='images'>
            </div>
            <div class="col-span-2 mt-4 lg:mt-0">
                <div class="flex justify-between">
                    <p class="text-2xl font-semibold">
                        <?php echo htmlspecialchars($detailpost[2]); ?>
                    </p>
                    <p class="text-slate-500 flex items-center"><?php echo htmlspecialchars($detailpost[4]); ?></p>
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
                <p class="text-lg text-gray-500 mt-2 text-justify"> <?php echo $detailpost[3]; ?>
                </p>

                <div class="flex justify-between">
                    <div class=""></div>
                    <div class="">
                        <button onclick="location.href='https://api.whatsapp.com/send?phone=+62<?php echo htmlspecialchars($detailpost[9]); ?>&text=Halo, saya tertarik dengan <?php echo htmlspecialchars($detailpost[2]);?> yang berasal dari postingan adopt YoPet'" class="px-6 rounded-full mt-4 py-3 bg-green-600 hover:bg-green-700 text-white">
                    Chat via Whatsapp
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
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-4 leading-tight  focus:outline-none" type="text" name="comment" placeholder="Write a comment" aria-label="Full name" required>
                            <button class="flex-shrink-0 mr-4 bg-gradient-to-r from-cyan-500 to-blue-500 text-white py-2 px-6 rounded" type="submit">
                          submit
                        </button>
                        </div>
                    </form>
                </div>
                <?php 
                foreach ($comment as $datac) {
                ?>
                <div class="border px-4 py-2 mt-4 rounded-lg">
                    <p>
                        <div class="flex justify-between">
                            <h1 class="font-semibold"><?php echo htmlspecialchars($datac['fullname']); ?></h1>
                            <p class="text-slate-500"><?php echo htmlspecialchars($datac['date_comment']); ?></p>
                        </div>
                    </p>
                    <p class="mt-2"><?php echo htmlspecialchars($datac['content_comment']); ?></p>
                </div>
                <?php } ?>
        </section>
        </div>
    </div>
</body>

</html>
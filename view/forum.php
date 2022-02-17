<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
}
$db = dbconnect();
$post = new post();
$verify = new verify();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_POST['search'])){
        if(empty($_POST['search'])){
            if(empty($_SESSION['loggedin'])){
                header("location: ?page=signin");
            }elseif($_POST['type'] == "forum"){
                if(!empty($_POST['comment'])){
                    $post->createforum(htmlspecialchars($_SESSION['iduser']),htmlspecialchars($_POST['comment']));
                    header("location: /?page=forum"); 
                } else{
                    header("location: /?page=forum");
                }
            }elseif($_POST['type'] == "comment"){
                if(!empty($_POST['comment']) AND !empty($_POST['forum'])){
                    $post->savecommentforum($_SESSION['iduser'],htmlspecialchars($_POST['forum']),htmlspecialchars($_POST['comment']));
                    header("location: /?page=forum");
                }else{
                    header("location: /?page=forum");
                }     
            }
        }else{
            header("location: /?page=forum");
        }
    }else{
        $data = $post->loadforum(0,20,"search",$_POST['search']);
    }
}else{   
    $page = isset($_GET['ipage'])? (int)$_GET["ipage"]:1;
    $limit = 10;
    $start = ($page>1) ? ($page * $limit) - $limit : 0;
    $sql = $db->query("SELECT `forum`.`id_user` FROM `forum`");
    $total = mysqli_num_rows($sql);
    $pages = ceil($total/$limit);
    $data = $post->loadforum($start,$limit,"full",NULL);
}
if(isset($_GET['deletef'])){
    $removepost = $_GET['deletef'];
        $post = new post();
        //init check its have or no
        $cek = $post->removeforum($removepost,$_SESSION['iduser'],$_SESSION['username'],$_SESSION['level']);
        if($cek=="oke"){
            sleep(2);
            header("location: /?page=forum");
        }elseif($cek=="gagal"){
            header("location: /?page=forum");
        }
}
if(isset($_GET['deletec']) AND isset($_GET['idforum'])){
    $removec = $_GET['deletec'];
    $inforum    = $_GET['idforum'];
        $post = new post();
        //init check its have or no
        $cek = $post->removecommentforum($inforum,$_SESSION['iduser'],$_SESSION['username'],$_SESSION['level'],$removec);
        if($cek=="oke"){
            header("location: ?page=forum");
        }elseif($cek=="gagal"){
            header("location: ?page=forum");
        }
    
}
?>
        <section>
            <form action="?page=forum" method="POST">
            <div class="WriteForum">
                <textarea class="border-transparent focus:border-blueGray-500 px-4 py-2.5 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 w-full bg-gray-200 mt-4 rounded-lg ease-in-out placeholder-gray-600"
                    name="comment" id="desc" cols="32" rows="3" placeholder="Write a Forum"></textarea>
                <div class="flex flex-row-reverse p-3">
                    <div class="flex-initial pl-3">
                        <input type="hidden" name="type" value="forum">
                        <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-gradient-to-r from-cyan-500 to-blue-500 rounded-md hover:bg-gray-800  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out"> 
                             <span class="mx-1">Submit</span>
                          </button>
                    </div>
                </div>
            </div>
            </form>
            <div class="border-t mt-2"></div>

            <?php
            foreach ($data as $dataf) {
                $reply = $post->loadcommentforum($dataf['id_forum']);
            ?>
            <!-- posting -->
            <div class="mt-8 posting">
                <div class="border rounded-xl">
                    <div class="px-6 py-4 post">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-semibold"><?php echo htmlspecialchars($dataf['fullname']); ?></h1>
                            <?php if(!empty($_SESSION)){if($_SESSION['level'] == "admin" OR $_SESSION['iduser'] == $dataf['id_user']){ ?>
                            <div class="flex md:order-2">
                                <div class="relative inline-block dropdown">
                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                      <span class="mr-1"></span>
                                      <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                        <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?page=forum&deletef=<?php echo $dataf['id_forum']; ?>">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        <p class="mt-2"><?php echo htmlspecialchars($dataf['content_post']); ?></p>
                        
                        <?php foreach ($reply as $datar){ ?>
                        
                        <div class="px-4 py-2 mt-4 border rounded-lg">
                    
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-semibold"><?php echo htmlentities($datar['fullname']); ?></h1>

                            <?php if(!empty($_SESSION)){if($_SESSION['level'] == "admin" OR $_SESSION['iduser'] == $datar['id_user']){ ?>
                                
                            <div class="flex md:order-2">
                                <div class="relative inline-block dropdown">
                                    <button class="inline-flex items-center px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded">
                                      <span class="mr-1"></span>
                                      <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                    </button>
                                    <ul class="absolute hidden pt-1 text-gray-600 dropdown-menu">
                                        <li class=""><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-red-500 hover:text-white" href="?page=forum&deletec=<?php echo $datar['id_comment']."&idforum=".$dataf['id_forum']; ?>">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        <p class="text-gray-400"><?php echo htmlentities($datar['date_comment']); ?></p>
                    </p>
                    <p class="mt-2"><?php echo htmlentities($datar['content_comment']); ?></p>
                </div>
                        <?php } ?>
                        <form action="?page=forum" method="POST">
                            <div class="flex gap-4 mt-8">
                                <input class="w-full bg-gray-200 border-none rounded-lg" placeholder="Write a comment" type="text" name="comment">
                                <input type="hidden" name="type" value="comment">
                                <input type="hidden" name="forum" value="<?php echo $dataf['id_forum']; ?>">
                                <button class="px-6 text-white rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
        <?php if(!isset($_POST['search'])){ ?>
        <ul class="mb-6 mt-4 flex justify-center mx-auto my-8">
                <?php 
                    for ($i=1; $i<=$pages ; $i++){
                ?>
                <li class="px-3 py-2 mx-1 text-gray-700 rounded-lg <?php if($page==$i) echo "bg-gradient-to-r from-cyan-500 to-blue-500"; echo "bg-gray-200 rounded-lg hover:bg-gray-700"; ?>  hover:text-gray-200 ">
                    <a class="" href="?page=forum&ipage=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
            </ul>
        <?php } ?>
        </div>
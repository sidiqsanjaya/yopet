<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
 
if(!empty($_SESSION["loggedin"])){
    header("location: /");
    die;
}
$check1=$check2=$check3="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //call validate class
    $verify = new verify();

    $checkfullname = $verify->checkusermail($_POST['inputusermail']);
    if($checkfullname == "empty"){
        $check1 = "data kosong"; //harusnya ada warning
    }

    $checkpassword = $verify->checkpassword($_POST['inputpassword']) ;
    if($checkpassword == "empty"){
        $check2 = "data kosong"; //harusnya ada warning
    }elseif($checkpassword == "notenough"){
        $check2 = "password kurang 8 angka";
    }

    if(empty($check1.$check2)){
        $login = new signup();
        $logincheck = $login->login($_POST['inputusermail'],$_POST['inputpassword']);
        if($logincheck != "failed"){
            //create session
             session_start();
             $_SESSION['loggedin'] = true;
             $_SESSION['iduser']   = $logincheck[0];
             $_SESSION['email']    = $logincheck[1];
             $_SESSION['username'] = $logincheck[2];
             $_SESSION['level']    = $logincheck[3];
             $_SESSION['time_login'] = time();

             $check3 = "redirect in 3 second";
             sleep(3);
             header("location: /");
        }else{
            $check3 = "check again you input";
        }
    }
}
?>
<body>
    <!-- component -->
    <div class="h-screen md:flex">
        <div class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-cyan-500 to-blue-500 i justify-around items-center hidden">
            <div>
                <h1 class="text-white font-bold text-4xl font-sans">YoPet</h1>
                <p class="text-white mt-1">Adopt your next pet and give them second chance at life.</p>
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            <form action="?page=signin" method= "POST" class="bg-white">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Sign in to Yopet.</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Don't have an account? <a class="text-blue-500" href="?page=signup">Register</a></p>
                <?php
                echo $check1." | ".$check2." | ".$check3;
                ?>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
					</svg>
                    <input class="pl-2 outline-none border-none" type="text" name="inputusermail" id="" <?php if(isset($_POST['inputusermail']) == true){echo 'value="'.$_POST['inputusermail'].'"';} ?> required placeholder="Username or Email" />
                </div>

                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
                    <input class="pl-2 outline-none border-none" type="password" name="inputpassword" id="" <?php if(isset($_POST['inputpassword']) == true){echo 'value="'.$_POST['inputpassword'].'"';} ?> required placeholder="Password" />
                </div>
                <button type="submit" class="block w-full bg-gradient-to-r from-cyan-500 to-blue-500 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Sign in</button>

            </form>
        </div>
    </div>
</body>

</html>
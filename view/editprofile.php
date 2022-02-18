<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }    
if(empty($_SESSION["loggedin"])){
    header("location: /?page=signin");
    die;
}
$check1=$check2=$check3=$check4="";
$account= new account();
$profile = $account->profile($_SESSION['iduser'],$_SESSION['username'],$_SESSION['email']);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //call validate class
    $verify = new verify();
    
    $checkfullname = $verify->checkfullname(htmlspecialchars($_POST['inputfullname']));
    if($checkfullname == "empty"){
        $check1 = "blank data";
    }else{
        $cek = $account->updateprofile($_SESSION['iduser'],$_SESSION['email'],$_SESSION['username'],"fullname",htmlspecialchars($_POST['inputfullname']));
    }

    $checknumber = $verify->checknumber(htmlspecialchars($_POST['inputnumber'])) ;
    if($checknumber == "empty"){
        $check2 = "blank data";
    }elseif($checknumber == "notinteger"){
        $check2 = "the number entered is the letter";
    }elseif($checknumber == "range"){
        $check2 = "the number entered is invalid";
    }else{
        $cek = $account->updateprofile($_SESSION['iduser'],$_SESSION['email'],$_SESSION['username'],"number_phone",htmlspecialchars($_POST['inputnumber']));
    }

    $checkcity = $verify->checkcity(htmlspecialchars($_POST['inputcity']));
    if($checkcity == "empty"){
        $check3 = "blank data";
    }else{
        $cek = $account->updateprofile($_SESSION['iduser'],$_SESSION['email'],$_SESSION['username'],"city",htmlspecialchars($_POST['inputcity']));
    }

    $checkpassword = $verify->checkpassword(htmlspecialchars($_POST['inputpassword']));
    if($checkpassword == "empty"){
        $check4 = "blank data";
    }elseif($checkpassword == "notenough"){
        $check4 = "Should be at least 8 characters";
    }else{
        //$cek = $account->updateprofile($_SESSION['iduser'],$_SESSION['email'],$_SESSION['username'],"password",htmlspecialchars(md5($_POST['inputpassword'])));
    }

    header("location: /?page=edit-profile&update=done");
}

?>
        <div class="mt-5 bg-white border rounded-lg shadow">
            <div class="mt-2">
                <div class="">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Edit Profile</h1>
                        </div>
                    </div>
                    <div class="px-5">
                    <?php
                    if(!empty($_GET['update'])){ ?>
                        <div class="mx-6 mb-3">
                            <p class="py-2 px-4 bg-green-600 rounded-lg text-white">Update info successful </p>
                        </div>
                        <?php } ?>
                    </div>
                    <form action="?page=edit-profile" method="POST">
                    <div class="px-5 pb-5">
                        <input type="text" name="inputfullname" id="" value="<?php echo htmlspecialchars($profile['fullname']);?>" required placeholder="Change FullName" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                        <?php if(!empty($check1)){ ?>
                        <div class="flex justify-end">
                            <p class="text-red-600">Username already exist</p>
                        </div>
                        <?php } ?>
                        <input type="text" pattern="[0-9]+" name="inputnumber" id="" value="<?php echo htmlspecialchars("0".$profile['number_phone']);?>" required  placeholder="Change PhoneNumber" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                        <?php if(!empty($check2)){ ?>
                        <div class="flex justify-end">
                            <p class="text-red-600">please enter 9 - 13 digits phone numbers.</p>
                        </div>
                        <?php } ?>
                        <input type="text" name="inputcity" id="" value="<?php echo $profile['city'];?>" required placeholder="Change City" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                        <?php if(!empty($check3)){ ?>
                        <div class="flex justify-end">
                            <p class="text-red-600">the city form cannot be empty</p>
                        </div>
                        <?php } ?>
                        <input type="text" name="inputpassword" placeholder="leave it blank if you don't change the password" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                        <?php if($check4 == "notenough"){ ?>
                        <div class="flex justify-end">
                            <p class="text-red-600">Should be at least 8 characters</p>
                        </div>
                        <?php } ?>
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
                    </form>
                </div>
            </div>
        </div>


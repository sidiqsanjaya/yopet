<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
 
if(empty($_SESSION["loggedin"])){
    header("location: /");
    die;
}
$check1=$check2=$check3=$check4=$check5="";
$info = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //phpinfo();
    $verify = new verify();
    //call session and idpost
    $iduser = $_SESSION['iduser'];
    $idpost = substr(md5(time()), 0, 7);
    $check1 = $verify->checktitle($_POST['inputtitle']); 
    $check2 = $verify->checkdesc($_POST['inputdesc']);
    $check3 = $verify->checkageweight($_POST['inputage']);
    $check4 = $verify->checkageweight($_POST['inputweight']);
    $check5 = $verify->checkgender($_POST['gender']);

    if(empty($check1.$check2.$check3.$check4.$check5) == true){
        
        $post = new forumpost($iduser,$idpost,htmlspecialchars($_POST['inputtitle']),htmlspecialchars($_POST['inputdesc']),htmlspecialchars($_POST['inputage']),htmlspecialchars($_POST['inputweight']),htmlspecialchars($_POST['gender']));
        $post->createapost();

        $upload = new post();
        $countimg = count($_FILES['inputfile']['name']); 
        $no   = 0;
        $true = 0;
        for($i=0;$i<$countimg;$i++){
            $no   = $no + 1;
            $filename = 'view/img/'.$idpost.$_FILES['inputfile']['name'][$i];
            $a = $upload->uploadimg($idpost,$filename);
            $true = $true + $a;
            move_uploaded_file($_FILES['inputfile']['tmp_name'][$i],$filename);
            if($countimg == $no){
                if($true == $countimg){
                    $info = "Post successfully entered, will be moved to dashboard";
                    sleep(3);
                    header("location: /");
                }else{
                    $info = "post failed to enter, try again";
                    if($countimg == $no){
                        for($a=0;$a<$countimg;$a++){
                            $fileimg = 'view/img/'.$idpost.$_FILES['inputfile']['name'][$a];
                            unlink($fileimg);
                        }
                    }
                }
            }
        }
    }
}
?>

        <div class="mt-5 bg-white rounded-lg shadow border">
            <div class="mt-12">
                <div class="">
                <form action='?page=postpet' method='POST' enctype='multipart/form-data'>
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Post your pet</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <input type="text" placeholder="Title" name="inputtitle" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400" <?php if(isset($_POST['inputtitle']) == true){echo 'value="'.$_POST['inputtitle'].'"';} ?> required>
                        <textarea class="border-transparent focus:border-blueGray-500 px-4 py-2.5 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 w-full bg-gray-200 mt-4 rounded-lg ease-in-out placeholder-gray-600"
                            name="inputdesc" id="desc" cols="32" rows="3" placeholder="Description"  required><?php if(isset($_POST['inputdesc']) == true){echo $_POST['inputdesc'];} ?></textarea>
                        <div class="grid grid-cols-3 gap-4">    
                            <div class="">
                                <input type="number" min=0 placeholder="Age" name="inputage" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400" <?php if(isset($_POST['inputage']) == true){echo 'value="'.$_POST['inputage'].'"';} ?> required>
                            </div>
                            <div class="flex justify-center gap-4 mt-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="gender" id="inlineRadio1" value="male" checked="checked" required>
                                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="gender" id="inlineRadio2" value="female">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">Female</label>
                                </div>
                            </div>
                            <div class="">
                                <input type="number" placeholder="Weight (Kg)" min='0' name="inputweight" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400" required <?php if(isset($_POST['inputweight']) == true){echo 'value="'.$_POST['inputweight'].'"';} ?>>
                            </div>
                        </div>

                        <div class="">
                            <input class="mt-4 border rounded-lg w-full bg-white" name="inputfile[]" type="file" multiple accept="image/*" required>
                        </div>
                    </div>
                    <?php
                    if(empty($check1.$check2.$check3.$check4.$check5) == false){
                        echo "please check the data entered again"; //info error
                    }
                    echo $info; //menunjukan info jika sudah berhasil
                    ?>
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>
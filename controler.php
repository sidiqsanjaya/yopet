<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
function dbconnect(){
    $db = new mysqli("localhost", "root", "root", "rpl2_v"); // Sesuaikan dengan konfigurasi server anda.
    return $db;
}

//define all class
include 'class/class.account.php';
include 'class/class.verify.php';
include 'class/class.post.php';

Class controler {
    public function geturl($url){
        include 'view/head.php';

        if($url == ''){
           require 'view/navbar.php';
           require 'view/dashboard.php'; //fix
           require 'view/footer.php';


        }elseif($url == 'signin'){
            require 'view/signin.php'; //fix
        }elseif($url == 'signup'){
            require 'view/signup.php'; //fix


        }elseif($url == 'postpet'){
            require 'view/navbar.php';
            require 'view/post.php'; //fix
            
            

        }elseif($url == 'adopt-details'){
            require 'view/navbar.php';
            require 'view/adopt.php'; //fix
            require 'view/footer.php';

        }elseif($url == 'more-adopt'){
            require 'view/navbar.php';
            require 'view/search.php'; //fix
            require 'view/adoptapet.php'; //fix
            require 'view/footer.php';


        }elseif($url == 'profile'){
            require 'view/navbar.php';
            require 'view/profile.php'; //fix

        }elseif($url == 'edit-profile'){
            require 'view/navbar.php';
            require 'view/editprofile.php'; //fix


        }elseif($url == 'forum'){
            require 'view/navbar.php';
            require 'view/search.php'; //fix
            require 'view/forum.php'; //fix
            require 'view/footer.php';

        }elseif($url == 'about-us'){
            require 'view/navbar.php';
            require 'view/about.php'; //fix
            require 'view/footer.php';

        }elseif($url == 'logout'){
            require 'logout.php'; //fix

        }else{
            require 'view/navbar.php';
            require 'view/dashboard.php'; //fix
            require 'view/footer.php';
        }
    }
}


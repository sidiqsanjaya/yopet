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

        echo($url);
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
        }elseif($url == 'more-adopt'){
            require 'view/navbar.php';
            require 'view/search.php';
            require 'view/adoptapet.php'; //fix


        }elseif($url == 'forum'){
            require 'view/navbar.php';
            require 'view/search.php';
            require 'view/forum.php';

        }elseif($url == 'logout'){
            require 'logout.php'; //fix

        }elseif($url == 'scomment'){
            require 'view/scomment.php';

        }else{
            require 'view/navbar.php';
            require 'view/dashboard.php'; //fix
            require 'view/footer.php';
        }
    }
}


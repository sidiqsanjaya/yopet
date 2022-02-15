<?php
function dbconnect(){
    $db = new mysqli("localhost", "root", "root", "rpl2_v"); // Sesuaikan dengan konfigurasi server anda.
    return $db;
}

//define all class
include 'class/class.account.php';
//include 'class/class.signin.php';
include 'class/class.verify.php';

Class controler {
    public function geturl($url){
        include 'view/head.php';
        echo($url);
        if($url == ''){
           require 'view/dashboard.php'; //blm fix tampilannya
        }elseif($url == 'signin'){
            require 'view/signin.php';
        }elseif($url == 'signup'){
            require 'view/signup.php';
        }elseif($url == 'postpet'){
            require 'view/post.php';
        }elseif($url == 'forum'){
            require 'view/forum.php';
        }elseif($url == 'logout'){
            require 'logout.php';
        }else{
            require 'view/dashboard.php';
        }
    }
}


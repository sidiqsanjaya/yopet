<?php
function dbconnect(){
    $db = new mysqli("localhost", "root", "root", "rpl2_v"); // Sesuaikan dengan konfigurasi server anda.
    return $db;
}


include 'class/class.signup.php';
include 'class/class.verify.php';

Class controler {
    public function geturl($url){
        include 'view/head.php';
        echo($url);
        if($url == ''){
           require 'view/dashboard.php'; //blm fix tampilannya
        }elseif($url == 'signin'){
            //$login = new login();
            require 'view/signin.php';
        }elseif($url == 'signup'){
            require 'view/signup.php';
        }else{
            require 'view/dashboard.php';
        }
    }
}


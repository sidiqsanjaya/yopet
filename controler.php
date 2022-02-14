<?php


Class controler {
    public function geturl($url){
       if($url == ''){
           include 'view/dashboard.php'; //blm fix tampilannya
       }else{
           include 'view/view2.php';
       }
    }
}


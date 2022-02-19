<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
define('MB', 1048576);
//class for verify data
Class verify{
    public function checkfullname($fullname){
        //to do check fullname
        if(!trim($fullname)){
            return "empty";
        }
    }

    public function checkusername($username){
        if(!trim($username)){
            return "empty";
        }else{
            $db = dbconnect();
            //to do check username already use or no
            if($db->connect_errno == 0){
                 $sql = "SELECT `user`.`username` FROM `user` WHERE `user`.`username` = '$username'";
                 $res=$db->query($sql);
                 if(mysqli_num_rows($res)>0){                
                     return "used";
                     $res->free();
                 }else{
                     return "unused";
                 }
            }else{
                return "failed";
            }
        }
    }
    public function checkemail($email){
        //to do check email already use or no
        if(!trim($email)){
            return "empty"; 
        }else{
            $db = dbconnect();
            //to do check email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($db->connect_errno == 0){
                    $sql = "SELECT `user`.`username` FROM `user` WHERE `user`.`email` = '$email'";
                    $res=$db->query($sql);
                    if(mysqli_num_rows($res)){                
                        return "used";
                        $res->free();
                    }else{
                        return "unused";
                    }
                }else{
                    return FALSE;
                }
            }else{
                return 'invalid';
            }
        }
    }

    public function checkpassword($password){
        //to do check password
        if(!trim($password)){
            return "empty";
        }elseif(strlen($password) < 8){
            return "notenough";
        }
    }

    public function checknumber($number){
        if(!trim($number)){
            return "empty";
        }elseif(!gettype($number) == "integer"){
            return "notinteger";
        }elseif(strlen($number) < 9 || strlen($number) > 15 ){
            return "range"; //invalid number range
        }
    }

    public function checkusermail($usermail){
        if(!trim($usermail)){
            return "empty";
        }
    }
    
    public function checkcity($city){
        if(!trim($city)){
            return "empty";
        }
    }

    public function checktitle($title){
        if(!trim($title)){
            return "empty";
        }
    }

    public function checkdesc($desc){
        if(!trim($desc)){
            return "empty";
        } 
    }

    public function checkageweight($number){
        if(empty($number)){
            return "empty";
        }elseif(!gettype($number) == "integer"){
            return "notinteger";
        }
    }
    public function checkgender($gender){
        if(!trim($gender)){
            return "empty";
        }
    }
    public function checkcategory($category){
        if(!trim($category)){
            return "empty";
        }
    }

    public function checktype($type){
        $extension = array("jpeg","jpg","png");
        $ext = pathinfo($type, PATHINFO_EXTENSION);
        if(in_array($ext, $extension) == false){
        return "1";
        }
    }

    public function checksizeimg($size){
        if($size > 5*MB){
            return "1";
        }
    }

}


?>
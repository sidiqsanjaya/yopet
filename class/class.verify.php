<?php
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
        }elseif(gettype($number) == "integer"){
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
}


?>
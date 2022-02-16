<?php
Class account{
    public $fullname;
    public $username;
    public $email;
    public $password;
    public $number;
    public function __construct($fullname = null,$username = null,$email = null,$password = null,$number = null){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email    = $email;
        $this->password = md5($password);
        $this->number   = $number;
    }

    protected function create(){

        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `fullname`, `create_at`, `gender`, `number_phone`) VALUES (NULL, '$this->username', '$this->email', '$this->password', '$this->fullname', CURRENT_TIMESTAMP, NULL, $this->number)";
            $res = $db->query($sql);
        }else{
            return false;
        }

    }

    public function login($username,$password){
        $db = dbconnect();
        $md5 = md5($password);
        if ($db->connect_errno == 0) {
            $sql = "SELECT `user`.`id_user`, `user`.`email`, `user`.`username`, `user`.`level` FROM `user` WHERE `user`.`email` = '$username' OR `user`.`username` = '$username' AND `user`.`password` = '$md5'";           
            $res = $db->query($sql);
            if(mysqli_num_rows($res)==1){
                $data = $res->fetch_array();
                $res->free();
                return $data;                  
            }else{
                return "failed";
            }
        }else{
            return false;
        }
    }
}
class signup extends account {
    public function createaccount(){
        $this->create();
    }
}

class signin extends account{
    public function login($username,$password){

    }
}

?>
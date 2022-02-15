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
}
class signup extends account {
    public function createaccount(){
        $this->create();
    }
}
?>
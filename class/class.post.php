<?php
Class post{
    public $iduser;
    public $idpost;
    public $title;
    public $desc;
    public $age;
    public $gender;
    public $weight;
    public function __construct($iduser = null,$idpost = null, $title = null, $desc = null, $age = null, $gender = null, $weight = null){
        $this->iduser= $iduser;
        $this->idpost= $idpost;
        $this->title = $title;
        $this->desc  = $desc;
        $this->age   = $age;
        $this->gender= $weight;
        $this->weight= $gender;
    }

    protected function post_adopt(){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "INSERT INTO `post_adopt` (`id_post_adopt`, `id_user`, `title_post_adopt`, `description`, `date_post`, `animal_age`, `animal_size`, `animal_gender`, `status_adopt`) VALUES ('$this->idpost', '$this->iduser', '$this->title', '$this->desc', CURRENT_TIMESTAMP, '$this->age', '$this->weight', '$this->gender', 'undone')";
            $res = $db->query($sql);
        }else{
            return false;
        }
    }

    public function uploadimg($idpost,$filename){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "INSERT INTO `multiple_photo_post` (`id_multiple_photo_post`, `id_post_adopt`, `photo_img_post`) VALUES (NULL, '$idpost', '$filename')";
            $res = $db->query($sql);
            return $res;
        }else{
            return false;
        }
    }
  
}

Class forumpost extends post {
    public function createapost(){
        $this->post_adopt();
    }
}
?>
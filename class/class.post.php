<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
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


    //setting dashboard
    public function dashboard($start,$limit){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $query = "SELECT `post_adopt`.*
            FROM `post_adopt` ORDER BY date_post ASC limit $start, $limit";
            
            $res = $db->query($query);
            if ($res) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
                return $data;
            } else
                return FALSE;
        }else{
            return false;
        }
    }
    
    public function dashimg($idpost){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
                $sql = "SELECT `multiple_photo_post`.`photo_img_post` FROM `multiple_photo_post` WHERE `multiple_photo_post`.`id_post_adopt` = '$idpost' LIMIT 1";
            $res = $db->query($sql);
            if ($res) {                
                $data = $res->fetch_array();
                $res->free();
                return $data;
            } else
                return FALSE;
        }else{
            return false;
        }
    }

    public function fullimg($idpost){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
                $sql = "SELECT `multiple_photo_post`.`photo_img_post` FROM `multiple_photo_post` WHERE `multiple_photo_post`.`id_post_adopt` = '$idpost'";               
            $res = $db->query($sql);
            if ($res) {                
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
                return $data;
            } else
                return FALSE;
        }else{
            return false;
        }
    }

    public function remove($idpost,$iduser,$idusername,$level){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            if($level=="admin"){
                $sql = "SELECT `post_adopt`.`id_post_adopt`
                FROM `post_adopt`
                WHERE `post_adopt`.`id_post_adopt` = '$idpost'";
            }elseif($level=="user"){
                $sql = "SELECT `user`.`id_user`, `user`.`username`, `post_adopt`.`id_post_adopt` FROM `user` LEFT JOIN `post_adopt` ON `post_adopt`.`id_user` = `user`.`id_user` WHERE `user`.`id_user` = $iduser AND `user`.`username` = '$idusername' AND `post_adopt`.`id_post_adopt` = '$idpost'";
            }
            $res = $db->query($sql);
            if(mysqli_num_rows($res)>0) {
                $sqlimg = "SELECT `multiple_photo_post`.`photo_img_post` FROM `multiple_photo_post` WHERE `multiple_photo_post`.`id_post_adopt` = '$idpost'";
                $sqlremovepost = "DELETE FROM `post_adopt` WHERE `post_adopt`.`id_post_adopt` = '$idpost'";
                $img = $db->query($sqlimg);
                $data = $img->fetch_array();
                foreach ($data as $datas) {
                     unlink($datas);
                }
                $db->query($sqlremovepost);
                return "oke";
            } else
                return "gagal";
        }else{
            return false;
        }
    }

    public function adoptdetail($idpost){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "SELECT `post_adopt`.*, `user`.`number_phone` FROM `post_adopt` JOIN `user` ON `post_adopt`.`id_user` = `user`.`id_user` WHERE `post_adopt`.`id_post_adopt` = '$idpost'";
            $res = $db->query($sql);
            if(mysqli_num_rows($res)>0){
                if ($res) {               
                    $data = $res->fetch_array();
                    $res->free();
                    return $data;
                } else
                    return FALSE;
            }else{
                return "notfound";
            }
        }else{
            return false;
        }
    }

    public function savecommentpost($iduser,$idpost,$comment){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "INSERT INTO `comment` (`id_comment`, `id_forum`, `id_post_adopt`, `id_user`, `content_comment`, `date_comment`) VALUES (NULL, NULL, '$idpost', $iduser, '$comment', CURRENT_TIMESTAMP)";
            $res = $db->query($sql);            
            if ($res) {               
                return $res;
            } else
                return FALSE;
        }else{
            return false;
        }
    }

    public function loadcommentpost($idpost){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "SELECT `comment`.`content_comment` ,`comment`.`date_comment`, `user`.`fullname` FROM `post_adopt` LEFT JOIN `comment` ON `comment`.`id_post_adopt` = `post_adopt`.`id_post_adopt` LEFT JOIN `user` ON `comment`.`id_user` = `user`.`id_user` WHERE `post_adopt`.`id_post_adopt` = '$idpost' ORDER BY `comment`.`id_comment` DESC";
            $res = $db->query($sql);            
                if ($res) {               
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                    return $data;
                } else
                    return FALSE;
        }else{
            return false;
        }
    }

    public function createforum($iduser,$comment){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $idforum = substr(md5(time()), 0, 7);
            $sql = "INSERT INTO `forum` (`id_forum`, `id_user`, `content_post`, `date_post`) VALUES ('$idforum', '$iduser', '$comment', CURRENT_TIMESTAMP)";
            $res = $db->query($sql);            
        }else{
            return false;
        }
    }

    public function loadforum($start,$limit){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "SELECT `user`.`fullname`, `forum`.* FROM `user` RIGHT JOIN `forum` ON `forum`.`id_user` = `user`.`id_user` ORDER BY date_post DESC limit $start, $limit";
            $res = $db->query($sql);            
                if ($res) {               
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                    return $data;
                } else
                    return FALSE;
        }else{
            return false;
        }
    }

    public function savecommentforum($iduser,$idforum,$comment){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "INSERT INTO `comment` (`id_comment`, `id_forum`, `id_post_adopt`, `id_user`, `content_comment`, `date_comment`) VALUES (NULL, '$idforum', NULL, $iduser, '$comment', CURRENT_TIMESTAMP)";
            $res = $db->query($sql);            
            if ($res) {               
                return $res;
            } else
                return FALSE;
        }else{
            return false;
        }
    }

    public function loadcommentforum($idpost){
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "SELECT `comment`.`content_comment` ,`comment`.`date_comment`, `user`.`fullname` FROM `forum` LEFT JOIN `comment` ON `comment`.`id_forum` = `forum`.`id_forum` LEFT JOIN `user` ON `comment`.`id_user` = `user`.`id_user` WHERE `forum`.`id_forum` = '$idpost' ORDER BY `comment`.`id_comment` DESC";
            $res = $db->query($sql);            
                if ($res) {               
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                    return $data;
                } else
                    return FALSE;
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
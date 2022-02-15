<?php
// Initialize the session
session_start();
ob_end_clean();
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

if(empty($_GET['session'])){
    header("location: /");
}else{
    header("location: ?page=signin");
}
?>
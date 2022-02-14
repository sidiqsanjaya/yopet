<?php
session_start();
ob_start();
include "controler.php";

$ct = new controler();

$ct->geturl(isset($_GET['page']));
?>
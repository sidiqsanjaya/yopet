<?php
session_start();
ob_start();
//error_reporting(0);
include "controler.php";

$ct = new controler();

$ct->geturl($_GET['page']);
?>
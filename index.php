<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
define('MyConst', TRUE);
session_start();
ob_start();
//error_reporting(0);
include "controler.php";

$ct = new controler();

$ct->geturl($_GET['page']);
?>
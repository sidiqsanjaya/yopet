<?php
session_start();
ob_start();
include "controler.php";

$ct = new controler();

$ct->geturl($_GET['page']);
?>
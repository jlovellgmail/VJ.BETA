<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/ProductImage.class.php';

$ImgID = $_GET['ImgID'];

$ProductImg = new ProductImage();
$ProductImg->initialize($ImgID);
$ProductImg->setVar("DelFlag", 1);
$ProductImg->store();
?>
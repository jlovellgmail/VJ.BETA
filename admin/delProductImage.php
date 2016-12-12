<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/ProductImage.class.php';
include $rootpath.'/classes/Product.class.php';

$ImgID = $_GET['ImgID'];
$PID = $_GET['PID'];
$ImgType = $_GET['ImgType'];

if ($ImgType == 'P')
{
	$Product = new Product();
	$Product->initialize($PID);
	$Product->setVar("ImgUrl", "NULL");
	$Product->setVar("ThumbnailUrl", "NULL");
	$Product->store();
}
else if ($ImgType == 'G')
{
	$ProductImg = new ProductImage();
	$ProductImg->initialize($ImgID);
	$ProductImg->setVar("DelFlag", 1);
	$ProductImg->store();
}
?>
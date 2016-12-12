<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorImage.class.php';

$ImgID = $_GET['ImgID'];

$AmbassadorImage = new AmbassadorImage();
$AmbassadorImage->initialize($ImgID);
$AmbassadorImage->setVar("DelFlag", 1);
$AmbassadorImage->store();

?>
<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/PostSlideshow.class.php';

$PSID = $_GET['PSID'];

$PostSlideshow = new PostSlideshow();
$PostSlideshow->initialize($PSID);
$PostSlideshow->setVar("DelFlag", "1");
$PostSlideshow->store();
?>
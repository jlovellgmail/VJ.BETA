<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorPost.class.php';

$PID = $_GET['PID'];

$AmbassadorPost = new AmbassadorPost();
$AmbassadorPost->initialize($PID);
$AmbassadorPost->setVar("DelFlag", 1);
$AmbassadorPost->store();

header('Location: /ambassador/posts.php');
?>
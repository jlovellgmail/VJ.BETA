<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Post.class.php';

$PID = $_GET['PID'];
$AID = $_GET['AID'];

$Post = new Post();
$Post->initialize($PID);
$Post->setVar("DelFlag", 1);
$Post->store();
$type = $Post->getVar("Type");

if ($AID == "0")
{
	header('Location: /admin/ambassador-posts.php?type='.$type);
}
else
{
	header('Location: /ambassador/journal-posts.php');
}
?>
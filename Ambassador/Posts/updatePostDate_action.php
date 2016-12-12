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
$postDate = $_GET['PostDate'];

$Post = new Post();
$Post->initialize($PID);
$Post->setVar("PostDate", $postDate);
$Post->store();
$type = $Post->getVar("Type");

if ($type == '')
{
	header('Location: /ambassador/journal-posts/');
}
else
{
	header('Location: /admin/ambassador-posts.php?type='.$type);
}
?>
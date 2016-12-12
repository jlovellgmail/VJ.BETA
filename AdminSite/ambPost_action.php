<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorPost.class.php';

$PID = $_GET['PID'];
$AID = $_GET['AID'];

if (isset($PID) || !$PID == '')
{
	$AmbassadorPost = new AmbassadorPost();
   	$AmbassadorPost->initialize($PID);
	$AmbassadorPost->setVar("AID", $AID);
	$AmbassadorPost->setVar("Title", $_POST['Title']);
	$AmbassadorPost->setVar("SubTitle", $_POST['SubTitle']);
	$AmbassadorPost->setVar("PostContent", $_POST['PostContent']);
	$AmbassadorPost->setVar("ImgUrl", $_POST['postImg']);
	$AmbassadorPost->setVar("HeroImgUrl", $_POST['postHeroImg']);
	$AmbassadorPost->setVar("Type", $_POST['Type']);
	$AmbassadorPost->store();
}
else
{
	$AmbassadorPost = new AmbassadorPost();
	$AmbassadorPost->setVar("AID", $AID);
	$AmbassadorPost->setVar("Title", $_POST['Title']);
	$AmbassadorPost->setVar("SubTitle", $_POST['SubTitle']);
	$AmbassadorPost->setVar("PostContent", $_POST['PostContent']);
	$AmbassadorPost->setVar("ImgUrl", $_POST['postImg']);
	$AmbassadorPost->setVar("HeroImgUrl", $_POST['postHeroImg']);
	$AmbassadorPost->setVar("Type", $_POST['Type']);
	$AmbassadorPost->store();
}

header("Location: /ambassador-posts.php");
?>
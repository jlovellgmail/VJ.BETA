<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorNews.class.php';

$NID = $_GET['NID'];
$AID = $_GET['AID'];

if (isset($NID) || !$NID == '')
{
	$AmbassadorNews = new AmbassadorNews();
   	$AmbassadorNews->initialize($NID);
	$AmbassadorNews->setVar("AID", $AID);
	$AmbassadorNews->setVar("Name", $_POST['Name']);
	$AmbassadorNews->setVar("Subtitle", $_POST['Subtitle']);
	$AmbassadorNews->setVar("Description", $_POST['Description']);
	$AmbassadorNews->setVar("ImgUrl", $_POST['newsImg']);
	$AmbassadorNews->store();
}
else
{
	$AmbassadorNews = new AmbassadorNews();
	$AmbassadorNews->setVar("AID", $AID);
	$AmbassadorNews->setVar("Name", $_POST['Name']);
	$AmbassadorNews->setVar("Subtitle", $_POST['Subtitle']);
	$AmbassadorNews->setVar("Description", $_POST['Description']);
	$AmbassadorNews->setVar("ImgUrl", $_POST['newsImg']);
	$AmbassadorNews->store();
}

header("Location: /ambassador/news.php");
?>
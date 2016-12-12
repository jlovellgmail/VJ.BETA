<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorFavorite.class.php';

$FID = $_GET['FID'];
$AID = $_GET['AID'];

if (isset($FID) || !$FID == '')
{
	$AmbassadorFavorite = new AmbassadorFavorite();
   	$AmbassadorFavorite->initialize($FID);
	$AmbassadorFavorite->setVar("AID", $AID);
	$AmbassadorFavorite->setVar("ItemName", $_POST['ItemName']);
	if (!isset($_POST['Link']) || $_POST['Link'] == "")
	{
		$AmbassadorFavorite->setVar("Link", "NULL");
	}
	else
	{
		$AmbassadorFavorite->setVar("Link", $_POST['Link']);
	}
	$AmbassadorFavorite->setVar("Description", $_POST['Description']);
	$AmbassadorFavorite->setVar("Comments", $_POST['Comments']);
	$AmbassadorFavorite->setVar("Type", 'C');
	$AmbassadorFavorite->setVar("ImgUrl", $_POST['favImg']);
	$AmbassadorFavorite->store();
}
else
{
	$AmbassadorFavorite = new AmbassadorFavorite();
	$AmbassadorFavorite->setVar("AID", $AID);
	$AmbassadorFavorite->setVar("ItemName", $_POST['ItemName']);
	if (!isset($_POST['Link']) || $_POST['Link'] == "")
	{
		$AmbassadorFavorite->setVar("Link", "NULL");
	}
	else
	{
		$AmbassadorFavorite->setVar("Link", $_POST['Link']);
	}
	$AmbassadorFavorite->setVar("Description", $_POST['Description']);
	$AmbassadorFavorite->setVar("Comments", $_POST['Comments']);
	$AmbassadorFavorite->setVar("Type", 'C');
	$AmbassadorFavorite->setVar("ImgUrl", $_POST['favImg']);
	$AmbassadorFavorite->store();
}

header("Location: /ambassador/favorites.php");
?>
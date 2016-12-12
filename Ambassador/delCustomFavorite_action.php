<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorFavorite.class.php';

$FID = $_GET['FID'];

if (isset($FID) && $FID != '')
{
	$AmbassadorFavorite = new AmbassadorFavorite();
   	$AmbassadorFavorite->initialize($FID);
	$AmbassadorFavorite->setVar("DelFlag", 1);
	$AmbassadorFavorite->store();
}

?>
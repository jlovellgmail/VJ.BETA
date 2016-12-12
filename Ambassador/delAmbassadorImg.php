<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Ambassador.class.php';
$rootpath = $_SERVER['DOCUMENT_ROOT'];

$AID = $_GET['AID'];
$Type = $_GET["Type"];

if ($Type == "P")
{
	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
	unlink($rootpath . $Ambassador->getVar("ProfileImg"));
	$Ambassador->setVar("ProfileImg", "NULL");
	$Ambassador->store();
}
elseif ($Type == "PP")
{
	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
	unlink($rootpath . $Ambassador->getVar("ProfilePrevImg"));
	$Ambassador->setVar("ProfilePrevImg", "NULL");
	$Ambassador->store();
}
elseif ($Type == "PH")
{
	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
	unlink($rootpath . $Ambassador->getVar("ProfileHeroImg"));
	$Ambassador->setVar("ProfileHeroImg", "NULL");
	$Ambassador->store();
}
?>
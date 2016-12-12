<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorNews.class.php';

$ids = $_POST['NIDs'];
$NIDs = explode(",", $ids);

foreach ($NIDs as $NID)
{
	if ($NID != "")
	{
		$AmbassadorNews = new AmbassadorNews();
		$AmbassadorNews->initialize($NID);
		$AmbassadorNews->setVar("DelFlag", 1);
		$AmbassadorNews->store();
	}
}
?>
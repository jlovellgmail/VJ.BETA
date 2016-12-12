<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorFavorite.class.php';

$ids = $_POST["order"];

//print_r($ids);
for ($i = 0; $i < sizeof($ids); $i++)
{
	if ($ids[$i] != "")
	{
		$fav = new AmbassadorFavorite();
		$fav->initialize($ids[$i]);
		$fav->setVar("OrderNo", $i+1);
		$fav->store();
	}
}
?>
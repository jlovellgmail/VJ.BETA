<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once $rootpath.'/incs/conn.php';
include $rootpath.'/classes/PTemplates.class.php';

$ids = $_POST["order"];

for ($i = 0; $i < sizeof($ids); $i++)
{
	if ($ids[$i] != "")
	{
		$PTemplates = new PTemplates();
		$PTemplates->initialize($ids[$i]);
		$PTemplates->setVar("OrderNo", $i+1);
		$PTemplates->store();
	}
}
?>
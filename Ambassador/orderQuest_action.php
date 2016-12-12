<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorQuestion.class.php';

$ids = $_POST["order"];

//print_r($ids);
for ($i = 0; $i < sizeof($ids); $i++)
{
	if ($ids[$i] != "")
	{
		$quest = new AmbassadorQuestion();
		$quest->initialize($ids[$i]);
		$quest->setVar("OrderNo", $i+1);
		$quest->store();
	}
}
?>
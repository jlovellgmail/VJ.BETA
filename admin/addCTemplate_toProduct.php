<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/PTemplates.class.php';
include $rootpath.'/classes/CTemplates.class.php';


$PID = $_GET['PID'];
$ids = $_GET['ids'];

$idArr = explode(",", $ids);

foreach ($idArr as $CTID) {
	if ($CTID != "")
	{
		$CTemplates = new CTemplates();
		$CTemplates->initialize($CTID);
		
		$PTemplates = new PTemplates();
		$PTemplates->setVar("CTID", $CTID);
		$PTemplates->setVar("PID", $PID);
		$PTemplates->setVar("Name", $CTemplates->getVar("Name"));
		$PTemplates->setVar("Description", $CTemplates->getVar("Description"));
		$PTemplates->setVar("ImgUrl", $CTemplates->getVar("ImgUrl"));
		
		$PTemplates->store();
	}
}

header("Location: add-product.php?PID=".$PID);
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/PTemplates.class.php';
include '/classes/CTemplates.class.php';


$PID = $_GET['PID'];
$ids = $_GET['ids'];

$idArr = split(",", $ids);

foreach ($idArr as $CTID) {
	if ($CTID != "")
	{
		$CTemplates = new CTemplates();
		$CTemplates->initialize($CTID);
		
		$PTemplates = new PTemplates();
		$PTemplates->setVar("PID", $PID);
		$PTemplates->setVar("Name", $CTemplates->getVar("Name"));
		$PTemplates->setVar("Description", $CTemplates->getVar("Description"));
		$PTemplates->setVar("ImgUrl", $CTemplates->getVar("ImgUrl"));
		
		$PTemplates->store();
	}
}

header("Location: /add_product.php?PID=".$PID);
?>
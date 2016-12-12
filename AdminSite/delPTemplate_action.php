<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/PTemplates.class.php';

$PTID = $_GET['PTID'];
$PID = $_GET['PID'];

if (isset($PTID) || !$PTID == '')
{
	$PTemplates = new PTemplates();
   	$PTemplates->initialize($PTID);
	$PTemplates->setVar("DelFlag", 1);
	$PTemplates->store();
}

header("Location: /add_product.php?PID=".$PID);
?>
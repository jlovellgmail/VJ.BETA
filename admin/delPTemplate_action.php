<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/PTemplates.class.php';

$PTID = $_GET['PTID'];
$PID = $_GET['PID'];

if (isset($PTID) || !$PTID == '')
{
	$PTemplates = new PTemplates();
   	$PTemplates->initialize($PTID);
	$PTemplates->setVar("DelFlag", 1);
	$PTemplates->store();
}

header("Location: add-product.php?PID=".$PID);
?>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/CTemplates.class.php';

$CTID = $_GET['CTID'];
$CID = $_GET['CID'];

if (isset($CTID) || !$CTID == '')
{
	$CTemplates = new CTemplates();
   	$CTemplates->initialize($CTID);
	$CTemplates->setVar("DelFlag", 1);
	$CTemplates->store();
}

header("Location: add_collection.php?CID=".$CID);
?>
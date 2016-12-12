<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Style.class.php';

$SID = $_GET['SID'];

if (isset($SID) || !$SID == '')
{
	$style = new Style();
   	$style->initialize($SID);
	$style->setVar("DelFlag", 1);
	$style->store();
}

header("Location: styles.php");
?>
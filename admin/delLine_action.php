<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Line.class.php';

$LID = $_GET['LID'];

if (isset($LID) || !$LID == '')
{
	$line = new Line();
   	$line->initialize($LID);
	$line->setVar("DelFlag", 1);
	$line->store();
}

header("Location: lines.php");
?>
<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Line.class.php';

$LID = $_GET['LID'];

if (isset($LID) || !$LID == '')
{
	$line = new Line();
   	$line->initialize($LID);
	$line->setVar("DelFlag", 1);
	$line->store();
}

header("Location: /lines.php");
?>
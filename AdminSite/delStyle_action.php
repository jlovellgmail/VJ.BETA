<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Style.class.php';

$SID = $_GET['SID'];

if (isset($SID) || !$SID == '')
{
	$style = new Style();
   	$style->initialize($SID);
	$style->setVar("DelFlag", 1);
	$style->store();
}

header("Location: /styles.php");
?>
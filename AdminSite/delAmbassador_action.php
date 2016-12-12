<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';
include '/classes/Ambassador.class.php';

$AID = $_GET['AID'];

if (isset($AID) || !$AID == '')
{
	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
	$Ambassador->setVar('DelFlag', 1);
	$UsrID = $Ambassador->getVar('UsrID');
	$Ambassador->store();
	
	$user = new Reg_User();
   	$user->initialize($UsrID);
	$user->setVar("DelFlag", 1);
	$user->store();
}

header("Location: /ambassadors.php");
?>
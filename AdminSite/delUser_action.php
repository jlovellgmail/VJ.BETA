<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';

$UsrID = $_GET['UsrID'];

if (isset($UsrID) || !$UsrID == '')
{
	$user = new Reg_User();
   	$user->initialize($UsrID);
	$user->setVar("DelFlag", 1);
	$user->store();
}

header("Location: /users.php");
?>
<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';

$UsrID = $_GET['UsrID'];

if (isset($UsrID) || !$UsrID == '')
{
	if ($_POST['Passwd'] == $_POST['Conf_Passwd'])
	{
		$Reg_User = new Reg_User();
	   	$Reg_User->initialize($UsrID);
		$Reg_User->setVar("Password", $_POST['Passwd']);
		$Reg_User->store();
	}
	else
	{
		echo "Passwords provided do not match.";
	}
}

?>
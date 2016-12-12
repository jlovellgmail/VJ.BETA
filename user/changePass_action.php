<?php
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/classes/Reg_User.class.php';

$UsrID = $_SESSION["UsrID"];

if (isset($UsrID) || !$UsrID == '')
{
	if ($_POST['Passwd'] == $_POST['Conf_Passwd'])
	{
		$Reg_User = new Reg_User();
	   	$Reg_User->initialize($UsrID);
		$Reg_User->setVar("Password", $_POST['Passwd']);
		$Reg_User->encryptPass();
		$Reg_User->store();
	}
	else
	{
		echo "Password entries do not match.";
	}
}

?>
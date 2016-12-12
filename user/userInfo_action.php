<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Reg_User.class.php';

$ErrorRedirect = "/user/info.php";

$UsrID = $_SESSION["UsrID"];

if ($_POST['FName'] == "" || $_POST['LName'] == "" || $_POST['Email'] == "") {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["er"] = "em";
    header("Location: " . $ErrorRedirect);
    exit();
}

$email = $_POST['Email'];
$query = "Select UsrID from Users where Email=:usremail";
$param = array(":usremail" => $email);
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

$user = new Reg_User();

$user->initialize($UsrID);
if ($Arr > 0 && $_POST['Email'] != $user->getVar('Email'))
{
	$_SESSION["er"] = "ue";
	header("Location: " . $ErrorRedirect);
	exit();
}
$user->setVar("FName", $_POST['FName']);
$user->setVar("LName", $_POST['LName']);
$user->setVar("Email", $_POST['Email']);

$user->store();

$_SESSION["er"] = "false";
header("Location: " . $ErrorRedirect);
?>
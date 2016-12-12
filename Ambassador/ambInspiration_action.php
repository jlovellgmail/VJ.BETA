<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorInspiration.class.php';

$IID = $_GET['IID'];
$AID = $_GET['AID'];

if (isset($IID) || $IID != '')
{
	$AmbassadorInspiration = new AmbassadorInspiration();
   $AmbassadorInspiration->initialize($IID);
	$AmbassadorInspiration->setVar("AID", $AID);
	$AmbassadorInspiration->setVar("ImageTitle", $_POST['ImageTitle']);
	$AmbassadorInspiration->setVar("Message", $_POST['Message']);
	$AmbassadorInspiration->setVar("ImgType", $_POST['ImgType']);
	$AmbassadorInspiration->setVar("ImgUrl", $_POST['ImgUrl']);
	$AmbassadorInspiration->store();
}
else
{
	$AmbassadorInspiration = new AmbassadorInspiration();
	$AmbassadorInspiration->setVar("AID", $AID);
	$AmbassadorInspiration->setVar("ImageTitle", $_POST['ImageTitle']);
	$AmbassadorInspiration->setVar("Message", $_POST['Message']);
	$AmbassadorInspiration->setVar("ImgType", $_POST['ImgType']);
	$AmbassadorInspiration->setVar("ImgUrl", $_POST['ImgUrl']);
	$AmbassadorInspiration->store();
}

header("Location: /ambassador/inspirations.php");
?>
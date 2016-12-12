<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorInspiration.class.php';

$IID = $_GET['IID'];

if (isset($IID) && $IID != '')
{
	$AmbassadorInspiration = new AmbassadorInspiration();
   $AmbassadorInspiration->initialize($IID);
	$AmbassadorInspiration->setVar("DelFlag", 1);
	$AmbassadorInspiration->store();
}

?>
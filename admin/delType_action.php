<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Type.class.php';

$TID = $_GET['TID'];

if (isset($TID) || !$TID == '')
{
	$type = new Type();
   $type->initialize($TID);
	$type->setVar("DelFlag", 1);
	$type->store();
}

header("Location: types.php");
?>
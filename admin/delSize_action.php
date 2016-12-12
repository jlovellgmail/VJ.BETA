<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Size.class.php';

$SID = $_GET['SID'];

if (isset($SID) || !$SID == '')
{
	$size = new Size();
   $size->initialize($SID);
	$size->setVar("DelFlag", 1);
	$size->store();
}

header("Location: options.php");
?>
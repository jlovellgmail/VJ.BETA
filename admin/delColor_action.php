<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Color.class.php';

$CID = $_GET['CID'];

if (isset($CID) || !$CID == '')
{
	$color = new Color();
   $color->initialize($CID);
	$color->setVar("DelFlag", 1);
	$color->store();
}

header("Location: options.php");
?>
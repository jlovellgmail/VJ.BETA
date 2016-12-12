<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorLocation.class.php';

$LocID = $_GET['LocID'];

if (isset($LocID) || !$LocID == '')
{
	$location = new AmbassadorLocation();
   	$location->initialize($LocID);
	$location->setVar("DelFlag", 1);
	$location->store();
}

//header("Location: /ambassador_locations.php");
?>
<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/AmbassadorLocation.class.php';

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
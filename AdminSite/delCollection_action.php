<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Collection.class.php';

$CID = $_GET['CID'];

if (isset($CID) || !$CID == '')
{
	$Collection = new Collection();
   	$Collection->initialize($CID);
	$Collection->setVar("DelFlag", 1);
	$Collection->store();
}

header("Location: /collections.php");
?>
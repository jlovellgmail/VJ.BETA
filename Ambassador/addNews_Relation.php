<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorNewsRelation.class.php';

$NID = $_GET['NID'];
$AID = $_GET['AID'];

$query = "{call F_AmbNewsRelExist (@NID=:NID, @AID=:AID)}";
$param = array(":NID" => $NID, ":AID" => $AID);
$dbo->doQueryParam($query, $param);
$list = $dbo->loadObjectList();

if (is_array($list))
{
	$AmbassadorNewsRelation = new AmbassadorNewsRelation();
   	$AmbassadorNewsRelation->initialize($list[0]["ID"]);
	$AmbassadorNewsRelation->setVar("DelFlag", "0");
	$AmbassadorNewsRelation->store();
	echo "HERE";
}
else
{
	$AmbassadorNewsRelation = new AmbassadorNewsRelation();
	$AmbassadorNewsRelation->setVar("NID", $NID);
	$AmbassadorNewsRelation->setVar("AID", $AID);
	$AmbassadorNewsRelation->store();
}

?>
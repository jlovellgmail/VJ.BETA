<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorEventsRelation.class.php';

$EID = $_GET['EID'];
$AID = $_GET['AID'];

$query = "{call F_AmbEventsRelExist (@EID=:EID, @AID=:AID)}";
$param = array(":EID" => $EID, ":AID" => $AID);
$dbo->doQueryParam($query, $param);
$list = $dbo->loadObjectList();

if (is_array($list))
{
	$AmbassadorEventsRelation = new AmbassadorEventsRelation();
   	$AmbassadorEventsRelation->initialize($list[0]["ID"]);
	$AmbassadorEventsRelation->setVar("DelFlag", "0");
	$AmbassadorEventsRelation->store();
	echo "HERE";
}
else
{
	$AmbassadorEventsRelation = new AmbassadorEventsRelation();
	$AmbassadorEventsRelation->setVar("EID", $EID);
	$AmbassadorEventsRelation->setVar("AID", $AID);
	$AmbassadorEventsRelation->store();
}

?>
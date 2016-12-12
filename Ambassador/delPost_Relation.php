<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorPostRelation.class.php';

$PID = $_GET['PID'];
$AID = $_GET['AID'];

$query = "{call F_AmbPostRelExist (@PID=:PID, @AID=:AID)}";
$param = array(":PID" => $PID, ":AID" => $AID);
$dbo->doQueryParam($query, $param);
$list = $dbo->loadObjectList();

if (is_array($list))
{
	$AmbassadorPostRelation = new AmbassadorPostRelation();
   	$AmbassadorPostRelation->initialize($list[0]["ID"]);
	$AmbassadorPostRelation->setVar("DelFlag", 1);
	$AmbassadorPostRelation->store();
}

?>
<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');

$AID = $_POST["AID"];
$Hidden = $_POST["strState"];
$query="Update Ambassadors set Hidden=:hidden where AID=:aid";

$param = array(":hidden" => $Hidden,":aid"=>$AID);
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);



?>
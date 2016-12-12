<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');

$PID = $_POST["PID"];
$Hidden = $_POST["strState"];
$query="Update Products set Hidden=:hidden where PID=:pid";

$param = array(":hidden" => $Hidden,":pid"=>$PID);
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);



?>
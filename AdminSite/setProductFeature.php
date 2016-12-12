<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');

$PID = $_POST["PID"];
$Featured = $_POST["strState"];
$query="Update Products set Featured=:featured where PID=:pid";

$param = array(":featured" => $Featured,":pid"=>$PID);
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);



?>
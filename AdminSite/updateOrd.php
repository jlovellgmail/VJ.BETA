<?php

include '/incs/session_detect.php';
include_once('/incs/conn.php');


$dbo = database::getInstance();
$query = "Update Orders Set Status='".$_POST["OrdStatus"]."',TrackingNo='".$_POST["TrackingNo"]."' where OrdID=".$_POST["OrdID"];
$dbo->doQuery($query);

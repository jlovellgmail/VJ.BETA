<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');

if (isset($_POST["pubFlag"]) && $_POST["pubFlag"]=="true"){
    $pubFlag=1;
} else {
    $pubFlag=0;
}

$dbo = database::getInstance();
$query = "Update AmbassadorPost Set Publish=".$pubFlag." where PID=".$_GET["PID"];
$dbo->doQuery($query);
?>
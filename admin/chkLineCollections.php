<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');

$LID = $_GET['LID'];

$query = "{call F_GetLineCollections (@LID=:LID)}";
$param = array(":LID" => $LID);
$dbo->doQueryParam($query, $param);
$lines = $dbo->loadObjectList();

if ($dbo->getRows() > 0) {
	echo "True";
} else {
	echo 'False';
}
?>
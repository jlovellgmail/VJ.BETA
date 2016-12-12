<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');

$CID = $_GET['CID'];

$query = "{call F_GetCollectionProducts (@CID=:CID)}";
$param = array(":CID" => $CID);
$dbo->doQueryParam($query, $param);
$lines = $dbo->loadObjectList();

if ($dbo->getRows() > 0) {
	echo "True";
} else {
	echo 'False';
}
?>
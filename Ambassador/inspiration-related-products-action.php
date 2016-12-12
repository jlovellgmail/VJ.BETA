<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/InspirationRelatedProduct.class.php';

$IID = $_GET['IID'];
$ids = $_GET['PIDs'];
$PIDs = explode(",", $ids);

print_r($PIDs);

$query = "Delete from InspirationRelatedProducts where IID=" . $IID;
$dbo->doQuery($query);
//$gallery = $dbo->loadObjectList();

foreach ($PIDs as $PID)
{
	if ($PID != "")
	{
		$InspirationRelatedProduct = new InspirationRelatedProduct();
		$InspirationRelatedProduct->setVar("IID", $IID);
		$InspirationRelatedProduct->setVar("PID", $PID);
		$InspirationRelatedProduct->store();
	}
}
?>
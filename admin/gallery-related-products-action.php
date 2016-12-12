<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/GalleryRelatedProduct.class.php';

$LGID = $_GET['LGID'];
$ids = $_GET['PIDs'];
$PIDs = explode(",", $ids);

print_r($PIDs);

$query = "Delete from GalleryRelatedProducts where LGID=" . $LGID;
$dbo->doQuery($query);
//$gallery = $dbo->loadObjectList();

foreach ($PIDs as $PID)
{
	if ($PID != "")
	{
		$GalleryRelatedProduct = new GalleryRelatedProduct();
		$GalleryRelatedProduct->setVar("LGID", $LGID);
		$GalleryRelatedProduct->setVar("PID", $PID);
		$GalleryRelatedProduct->store();
	}
}
?>
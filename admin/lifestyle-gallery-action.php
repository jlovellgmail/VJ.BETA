<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/LifestyleGallery.class.php';

$LGID = $_GET['LGID'];

if (isset($LGID) && $LGID != '')
{
	$LifestyleGallery = new LifestyleGallery();
   $LifestyleGallery->initialize($LGID);
	$LifestyleGallery->setVar("Title", $_POST['Title']);
	$LifestyleGallery->setVar("Description", $_POST['Description']);
	$LifestyleGallery->setVar("ImgUrl", $_POST['ImgUrl']);
	$LifestyleGallery->store();
}
else
{
	$LifestyleGallery = new LifestyleGallery();
	$LifestyleGallery->setVar("Title", $_POST['Title']);
	$LifestyleGallery->setVar("Description", $_POST['Description']);
	$LifestyleGallery->setVar("ImgUrl", $_POST['ImgUrl']);
	$LifestyleGallery->store();
	$LGID = $LifestyleGallery->getVar("LGID");
}

header("Location: /admin/lifestyle-gallery-create.php?LGID=" . $LGID);

?>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include 'incs/session_detect.php';
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/LifestyleGallery.class.php';

$LGID = $_GET['LGID'];

if (isset($LGID) || !$LGID == '')
{
	$LifestyleGallery = new LifestyleGallery();
   $LifestyleGallery->initialize($LGID);
	$LifestyleGallery->setVar("DelFlag", 1);
	$LifestyleGallery->store();
}

header("Location: lifestyle-gallery-items.php");
?>
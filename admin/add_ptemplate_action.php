<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/PTemplates.class.php';
include_once($rootpath.'/core/imageUpload.class.php');

$PTID = $_GET['PTID'];
$from = $_GET['from'];

$PTemplates = new PTemplates();

if (isset($from) && $from == "CTemplate")
{
	$PTemplates->setVar("PID", $_POST['PID']);
	$PTemplates->setVar("Name", $_POST['Name']);
	$PTemplates->setVar("Description", $_POST['Description']);
	if (isset($_FILES['ImgUrl']) && is_uploaded_file($_FILES['ImgUrl']['tmp_name'])) {	
    	$image = new imageUpload($_FILES['ImgUrl']);

    	//print_r($image0->getLog());
    	//die();
    	if ($image->uploaded) {
        	$result = $image->saveTemplate();
        	if (!$result) {
            	echo $result;
            	die();
        	} else {
            	$PTemplates->setVar("ImgUrl", $result);
        	}
    	}
	}
	else
	{
		$PTemplates->setVar("ImgUrl", $_POST['CImgUrl']);
	}
}
else
{
	if (!isset($PTID) || $PTID == '') {
		$PTemplates->setVar("PID", $_POST['PID']);
    	$PTemplates->setVar("Name", $_POST['Name']);
    	$PTemplates->setVar("Description", $_POST['Description']);
		//$CTemplates->setVar("ImgUrl", $_POST['ImgUrl']);
	} else {
    	$PTemplates->initialize($PTID);
		$PTemplates->setVar("PID", $_POST['PID']);
    	$PTemplates->setVar("Name", $_POST['Name']);
    	$PTemplates->setVar("Description", $_POST['Description']);
		//$CTemplates->setVar("ImgUrl", $_POST['ImgUrl']);
	}
	
	if (isset($_FILES['ImgUrl']) && is_uploaded_file($_FILES['ImgUrl']['tmp_name'])) {	
    	$image = new imageUpload($_FILES['ImgUrl']);

    	//print_r($image0->getLog());
    	//die();
    	if ($image->uploaded) {
        	$result = $image->saveTemplate();
        	if (!$result) {
            	echo $result;
            	die();
        	} else {
            	$PTemplates->setVar("ImgUrl", $result);
        	}
    	}
	}
}

$PTemplates->store();

$_SESSION["er"] = "false";
header("Location: add-product.php?PID=".$_POST['PID']);
?>

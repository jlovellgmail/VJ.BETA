<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/CTemplates.class.php';
include_once($rootpath.'/core/imageUpload.class.php');

$ErrorRedirect = "add_collection.php";
$CTID = $_GET['CTID'];

$CTemplates = new CTemplates();

if (!isset($CTID) || $CTID == '') {
	$CTemplates->setVar("CID", $_POST['CID']);
    $CTemplates->setVar("Name", $_POST['Name']);
    $CTemplates->setVar("Description", $_POST['Description']);
	//$CTemplates->setVar("ImgUrl", $_POST['ImgUrl']);
} else {
    $CTemplates->initialize($CTID);
	$CTemplates->setVar("CID", $_POST['CID']);
    $CTemplates->setVar("Name", $_POST['Name']);
    $CTemplates->setVar("Description", $_POST['Description']);
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
            $CTemplates->setVar("ImgUrl", $result);
        }
    }
}

$CTemplates->store();

if (isset($CTID) || $CTID != '') {
	if ($result != "")
	{
		$imgUrl = $result;
	}
	else
	{
		$imgUrl = $CTemplates->getVar("ImgUrl");
	}
	$query = "UPDATE ProductTemplates SET Name=:Name, Description=:Description, ImgUrl=:ImgUrl where CTID=" . $CTID;
	$param = array(":Name" => $_POST['Name'], ":Description" => $_POST['Description'], ":ImgUrl" => $imgUrl);
	$dbo->doQueryParam($query, $param);
}

$_SESSION["er"] = "false";
header("Location: add_collection.php?CID=".$_POST['CID']);
?>

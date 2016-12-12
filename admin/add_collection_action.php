<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Collection.class.php';

$ErrorRedirect = "add_collection.php";
$CID = $_GET['CID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if ($_POST['LID'] == "" || $_POST['Name'] == "" || $_POST['Url'] == "") {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($CID) && $CID!=""){
    $query = "Select CID from Collections where lower(Name)=:name and CID != $CID and DelFlag=0";
} else {
    $query = "Select CID from Collections where lower(Name)=:name and DelFlag=0";
}
$param = array(":name" => strtolower($_POST["Name"]));
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0) {
    $_SESSION["er"] = "ex";
    if (isset($SID) && $SID!=""){
        $ErrorRedirect = $ErrorRedirect . "?CID=$CID";
    }
    header("Location: " . $ErrorRedirect);
    exit();
}

$Collection = new Collection();

if (!isset($CID) || $CID == '') {
	$Collection->setVar("LID", $_POST['LID']);
    $Collection->setVar("Name", $_POST['Name']);
	$Collection->setVar("Url", $_POST['Url']);
} else {
    $Collection->initialize($CID);
	$Collection->setVar("LID", $_POST['LID']);
    $Collection->setVar("Name", $_POST['Name']);
	$Collection->setVar("Url", $_POST['Url']);
}

$Collection->store();

$_SESSION["er"] = "false";
header("Location: collections.php");
?>

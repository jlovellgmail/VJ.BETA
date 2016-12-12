<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Size.class.php';

$ErrorRedirect = "add_size.php";
$SID = $_GET['SID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if ($_POST['Size'] == "") {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($SID) && $SID!=""){
    $query = "Select SID from Size where lower(Size)=:size and SID != $SID and DelFlag=0";
} else {
    $query = "Select SID from Size where lower(Size)=:size and DelFlag=0";
}
$param = array(":size" => strtolower($_POST["Size"]));
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0) {
    $_SESSION["er"] = "ex";
    if (isset($SID) && $SID!=""){
        $ErrorRedirect = $ErrorRedirect . "?SID=$SID";
    }
    header("Location: " . $ErrorRedirect);
    exit();
}

$size = new Size();

if (!isset($SID) || $SID == '') {
    $size->setVar("Size", $_POST['Size']);
} else {
    $size->initialize($SID);
    $size->setVar("Size", $_POST['Size']);
}

$size->store();

$_SESSION["er"] = "false";
header("Location: options.php");
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Color.class.php';

$ErrorRedirect = "add_color.php";
$CID = $_GET['CID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if ($_POST['ColorName'] == "") {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($CID) && $CID!=""){
    $query = "Select CID from Colors where lower(ColorName)=:name and CID != $CID and DelFlag=0";
} else {
    $query = "Select CID from Colors where lower(ColorName)=:name and DelFlag=0";
}
$param = array(":name" => strtolower($_POST["ColorName"]));
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0) {
    $_SESSION["er"] = "ex";
    if (isset($CID) && $CID!=""){
        $ErrorRedirect = $ErrorRedirect . "?CID=$CID";
    }
    header("Location: " . $ErrorRedirect);
    exit();
}

$color = new Color();

if (!isset($CID) || $CID == '') {
    $color->setVar("ColorName", $_POST['ColorName']);
} else {
    $color->initialize($CID);
    $color->setVar("ColorName", $_POST['ColorName']);
}

$color->store();

$_SESSION["er"] = "false";
header("Location: options.php");
?>

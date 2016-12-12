<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Type.class.php';

$ErrorRedirect = "add_type.php";
$TID = $_GET['TID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if ($_POST['SID'] == "" || $_POST['TypeName'] == "") {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

$type = new Type();

if (!isset($TID) || $TID == '') {
	$type->setVar("SID", $_POST['SID']);
   $type->setVar("TypeName", $_POST['TypeName']);
} else {
   $type->initialize($TID);
	$type->setVar("SID", $_POST['SID']);
   $type->setVar("TypeName", $_POST['TypeName']);
}

$type->store();

$_SESSION["er"] = "false";
header("Location: types.php");
?>

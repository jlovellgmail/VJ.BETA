<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Style.class.php';

$ErrorRedirect = "/add_style.php";
$SID = $_GET['SID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if ($_POST['Name'] == "") {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($SID) && $SID!=""){
    $query = "Select SID from Styles where lower(Name)=:name and SID != $SID and DelFlag=0";
} else {
    $query = "Select SID from Styles where lower(Name)=:name and DelFlag=0";
}
$param = array(":name" => strtolower($_POST["Name"]));
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

$style = new Style();

if (!isset($SID) || $SID == '') {
    $style->setVar("Name", $_POST['Name']);
} else {
    $style->initialize($SID);
    $style->setVar("Name", $_POST['Name']);
}

$style->store();

$_SESSION["er"] = "false";
header("Location: /styles.php");
?>

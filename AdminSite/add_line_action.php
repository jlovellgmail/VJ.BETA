
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Line.class.php';

$ErrorRedirect = "/add_line.php";
$LID = $_GET['LID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($LID) && $LID != "") {
    $query = "Select LID from Lines where lower(Name)=:name and LID != $LID and DelFlag=0";
} else {
    $query = "Select LID from Lines where lower(Name)=:name and DelFlag=0";
}
$param = array(":name" => strtolower($_POST["Name"]));
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0) {
    $_SESSION["er"] = "ex";
    if (isset($LID) && $LID != "") {
        $ErrorRedirect = $ErrorRedirect . "?LID=$LID";
    }
    header("Location: " . $ErrorRedirect);
    exit();
}

$line = new Line();

if (!isset($LID) || $LID == '') {
    $line->setVar("Name", $_POST['Name']);
    $line->setVar("Tagline", $_POST['Tagline']);
    //$line->setVar("CssClass", $_POST['CssClass']);
   // $line->setVar("ImgUrl", $_POST['ImgUrl']);
} else {
    $line->initialize($LID);
    $line->setVar("Name", $_POST['Name']);
    $line->setVar("Tagline", $_POST['Tagline']);
    //$line->setVar("CssClass", $_POST['CssClass']);
}

$line->store();

$_SESSION["er"] = "false";
header("Location: /lines.php");
?>

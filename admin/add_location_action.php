
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorLocation.class.php';

$ErrorRedirect = "add_location.php";
$LocID = $_GET['LocID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($LocID) && $LocID != "") {
    $query = "Select LocID from AmbassadorLocations where lower(Location)=:location and LocID != $LocID and DelFlag=0";
} else {
    $query = "Select LocID from AmbassadorLocations where lower(Location)=:location and DelFlag=0";
}
$param = array(":location" => strtolower($_POST["Location"]));
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0) {
    $_SESSION["er"] = "ex";
    if (isset($LID) && $LID != "") {
        $ErrorRedirect = $ErrorRedirect . "?LocID=$LocID";
    }
    header("Location: " . $ErrorRedirect);
    exit();
}

$ambassadorLocation = new AmbassadorLocation();

if (!isset($LocID) || $LocID == '') {
    $ambassadorLocation->setVar("Location", $_POST['Location']);
} else {
    $ambassadorLocation->initialize($LocID);
    $ambassadorLocation->setVar("Location", $_POST['Location']);
}

$ambassadorLocation->store();

$_SESSION["er"] = "false";
header("Location: ambassador_locations.php");
?>

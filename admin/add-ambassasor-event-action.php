<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorEvent.class.php';

$EID = $_GET['EID'];

if (isset($EID) && $EID != '')
{
    echo "edit";
    $AmbassadorEvent = new AmbassadorEvent();
    $AmbassadorEvent->initialize($EID);
    $AmbassadorEvent->setVar("AID", "0");
    $AmbassadorEvent->setVar("Name", $_POST['Name']);
    $AmbassadorEvent->setVar("Subtitle", $_POST['Subtitle']);
    $AmbassadorEvent->setVar("EventDate", $_POST['EventDate']);
    $AmbassadorEvent->setVar("Location", $_POST['Location']);
    $AmbassadorEvent->setVar("Description", $_POST['Description']);
    $AmbassadorEvent->setVar("ImgUrl", $_POST['eventImg']);
    $AmbassadorEvent->setVar("Date", $_POST['Date']);
    $AmbassadorEvent->setVar("Time", $_POST['Time']);
    $AmbassadorEvent->store();
}
else
{

    $AmbassadorEvent = new AmbassadorEvent();
    $AmbassadorEvent->setVar("AID", "0");
    $AmbassadorEvent->setVar("Name", $_POST['Name']);
    $AmbassadorEvent->setVar("Subtitle", $_POST['Subtitle']);
    $AmbassadorEvent->setVar("EventDate", $_POST['EventDate']);
    $AmbassadorEvent->setVar("Location", $_POST['Location']);
    $AmbassadorEvent->setVar("Description", $_POST['Description']);
    $AmbassadorEvent->setVar("ImgUrl", $_POST['eventImg']);
    $AmbassadorEvent->setVar("Date", $_POST['Date']);
    $AmbassadorEvent->setVar("Time", $_POST['Time']);
    $AmbassadorEvent->store();
}

header("Location: events.php");
?>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once('/incs/conn.php');
include '/classes/AmbassadorEvent.class.php';

$ids = $_POST['EIDs'];
$EIDs = explode(",", $ids);

foreach ($EIDs as $EID)
{
    if ($EID != "")
    {
        $AmbassadorEvent = new AmbassadorEvent();
        $AmbassadorEvent->initialize($EID);
        $AmbassadorEvent->setVar("DelFlag", 1);
        $AmbassadorEvent->store();
    }
}
?>
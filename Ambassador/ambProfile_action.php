<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Ambassador.class.php';

$AID = $_GET['AID'];
$Ambassador = new Ambassador();

if (isset($AID) || !$AID == '') {
    $Ambassador = new Ambassador();
    $Ambassador->initialize($AID);
    $Ambassador->setVar("LocID", $_POST['Location']);
    $Ambassador->setVar("ProfileIntro", $_POST['ProfileIntro']);
    $Ambassador->store();
}

header("Location: /info.php");
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Ambassador.class.php';

$AID = $_GET['AID'];
$AlignHero = $_GET['AlignHero'];
$Ambassador = new Ambassador();

if (isset($AID) || !$AID == '') {
    $Ambassador = new Ambassador();
    $Ambassador->initialize($AID);
    $Ambassador->setVar("AlignHeroImg", $AlignHero);
    $Ambassador->store();
}
?>
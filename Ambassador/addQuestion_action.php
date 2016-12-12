<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorQuestion.class.php';

$QID = $_GET['QID'];
$AID = $_GET['AID'];
$AmbassadorQuestion = new AmbassadorQuestion();

if (isset($QID) || !$QID == '')
{
	$AmbassadorQuestion = new AmbassadorQuestion();
   	$AmbassadorQuestion->initialize($QID);
	$AmbassadorQuestion->setVar("AID", $AID);
	$AmbassadorQuestion->setVar("Question", $_POST['Question']);
	$AmbassadorQuestion->setVar("Answer", $_POST['Answer']);
	$AmbassadorQuestion->store();
}
else
{
	$AmbassadorQuestion = new AmbassadorQuestion();
	$AmbassadorQuestion->setVar("AID", $AID);
	$AmbassadorQuestion->setVar("Question", $_POST['Question']);
	$AmbassadorQuestion->setVar("Answer", $_POST['Answer']);
	$AmbassadorQuestion->store();
}

header("Location: /info.php");
?>
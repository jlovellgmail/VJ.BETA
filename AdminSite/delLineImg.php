<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Line.class.php';

$LID = $_GET['LID'];

$Line = new Line();
$Line->initialize($LID);
$Line->setVar("ImgUrl", "NULL");
$Line->store();

//header("Location: /add_line.php?LID=".$LID);
?>
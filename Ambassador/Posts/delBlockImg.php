<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/PostBlock.class.php';

$PBID = $_GET['PBID'];

$PostBlock = new PostBlock();
$PostBlock->initialize($PBID);
unlink($rootpath . $PostBlock->getVar("ImgUrl"));
$PostBlock->setVar("ImgUrl", "NULL");
$PostBlock->setVar("MediaType", "NULL");
$PostBlock->store();
?>
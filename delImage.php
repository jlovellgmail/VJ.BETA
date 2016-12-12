<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$rootp = $_SERVER['DOCUMENT_ROOT'];

if (file_exists($rootpath . $delUrl)){
	unlink($rootpath . $delUrl);
}
?>
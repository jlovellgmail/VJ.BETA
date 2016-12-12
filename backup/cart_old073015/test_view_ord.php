<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Order.class.php';
include $rootpath . "/classes/Address.class.php";
include $rootpath . "/classes/CreditCard.class.php";
include $rootpath . "/classes/Product.class.php";


$OrdID = $_GET["OrdID"];
$OrdObj = new Order();
$OrdObj->initialize($OrdID);
print_r($OrdObj);
?>


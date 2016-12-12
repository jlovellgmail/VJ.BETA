<?php
include '/incs/session_detect.php';
include_once('/incs/conn.php');
include '/classes/Product.class.php';

$PID = $_GET['PID'];

if (isset($PID) || !$PID == '')
{
	$Product = new Product();
   	$Product->initialize($PID);
	$Product->setVar("DelFlag", 1);
	$Product->store();
}

header("Location: /products.php");
?>
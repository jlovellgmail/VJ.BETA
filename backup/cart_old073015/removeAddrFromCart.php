<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Address.class.php';
include $rootpath . '/classes/Cart.class.php';

$Type = $_GET['Type'];


session_start();
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Type == 'Shp') {
        $Cart->deleteShipAddr();
        $Cart->delShipNotes();
    } else if ($Type == 'Bil') {
        $Cart->deleteBillAddr();
    }
    $_SESSION["Cart"] = $Cart;
}


?>

<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
//include $rootpath . "/classes/Cart.class.php";
//include $rootpath . "/classes/Product.class.php";

$PID = $_GET["pid"];
$SCPID = $_GET["scpid"];
session_start();
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    $Product = new Product();
    $Product->initialize($PID);
    $Product->setSCProdID($SCPID);
    $Cart->deleteItemFromCart($Product);
    //$Cart->deleteItem($Product);
    //$Cart->deleteItemFromDB($Product);
    $_SESSION["Cart"] = $Cart;
}


header("Location: /cart/");
?>


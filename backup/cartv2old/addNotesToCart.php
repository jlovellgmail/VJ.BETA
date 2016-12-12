<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Address.class.php';
include $rootpath . '/classes/Cart.class.php';
include $rootpath . "/incs/check_login.php";

session_start();
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if (isset($_POST["shipNote"]) && shipNote != "") {
        $Cart->addShipNotes($_POST["shipNote"]);
    }
    $_SESSION["Cart"] = $Cart;
}


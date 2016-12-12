<?php

//include '/incs/session_detect.php';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Address.class.php';

$AddrID = $_GET['AddrID'];

if (isset($AddrID) || !$AddrID == '') {
    $Address = new Address();
    $Address->initialize($AddrID);
    $Address->setVar("DelFlag", 1);
    $Address->store();
}
/*
$from = $_GET['from'];

if ($from == "cart") {
    include $rootpath . '/classes/Cart.class.php';
    session_start();
    if (isset($_SESSION["Cart"])) {
        $Cart = $_SESSION["Cart"];
        //print_r($Cart);
        $ShipAddr = $Cart->getShipAddr();
        $CartAddrID = $ShipAddr->getVar("AddrID");
        if ($CartAddrID == $AddrID) {
            $Cart->deleteShipAddr();
            $_SESSION["Cart"] = $Cart;
            echo "ShipDeleted";
        }
        $BillAddr = $Cart->getBillAddr();
        $CartAddrID = $BillAddr->getVar("AddrID");
        if ($CartAddrID == $AddrID) {
            $Cart->deleteBillAddr();
            $_SESSION["Cart"] = $Cart;
            echo "BillDeleted";
        }
    }
}*/
?>
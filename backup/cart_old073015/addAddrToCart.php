<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Address.class.php';
include $rootpath . '/classes/Cart.class.php';
include $rootpath . "/incs/check_login.php";


$Type = $_GET['Type'];
$Addr = new Address();

if (isset($_GET['AddrID'])) {
    $Addr->initialize($_GET['AddrID']);
    $Addr->setVar("AddrID", $_GET['AddrID']);
} else {
    $Addr->initialize($_POST);
    $Addr->setVar("Type", $Type);
    if (isset($_POST["saveNewAddress"]) &&  $_POST["saveNewAddress"] == "on"){
      $Addr->store();  
    }
}

session_start();
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Type == 'Shp') {
        $Cart->addShipAddr($Addr);
         if (!$logedIn && isset($_POST["Email"])) {
             $Cart->setEmail($_POST["Email"]);
         }
        /* if(isset($_POST["Notes"]) && $_POST["Notes"] !=""){
          $Cart->addShipNotes($_POST["Notes"]);
          }else if (isset($_GET["Notes"]) && $_GET["Notes"] !="") {
          $Cart->addShipNotes($_GET["Notes"]);
          } */
    } else if ($Type == 'Bil') {
        $Cart->addBillAddr($Addr);
    }

    $_SESSION["Cart"] = $Cart;
}


//header("Location: payment.php");

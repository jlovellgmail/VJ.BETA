<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Address.class.php';

//$ErrorRedirect = "/add_line.php";
$AddrID = $_GET['AddrID'];


if (empty($_POST)) {
    $_SESSION["er"] = "e";
    //header("Location: " . $ErrorRedirect);
    exit();
}

if (isset($AddrID) && $AddrID != "") {
    $Addr = new Address();
    $Addr->initialize($AddrID);

    $Addr->setVar('FName', $_POST['FName']);
    $Addr->setVar('LName', $_POST['LName']);
    $Addr->setVar('Addr1', $_POST['Addr1']);
    if ($_POST["Addr2"] == "") {
        $Addr->setVar('Addr2', "NULL");
    } else {
        $Addr->setVar('Addr2', $_POST['Addr2']);
    }
    $Addr->setVar('City', $_POST['City']);
    $Addr->setVar('State', $_POST['State']);
    $Addr->setVar('Postal', $_POST['Postal']);
    $Addr->setVar('Country', $_POST['Country']);
    $Addr->setVar('DateUpdated', date('m/d/Y h:i:s'));

    if (isset($_POST["Phone"])) {
        if ($_POST["Phone"] == "") {
            $Addr->setVar('Phone', "NULL");
        } else {
            $Addr->setVar('Phone', $_POST['Phone']);
        }
    }

    if ($_POST['isPrimary'] == 'on') {
        $Addr->setPrimary();
    } else {
        $Addr->setVar('isPrimary', $_POST['isPrimary']);
    }

    $Addr->store();
} else {
    $Addr = new Address();
    $Addr->initialize($_POST);
    $Addr->setVar('DateUpdated', date('m/d/Y h:i:s'));
    $Addr->store();

    $AddrID = $Addr->getVar('AddrID');
}

echo $AddrID;

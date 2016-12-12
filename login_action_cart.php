<?php

//session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';
include '/classes/Address.class.php';
session_start();

$username = $_POST["email"];
$password = $_POST["passwd"];


/**
 * @var boolean $usernameVal  checks if email is valid format
 */
$usernameVal = filter_var($username, FILTER_VALIDATE_EMAIL);

//if email not valid go back to login page
if (!$usernameVal) {
    echo  "Please enter a valid email address.";
    exit();
}

$sql = "SELECT UsrID, DelFlag, UsrPriv FROM Users WHERE Email = :email";
$param = array(":email" => $username);
$dbconn = database::getInstance();
$dbconn->doQueryParam($sql, $param);
$UsrInfo = $dbconn->loadObjectList();
$num_rows = $dbconn->getRows();

if ($num_rows == 1) {
    if ($UsrInfo[0]["DelFlag"] == 1) {
        echo "This user is deleted.";
        exit();
    } else {
        $usrID = $UsrInfo[0]["UsrID"];
        $user = new Reg_User();
        $user->initialize($usrID);
        $user->decryptPass();
        $passFromDB = $user->getVar("Password");

//strcmp =>compare 2 strings
//If passwords from db and user match log the user in 
        if (trim($passFromDB) == $password) {
            $_SESSION["login"] = true;
            $_SESSION["Name"] = $user->getVar("FName") . " " . $user->getVar("LName");
            $_SESSION["UsrID"] = $UsrInfo[0]["UsrID"];
            $_SESSION["UsrPriv"] = $user->getVar("UsrPriv");
            $_SESSION["UsrEmail"] = $user->getVar("Email");
            $usrID = $UsrInfo[0]["UsrID"];
            if (isset($_SESSION["Cart"])) {
                $sqlUpd = "Update ShopCart set UsrID='" . $usrID . "' where SessionID='" . session_id() . "'";
                $dbconnUpd = database::getInstance();
                $dbconnUpd->doQuery($sqlUpd);
                $ssnCart = $_SESSION["Cart"];
                $ssnCart->setUsr($usrID);
                $ssnCart->setEmail($username);
                $ShipAddr = $ssnCart->getShipAddr();
                if ($ShipAddr->getSaveAddrFlag()){
                    $ShipAddr->setVar("UsrID",$usrID);
                    $ShipAddr->store();
                    $ssnCart->addShipAddr($ShipAddr);
                }
                $BillAddr = $ssnCart->getBillAddr();
                if($BillAddr->getSaveAddrFlag()){
                    $BillAddr->setVar("UsrID",$usrID);
                    $BillAddr->store();
                    $ssnCart->addBillAddr($BillAddr);
                }
                $_SESSION["Cart"] = $ssnCart;
            }
        } else {
           echo "Your password and email login do not match.";
           exit();
        }
    }
} else {
    // if password dont match send an error password
//email does not exist
    echo "This email does not exist.";
}

?>
<?php

//session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';
//include '/classes/Cart.class.php';
//include '/classes/Product.class.php';
session_start();


$ErrorRedirect = "/login.php";


if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

$username = $_POST["email"];
$password = $_POST["passwd"];


/**
 * @var boolean $usernameVal  checks if email is valid format
 */
$usernameVal = filter_var($username, FILTER_VALIDATE_EMAIL);

//if email not valid go back to login page
if (!$usernameVal) {
    $_SESSION["er"] = "em";
    header("Location: " . $ErrorRedirect);
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
        $_SESSION["er"] = "del";
        $redirect = $ErrorRedirect;
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
            $_SESSION["FName"] = $user->getVar("FName");
            $_SESSION["Name"] = $user->getVar("FName") . " " . $user->getVar("LName");
            $_SESSION["UsrID"] = $UsrInfo[0]["UsrID"];
            $_SESSION["UsrPriv"] = $user->getVar("UsrPriv");
            $_SESSION["UsrEmail"] = $user->getVar("Email");
            $usrID = $UsrInfo[0]["UsrID"];
            
            $usrCart = new Cart();
            $sql = "{CALL S_CheckCartExist (@UsrID=:usrID )}";
            $param = array(":usrID" => $usrID);
            $dbconnChk = database::getInstance();
            $dbconnChk->doQueryParam($sql, $param);
            $scRes = $dbconnChk->loadObjectList();
            $noSC = $dbconnChk->getRows();
            if ($noSC > 0) {
                $DBSCID = $scRes[0]["SCID"];
                if (isset($_SESSION["Cart"])) {
                    $ssnCart = $_SESSION["Cart"];
                    $ssnSCID = $ssnCart->getSCID();
                    if ($ssnCart->count() > 0) {
                        foreach ($ssnCart as $productArr) {
                            $SCPID = $productArr["item"]->getId();
                            $sqlUpd = "Update ShopcartProducts set SCID='" . $DBSCID . "' where SCProdID=" . $SCPID;
                            $dbconnUpd = database::getInstance();
                            $dbconnUpd->doQuery($sqlUpd);
                        }
                    }
                    $sqlDel = "Delete from Shopcart where SCID=" . $ssnSCID. " and UsrID=0 and SessionID='".session_id()."'" ;
                    $dbconnDel = database::getInstance();
                    $dbconnDel->doQuery($sqlDel);
                }
                
                $usrCart->initialize($UsrInfo[0]["UsrID"], session_id());
                $usrCart->setEmail($username);
                $usrCart->setUsrMode("existing");
                if ($_GET["from"] != "review") {
                    $_SESSION["Cart"] =  $usrCart;
                }    
                //exit();
            } else {
                //Change the User to Database
                if (isset($_SESSION["Cart"])) {
                    $sqlUpd = "Update ShopCart set UsrID='" . $usrID . "' where SessionID='" . session_id() . "'";
                    $dbconnUpd = database::getInstance();
                    $dbconnUpd->doQuery($sqlUpd);
                    $ssnCart = $_SESSION["Cart"];
                    $ssnCart->setUsr($usrID);
                    $ssnCart->setEmail($username);
                    $ssnCart->setUsrMode("existing");
                    if ($_GET["from"] != "review") {
                        $_SESSION["Cart"] = $ssnCart;
                    }
                }
            }
            if ($_GET["from"] == "checkout") {
                $redirect = "/cart/";
            }else if ($_GET["from"] == "review") {
                $redirect = "/cart/review.php";
            
            }else {
                $redirect = "/";
            }

            /*


              if ($_GET["from"] == "checkout") {
              $userCart = new Cart();
              $userCart->initializeFromDB($UsrInfo[0]["UsrID"]);
              if (isset($_SESSION["Cart"])) {
              $Cart = $_SESSION["Cart"];
              if ($Cart->count() > 0) {
              foreach ($Cart as $productArr) {
              $product = $productArr["item"];
              $prodQty = $productArr["qty"];
              $PID = $product->getId();
              $userCart->addItemToDB($product, $prodQty);
              $userCart->addItem($product, $prodQty);
              }
              }
              header("Location: /cart/checkout.php");
              exit();
              }
              } else {
              $Cart = new Cart();
              $Cart->initializeFromDB($UsrInfo[0]["UsrID"]);
              if (isset($_SESSION["Cart"])) {
              $SsnCart = $_SESSION["Cart"];
              if ($SsnCart->count() > 0) {
              foreach ($SsnCart as $productArr) {
              $product = $productArr["item"];
              $prodQty = $productArr["qty"];
              $PID = $product->getId();
              $Cart->addItemToDB($product, $prodQty);
              $Cart->addItem($product, $prodQty);
              }
              }
              }
              $_SESSION["Cart"] = $Cart;
              } */



            //if (intVal($user->getVar("UsrPriv")) == 100) {
            //    $redirect = "/users.php";
            //} else {
            //$redirect = "/";
            //}
            //}
        }
        // if password dont match send an error password
        else {
            $_SESSION["er"] = "pass";
            $redirect = $ErrorRedirect;
            //exit();
        }
    }
} else {
    //email does not exist
    $_SESSION["er"] = "emex";
    $redirect = $ErrorRedirect;
}
header("Location: $redirect");
?>
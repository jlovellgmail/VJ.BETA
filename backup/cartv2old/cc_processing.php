<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Address.class.php';
include $rootpath . '/classes/Order.class.php';
include $rootpath . '/classes/CreditCard.class.php';
include $rootpath . "/incs/check_login.php";

session_start();
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    try {

        require_once($rootpath . '/core/PayFlowTransaction.class.php'); //assumes it's in the current dir

        $txn = new PayflowTransaction();
        //
        //these are provided by your payflow reseller
        //
        $txn->PARTNER = 'paypal';
        $txn->USER = 'mjcweb';
        $txn->PWD = 'MJC2014mjc!';
        $txn->VENDOR = $txn->USER; //or your vendor name

        $txn->TENDER = 'C'; //sets to a cc transaction
        $txn->TRXTYPE = 'S'; //txn type: sale
        $txn->AMT = $Cart->getTotal(); //amount: 1 dollar
        $txn->ACCT = $Cart->getCreditCard()->getVar("CCNumber"); //cc number
        $txn->EXPDATE = $Cart->getCreditCard()->getVar("CCXMonth") . substr($Cart->getCreditCard()->getVar("CCXYear"), -2); //4 digit
        $txn->FIRSTNAME = $Cart->getCreditCard()->getVar("CCName");
        $txt->CVV2 = $Cart->getCreditCard()->getVar("CCCode");
        $txn->STREET = $Cart->getBillAddr()->getVar("Addr1") . " " . $Cart->getBillAddr()->getVar("Addr2");
        $txn->CITY = $Cart->getBillAddr()->getVar("City");
        if ($Cart->getBillAddr()->getVar("State") != "") {//&& $user->getVar("BState")!="xx" ){
            $txn->STATE = $Cart->getBillAddr()->getVar("State");
        }
        $txn->COUNTRY = $Cart->getBillAddr()->getVar("Country");
        //$txn->debug = true; //uncomment to see debugging information
        //$txn->avs_addr_required = 1; //set to 1 to enable AVS address checking, 2 to force "Y" response
        //$txn->avs_zip_required = 1; //set to 1 to enable AVS zip code checking, 2 to force "Y" response
        //$txn->cvv2_required = 1; //set to 1 to enable cvv2 checking, 2 to force "Y" response
        //$txn->fraud_protection = true; //uncomment to enable fraud protection

        $txn->process();
        if ($txn->txn_successful == 1) {
            $resArr = $txn->response_arr;
            $_SESSION["TransID"] = $resArr["PNREF"];
            $_SESSION["AuthCode"] = $resArr["AUTHCODE"];
            $Order = $Cart->generateOrder();
            $Order->store();
            $_SESSION["Order"] = $Order;
            header("Location: receipt.php");
        }
    } catch (TransactionDataException $tde) {
        //echo 'bad transaction data ' . $tde->getMessage();
        $_SESSION["CCError"] = $tde->getMessage();
        header("Location: checkout.php");
    } catch (InvalidCredentialsException $e) {
        echo 'Invalid credentials';
    } catch (InvalidResponseCodeException $irc) {
        //echo 'bad response code: ' . $irc->getMessage();
        $_SESSION["CCError"] = $irc->getMessage();
        header("Location: checkout.php");
    } catch (AVSException $avse) {
        //echo 'AVS error: ' . $avse->getMessage();
        $_SESSION["CCError"] = 'AVS error: ' . $avse->getMessage();
        header("Location: checkout.php");
    } catch (CVV2Exception $cvve) {
        //echo 'CVV2 error: ' . $cvve->getMessage();
        $_SESSION["CCError"] = 'CVV2 error: ' . $cvve->getMessage();
        header("Location: checkout.php");
    } catch (FraudProtectionException $fpe) {
        //echo 'Fraud Protection error: ' . $fpe->getMessage();
        $_SESSION["CCError"] = 'Fraud Protection error: ' . $fpe->getMessage();
        header("Location: checkout.php");
    } catch (Exception $e) {
        $_SESSION["CCError"] = $e->getMessage();
        header("Location: checkout.php");
//echo $e->getMessage();
    }


//print_r($Order);
}
?>
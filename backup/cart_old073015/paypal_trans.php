<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootpath . "/classes/Cart.class.php";
require_once $rootpath . "/classes/Order.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
require_once $rootpath . "/core/paypal_functions.php";


$cartExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Cart->count() > 0) {
        $cartExist = TRUE;
        $Cart->setPaymMethod("paypal");
        $shipToName=$Cart->getShipAddr()->getVar("FName")." ".$Cart->getShipAddr()->getVar("LName");
        $shipToStreet=$Cart->getShipAddr()->getVar("Addr1");
        $shipToCity=$Cart->getShipAddr()->getVar("City");
        $shipToState=$Cart->getShipAddr()->getVar("State");
        $shipToCountryCode=$Cart->getShipAddr()->getVar("Country");
        $shipToZip=$Cart->getShipAddr()->getVar("Postal");
        $shipToStreet2=$Cart->getShipAddr()->getVar("Addr2");
        $phoneNum=$Cart->getShipAddr()->getVar("Phone");
    }
    else {
        echo "Error exist - Invalid Shopping cart.";
        exit();
    }
}

$paymentAmount = $Cart->getTotal();
$currencyCodeType = "USD";
$paymentType = "Sale";

$_SESSION["currencyCodeType"] = $currencyCodeType;
$_SESSION["PaymentType"] = $paymentType;
$_SESSION["Payment_Amount"] = $paymentAmount;


$returnURL = "http://www.virgiljames.net/cart/paypal_trans.php";

$cancelURL = "http://www.virgiljames.net/cart/checkout.php";


if (isset($_GET["PayerID"])&& $_GET["PayerID"] <> "" ) {
    //redirect to confirmation;
    $_SESSION["payer_id"]=$_GET["PayerID"];
    header("Location: review.php");
    
}elseif ($_GET["action"]=="process"){
    $token = "";
    if (isset($_SESSION["TOKEN"])) {
        $token = $_SESSION["TOKEN"];
    }
    //echo $token;
    if ($token != "") {
        $finalPaymentAmount = $Cart->getTotal();
        $resArray = ConfirmPayment($finalPaymentAmount);
        $ack = strtoupper($resArray["ACK"]);
        if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
            $transactionId = $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
            $transactionType = $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
            $paymentType = $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
            $orderTime = $resArray["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
            $amt = $resArray["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
            $currencyCode = $resArray["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
            $feeAmt = $resArray["PAYMENTINFO_0_FEEAMT"];  //' PayPal fee amount charged for the transaction
            //$settleAmt = $resArray["PAYMENTINFO_0_SETTLEAMT"];  //' Amount deposited in your PayPal account after a currency conversion.
            //$taxAmt = $resArray["PAYMENTINFO_0_TAXAMT"];  //' Tax charged on the transaction.
            $_SESSION["TransID"] = $transactionId;
            //$_SESSION["AuthCode"] = $resArr["AUTHCODE"];
            
            $Order = $Cart->generateOrder();
            $Order->store();
            $_SESSION["Order"]=$Order;
            header("Location: receipt.php");
            
            //echo $transactionId;
        } else {
            //Display a user friendly Error on the page using any of the following error information returned by PayPal
            $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
            $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
            $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
            $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

            echo "GetExpressCheckoutDetails API call failed. ";
            echo "Detailed Error Message: " . $ErrorLongMsg;
            echo "Short Error Message: " . $ErrorShortMsg;
            echo "Error Code: " . $ErrorCode;
            echo "Error Severity Code: " . $ErrorSeverityCode;
        }
    }
} 

else {
    //$resArray = CallShortcutExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
    $resArray =CallMarkExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL, $shipToName, $shipToStreet, $shipToCity, $shipToState, $shipToCountryCode, $shipToZip, $shipToStreet2, $phoneNum);
    $ack = strtoupper($resArray["ACK"]);
    if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
        RedirectToPayPal($resArray["TOKEN"]);
    } else {
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

        echo "SetExpressCheckout API call failed. ";
        echo "Detailed Error Message: " . $ErrorLongMsg;
        echo "Short Error Message: " . $ErrorShortMsg;
        echo "Error Code: " . $ErrorCode;
        echo "Error Severity Code: " . $ErrorSeverityCode;
    }

}
?>
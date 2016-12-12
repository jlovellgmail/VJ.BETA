<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];

include_once($rootpath . '/incs/conn.php');
include($rootpath . '/classes/Cart.class.php');
include($rootpath . '/core/Item.class.php');
include $rootpath .'/classes/OrderArt.class.php';
include("paypal_functions.php");
session_start();

if (isset($_SESSION["Cart"])) {
    $cart = $_SESSION["Cart"];
} else {
    if (isset($_SESSION["UsrID"])) {
        $cart = new Cart($_SESSION["UsrID"]);
    } else {
        $cart = new Cart(0);
    }
    $_SESSION["Cart"] = $cart;
}


$paymentAmount = $cart->getTotal();
$currencyCodeType = "USD";
$paymentType = "Sale";

$_SESSION["currencyCodeType"] = $currencyCodeType;
$_SESSION["PaymentType"] = $paymentType;
$_SESSION["Payment_Amount"] = $paymentAmount;

$returnURL = "http://www.artgallery73.com/shopcart/paypal_trans.php";

$cancelURL = "http://www.artgallery73.com/shopcart/cart_paym_opt.php";

if (isset($_GET["PayerID"])&& $_GET["PayerID"] <> "" ) {
    //redirect to confirmation;
    //$token = "";
    //if (isset($_REQUEST['token'])) {
      //  $token = $_REQUEST['token'];
    //}
    //$_SESSION["PP_TOKEN"]=
    $_SESSION["payer_id"]=$_GET["PayerID"];
    header("Location: cart_submit.php?from=paypal");
    
}elseif ($_GET["action"]=="process"){
    $token = "";
    if (isset($_SESSION["TOKEN"])) {
        $token = $_SESSION["TOKEN"];
    }
    //echo $token;
    if ($token != "") {
        $finalPaymentAmount = $cart->getTotal();
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
            $ord=new OrderArt();
            $ord->initializeByCart($cart, "paypal");
            $ord->store();
            header("Location: cart_receipt.php?OrdID=".$ord->getOrdID());
            
            echo $transactionId;
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
    $resArray = CallShortcutExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
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
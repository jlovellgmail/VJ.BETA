<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootpath . "/core/paypal_functions.php";
$paymentAmount = 1;
$currencyCodeType = "USD";
$paymentType = "Sale";

$returnURL = "https://www.careercontessa.com/test_paypal.php";

$cancelURL = "https://www.careercontessa.com/test_paypal.php";

if (isset($_GET["PayerID"]) && $_GET["PayerID"] <> "") {
} else {
	 $resArray = CallShortcutExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
    $ack = strtoupper($resArray["ACK"]);
    if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
        
        RedirectToPayPal($resArray["TOKEN"]);
    } else {
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
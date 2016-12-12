<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

$rootpath = $_SERVER['DOCUMENT_ROOT'];
//include_once('/incs/session_detect.php');
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Reg_User.class.php';
require_once $rootpath . "/classes/Order.class.php";
require_once $rootpath . "/classes/Address.class.php";
$ErrorRedirect = "/login.php";
session_start();

if (empty($_POST)) {
    echo "Invalid Data. Please submit again.";
    exit();
}

if ($_POST['Email'] == "" || $_POST['Password'] == "") {
    echo "Invalid Data. Please submit again.";
    exit();
}

if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email . Please change your email and try again.";
    exit();
}

$email = $_POST['Email'];
$password = $_POST["Password"];
$query = "Select UsrID from Users where Email=:usremail";
$param = array(":usremail" => $email);
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0) {
    echo "Email already exist in our database.";
    exit();
} else {


    if (isset($_SESSION["Order"])) {
        $Order = $_SESSION["Order"];
        if ($Order->count() > 0) {
            $orderExist = TRUE;
            $ShipAddr = $Order->getVar("ShippingAddr");
            $user = new Reg_User();
            $user->setVar("FName", $ShipAddr->getVar("FName"));
            $user->setVar("LName", $ShipAddr->getVar("LName"));
            $user->setVar("Email", $email);
            $user->setVar("Password", $password);
            $user->setVar("UsrPriv", 5);
            $user->encryptPass();
            $user->store();

            $UsrID = $user->getVar("UsrID");

            $Rndnumber = $UsrID . "-" . rand(1000000000, 9999999999);
            $user->setVar("EmailToken", $Rndnumber);

            $user->store();
            
            $OrdID=$Order->getOrdID();
            if (isset($OrdID) && $OrdID!=""){
                $queryUpd = "Update Orders Set UsrID=".$UsrID." where OrdID=:ordid";
                $param = array(":ordid" => $OrdID);
                $dboUpd = database::getInstance();
                $dboUpd->doQueryParam($queryUpd, $param);
            }
        }
    }

    $to = $user->getVar("Email");
    $subject = "Virgil James - Registration Confirmation";

    $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title>Registration Confirmation</title>
				</head>
				<body style="margin: 0 0 0 0; color:#6D6F71; background-color:#f5f6f6;  background: url(http://virgiljames.net/img/bg/canvas_background_texture_400x400_v4.jpg) repeat center;
				}">
				<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f5f6f6"  style="margin:0 0 0 0; padding:0 0 0 0; background-color:#f5f6f6;  background: url(http://virgiljames.net/img/bg/canvas_background_texture_400x400_v4.jpg) repeat center;">
				    <tr>
				        <td bgcolor="#f5f6f6" style="background-color:#f5f6f6;  background: url(http://virgiljames.net/img/bg/canvas_background_texture_400x400_v4.jpg) repeat center; padding-top:45px;" ><!--WRAPPER TABLE BEGIN-->
				            
				            <table style="font-size:12px; width:600px; margin:0 auto; font-family:Helvetica, Arial, Helvetica, sans-serif; font-weight:300; color:#6D6F71;position:relative;
				            background:#fff;
				            -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) ;
				            -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) ;
				            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) ;" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
				                <tr>
				                    <td><!--HEADER ELEMENTS BEGIN-->
				                        
				                        <table style="width:100%; 
				            
				      " cellpadding="0" cellspacing="0">
				                            <tr>
				                                <td><table style="width:600px;" cellpadding="0" cellspacing="0">
				                                        <tr>
				                                            <td style="padding-top:20px; padding-bottom:0; text-align:center;"><img src="http://www.virgiljames.net/img/vj_logo.png" alt="" border="0" width="250" /></td>
				                                        </tr>
				                                    </table></td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:15px 15px 10px 15px;"><div style="border-top:1px dashed #e6e6e6;">&nbsp;</div></td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:0 15px 0 15px;">Hello,</td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:0px 15px 0 15px;"><p>Thank you for your interest in <span  style="color:#928b53;"><b>Virgil James</b></span>. Your account will allow you to manage your information and track your orders. If you need any assistance, please contact us at:  customerservice@virgiljames.com .</p>
				                                    <p>Please click this link to confirm your email account:<br />
				                                        <a href="#" style="color:#928b53;">http://virgiljames.net/emailConf.php?EmailToken=' . $Rndnumber . '</a></p>
				                                    <br />
				                                    <p>See you soon on <a href="http://virgiljames.com" target="_blank" style="color:#928b53;"><b>VirgilJames.com</b></p></td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:15px 15px 10px 15px;"><div style="border-top:1px dashed #e6e6e6;">&nbsp;</div></td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:0 15px 0 15px;">Virgil James Customer Service</td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:0px 15px 0 15px;"> Tel: 858 555 555</td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:0px 15px 0 15px;"> Monday through Friday 8am 5pm</td>
				                            </tr>
				                            
				                                <td style="font-size:14px; padding:0px 15px 0 15px;"> customerservice@virgiljames.com</td>
				                            </tr>
				                            <tr>
				                                <td style="font-size:14px; padding:20px 15px; text-transform:uppercase;">Virgil James &bull; 214 N. Cedros Ave. &bull; Solana Beach, Ca 92075</td>
				                            </tr>
				                        </table></td>
				                </tr>
				                <tr>
				                    <td style="height:30px; background-color:#e6e6e6"></td>
				                </tr>
				            </table></td>
				    </tr>
				</table>
				</body>
				</html>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <customerservice@virgiljames.com>" . "\r\n";

    mail($to, $subject, $message, $headers);
}
?>

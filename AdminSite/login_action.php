<?php

//session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';

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
        //exit();
    } else {
        $usrID = $UsrInfo[0]["UsrID"];
        $user = new Reg_User();
        $user->initialize($usrID);
		if ($user->getVar('UsrPriv') != "100")
		{
			$_SESSION["er"] = "adu";
	        header("Location: " . $ErrorRedirect);
	        exit();
		}
		
        $user->decryptPass();
        $passFromDB = $user->getVar("Password");

        //strcmp =>compare 2 strings
        //If passwords from db and user match log the user in 
        if (trim($passFromDB) == $password) {

            $_SESSION["login"] = true;
            $_SESSION["Name"] = $user->getVar("FName") . " " . $user->getVar("LName");
            $_SESSION["UsrID"] = $UsrInfo[0]["UsrID"];
            $_SESSION["UsrPriv"] = $user->getVar("UsrPriv");

            if (intVal($user->getVar("UsrPriv")) == 100) {
                $redirect = "/users.php";
            } else {
                $redirect = "/index.php";
            }
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
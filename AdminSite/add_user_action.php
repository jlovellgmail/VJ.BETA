
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';
include '/classes/Ambassador.class.php';

$queryString = $_SERVER["QUERY_STRING"];
if ($queryString != "")
{
	$ErrorRedirect = "/add_user.php?" . $queryString;
}
else
{
	$ErrorRedirect = "/add_user.php";
}

$UsrID = $_GET['UsrID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (!isset($UsrID) || $UsrID == '') {
	if ($_POST['FName'] == "" || $_POST['LName'] == "" || $_POST['Email'] == "" || $_POST['Password'] == "") {
	    $_SESSION["er"] = "e";
	    header("Location: " . $ErrorRedirect);
	    exit();
	}
} else {
	if ($_POST['FName'] == "" || $_POST['LName'] == "" || $_POST['Email'] == "") {
	    $_SESSION["er"] = "e";
	    header("Location: " . $ErrorRedirect);
	    exit();
	}
}

if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["er"] = "em";
    header("Location: " . $ErrorRedirect);
    exit();
}

if ($_POST["Password"] != $_POST["Password_Conf"]) {
    $_SESSION["er"] = "pw";
    header("Location: " . $ErrorRedirect);
    exit();
}

$email = $_POST['Email'];
$query = "Select UsrID from Users where Email=:usremail";
$param = array(":usremail" => $email);
$dbo = database::getInstance();
$dbo->doQueryParam($query, $param);
$dbo->loadObjectList();
$Arr = $dbo->getRows();

if ($Arr > 0 && (!isset($UsrID) || $UsrID == '')) {
    $_SESSION["er"] = "ue";
    header("Location: " . $ErrorRedirect);
} else {
    $user = new Reg_User();

    if (!isset($UsrID) || $UsrID == '') {
        $user->initialize($_POST);
        $user->setVar("UsrPriv", 5);
		$user->encryptPass();
    } else {
        $user->initialize($UsrID);
		if ($Arr > 0 && $_POST['Email'] != $user->getVar('Email'))
		{
			$_SESSION["er"] = "ue";
  			header("Location: " . $ErrorRedirect);
			exit();
		}
        $user->setVar("FName", $_POST['FName']);
        $user->setVar("LName", $_POST['LName']);
        $user->setVar("Email", $_POST['Email']);
        $user->setVar("UsrPriv", $_POST['UsrPriv']);
        
        $query = "{call F_GetAmbassadorID (@UsrID=:UsrID)}";
    	  $param = array(":UsrID" => $UsrID);
    	  $dbo->doQueryParam($query, $param);
    	  $AmbID = $dbo->loadObjectList();
    	  $AID = $AmbID[0]['AID'];
    			
        if ($_POST['UsrPriv'] == "80")
        {
    			if ($AID == "")
    			{
    				$Ambassador = new Ambassador();
    				$Ambassador->setVar("UsrID", $UsrID);
    				$Ambassador->setVar("LocID", $_POST["Location"]);
    				$count = 0;
					$isNew = false;
					$PermLinkKey = '';
					while($isNew == false)
					{
						if ($count == 0)
						{
							$PermLinkKey = $_POST['FName'] . "-" . $_POST['LName'];
						}
						else
						{
							$PermLinkKey = $_POST['FName'] . "-" . $_POST['LName'] . "-" . $count;
						}
			
						$query = "{call F_CheckAmbassadorPermLink (@PermLinkKey=:PermLinkKey)}";
						$param = array(":PermLinkKey" => $PermLinkKey);
	        			$dbo->doQueryParam($query, $param);
	        			$list = $dbo->loadObjectList();
						if ($list[0]["linkCount"] == "0")
						{
							$isNew = true;
						}
						else
						{
							$count++;
						}
					}
					$Ambassador->setVar('PermLinkKey', $PermLinkKey);
					$Ambassador->store();
    			}
    			else
    			{
    				$Ambassador = new Ambassador();
    				$Ambassador->initialize($AID);
    				$Ambassador->setVar("DelFlag", "0");
    				$Ambassador->setVar("LocID", $_POST["Location"]);
    				$Ambassador->store();
    			}
        }
        else
        {
        		if ($AID != "")
        		{
        			$Ambassador = new Ambassador();
    				$Ambassador->initialize($AID);
    				$Ambassador->setVar("DelFlag", 1);
    				$Ambassador->store();
        		}
        }
    }

    $user->store();

    $UsrID = $user->getVar("UsrID");

    $_SESSION["er"] = "false";
    header("Location: /users.php");
}
?>

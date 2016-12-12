
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';
include '/classes/Ambassador.class.php';

$ErrorRedirect = "/add_ambassador.php";
$AID = $_GET['AID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}

if (!isset($AID) || $AID == '')
{
	if ($_POST['FName'] == "" || $_POST['LName'] == "" || $_POST['Email'] == "" || $_POST['Password'] == "") {
	    $_SESSION["er"] = "e";
	    header("Location: " . $ErrorRedirect);
	    exit();
	}
}
else
{
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

if ($Arr > 0 && (!isset($AID) || $AID == '')) {
    $_SESSION["er"] = "ue";
    header("Location: " . $ErrorRedirect);
} else {
    $user = new Reg_User();

    if (!isset($AID) || $AID == '') {
        $user->initialize($_POST);
        $user->setVar("UsrPriv", $_POST['Role']);
		$user->encryptPass();
		
		$user->store();

	    $UsrID = $user->getVar("UsrID");
		
		$Ambassador = new Ambassador();
		
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
		
		$Ambassador->setVar('UsrID', $UsrID);
		$Ambassador->setVar('LocID', $_POST['Location']);
		$Ambassador->setVar('PermLinkKey', $PermLinkKey);
		$Ambassador->store();
    } else {
		$Ambassador = new Ambassador();
		$Ambassador->initialize($AID);
		$Ambassador->setVar('LocID', $_POST['Location']);
		$Ambassador->store();
		
		$UsrID = $Ambassador->getVar('UsrID');
		
        $user->initialize($UsrID);
        $user->setVar("FName", $_POST['FName']);
        $user->setVar("LName", $_POST['LName']);
        $user->setVar("Email", $_POST['Email']);
		$user->setVar("UsrPriv", $_POST['Role']);
		
		$user->store();
    }
    
    $_SESSION["er"] = "false";
    header("Location: /ambassadors.php");
}
?>

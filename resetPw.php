<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$header_style = 'header-static'; 
$main_nav_page = 'resetPass';
$admin_area = 'false'; 
//ini_set('display_errors',1); 
//error_reporting(E_ALL);
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';

$token = $_GET['token'];
$TknErr = true;
$user;
$ExpErr = false;
if (isset($token) && $token != "") {
    $tokenArr = explode("-", $token);
    $UsrID = $tokenArr[0];
    $user = new Reg_User();
    $user->initialize($UsrID);

    if ($user->getVar("ReSetPassToken") != $token) {
        $TknErr = true;
    } else {
        $TknErr = false;
    }

    $PassDate = new DateTime($user->getVar("ReSetPassDate"));
    $DateNow = new DateTime('now');
    $DateDiff = $DateNow->diff($PassDate);

    $Day = intval($DateDiff->format('%d'));
    if ($Day > 0) {
        $ExpErr = true;
    }
} else {
    $TknErr = true;
}

$PswErr;
if (!$TknErr) {
    if (isset($_GET["action"]) && $_GET["action"] == "reset") {
        if ($_POST["Password"] == $_POST["Password_Conf"]) {
            $user->setVar("Password", $_POST["Password"]);
            $user->encryptPass();
            $user->setVar("ReSetPassToken", "");
            $user->setVar("ReSetPassDate", "");
            $user->store();

            $PswErr = false;
        } else {
            $PswErr = true;
        }
    }
}
?>
<!doctype html>
<?php $page = "login"; ?>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login | Virgil James</title>
    
	<?php include '/incs/head-links.php'; ?>
    
    <link rel="stylesheet" href="/css/forms.css">
	<script src="/js/login_validation.js"></script>
</head>
<body>

<div class="sdWrapper">
    <div class="sdContent">
        <?php include '/incs/nav.php'; ?>
        <?php include '/incs/resetPw.php'; ?>
    </div>
	<?php include '/incs/footer.php'; ?>
    <?php include '/incs/footer-links.php'; ?>
</div>

</body>
</html>
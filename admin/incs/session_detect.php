<?php
$logedIn = false;
/*if ($_SERVER['HTTP_HOST'] != "www.careercontessa.com") {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: http://www.careercontessa.com" . $_SERVER['REQUEST_URI']);
    exit;
}*/
if (!isset($_SESSION)) {
    session_start();
}

if (!(isset($_SESSION["login"]) && $_SESSION["login"])) {
    $_SESSION["er"] = "exp";
    header("Location: /login.php");
    exit;
} else {
    $UsrPriv = $_SESSION["UsrPriv"];
    if ($UsrPriv <90) {
        echo "Access to this web page is denied.";
        die();
    } else {
        $logedIn = true;
	}
}

?>

<!doctype html>
<?php
$page = "home";
$rootpath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootpath . "/classes/Order.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
require_once $rootpath . "/core/Countries.class.php";
require_once $rootpath . "/classes/CreditCard.class.php";
include $rootpath . "/incs/check_login.php";

$orderExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_SESSION["Order"])) {
    $Order = $_SESSION["Order"];
    if ($Order->count() > 0) {
        $orderExist = TRUE;
    }
} else {
    header("Location: /cart/");
}

$Countries = new Countries();
?>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Order Received | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="../css/cart.css" />
        <link rel="stylesheet" href="../css/forms.css" />
        <script src="js/cart.js" type="text/javascript"></script>

    </head>
    <body class="cartBody">

        <?php include '../incs/nav.php'; ?>

        <?php include 'incs/receipt.php'; ?>

        <?php include '../incs/footer.php'; ?>

        <?php include '../incs/footer-links.php'; ?>

    </body>
</html>
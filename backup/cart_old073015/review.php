<!doctype html>
<?php
$page = "home";
$page2 = "cartReview";
$rootpath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootpath . "/classes/Cart.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
require_once $rootpath . "/classes/CreditCard.class.php";
require_once $rootpath . "/core/Countries.class.php";
include $rootpath . "/incs/check_login.php";

$cartExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}
//unset($_SESSION["Cart"]);
$Notes="";
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Cart->count() > 0) {
        $cartExist = TRUE;
        $PaymMethod=$Cart->getPaymMethod();
        $Notes = $Cart->getShipNotes();
    }
}


if (!isset($UsrID) || $UsrID == '') {
    if (isset($_GET['UsrID']) && $_GET['UsrID'] != "") {
        $UsrID = $_GET['UsrID'];
    } else {
        $UsrID = $_SESSION['UsrID'];
    }
}

$Countries = new Countries();
//print_r($Cart);
//exit();
?>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Checkout | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/cart.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <script>
            $(window).on("load resize scroll", function (e) {
                var heights = $(".eqHeightJs_01").map(function () {
                    return $(this).height();
                }).get(),
                        maxHeight = Math.max.apply(null, heights);
                $(".eqHeightJs_01").height(maxHeight);
            });
        </script>
        <!--<script src="/js/userInfo.js"></script>-->
         <script src="/js/address.js"></script>
         <script src="js/cart.js"></script>
    </head>
    <body>
    <div class="sdWrapper">
    <div class="sdContent">

        <!-- Navgivation -->
        <?php include '../incs/nav.php'; ?>

        <?php include 'incs/review.php'; ?>

        </div>
        <?php include '../incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '../incs/footer-links.php'; ?>
        </div>
    </body>
</html>
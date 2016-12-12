<!doctype html>
<?php
$page = "home";
$page2 = "cartHome";

$rootpath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootpath . "/classes/Cart.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
include $rootpath . "/incs/check_login.php";

$cartExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Cart->count() > 0) {
        $cartExist = TRUE;
    }
}

//print_r($Cart);
//exit();
?>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Cart | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/cart.css" />
        <link rel="stylesheet" href="/css/forms.css" />

        <script src="js/cart.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <!-- Navgivation -->
                <?php include '../incs/nav.php'; ?>

                <!-- Top Hero -->
                <!--<div class="bgWrapperLeaf h60vh cartHeroBgWrapper">
                    <div class="widthWrapper">
                        <div class="tableWrapper">
                            <div class="cellWrapper">
                                <span class="cartHeroLine1">Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>-->

                <div class="bgWrapperLeaf">
                    <div class="leafWrapper cartHeroBgWrapper">
                        <div class="tableWrapper">
                            <div class="cellWrapper">
                                <div class="widthWrapper" style="padding-left:0; padding-right:0;">
                                    <div class="cartHeroLine1">My Cart</div>
                                    <br><br><?php include 'incs/cart_nav.php'; ?><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        

                <div class="bgWrapper cartBgWrapper">
                    <?php include 'incs/cart.php'; ?>
                </div>
            </div>
            <!-- Footer -->
            <?php include '../incs/footer.php'; ?>

            <!-- Common .js Includes -->
            <?php include '../incs/footer-links.php'; ?>
        </div>
    </body>
</html>
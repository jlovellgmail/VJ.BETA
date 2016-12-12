<!doctype html>
<?php
$page = "home";
$rootpath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootpath . "/classes/Cart.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
include $rootpath . "/incs/check_login.php";

$cartExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}
//unset($_SESSION["Cart"]);
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Cart->count() > 0) {
        $cartExist = TRUE;
    }
}
?>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Checkout | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/cart.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <script src="/js/address.js"></script>
        <script>
            var shipAddrExist = false;
            var billAddrExist = false;
            $(document).ready(function () {

                $('#ccPaymentSelect').click(function () {
                    $('.guestCheckoutInputs').slideDown();
                    $('.paypalMessage').slideUp();
                    document.getElementById('continueButton').innerHTML = "Review Order";
                    document.getElementById('continueButton').href = "javascript:chekoutSubmit('<?php echo $logedIn; ?>')";
                    setTimeout(function () {
                        $('#continueButton').removeClass("hide");
                    }, 400);
                    setPrimShipAddr();
                    setPrimBillAddr();

                });
                $('#paypalPaymentSelect').click(function () {
                    $('.paypalMessage').slideDown();
                    $('.guestCheckoutInputs').slideUp();
                    document.getElementById('continueButton').innerHTML = 'Continue to PayPal';
                    document.getElementById('continueButton').href = 'https://paypal.com';
                    setTimeout(function () {
                        $('#continueButton').removeClass("hide");
                    }, 400);
                });
                $("input[type=text]").click(function () {
                    $(this).removeClass("formError");
                });
                $("input[type=email]").click(function () {
                    $(this).removeClass("formError");
                });
                $("select").change(function () {
                    $(this).removeClass("formError");
                });
                $("#sameAddr").change(function () {
                    if (this.checked) {
                        copyShipToBill();
                    }
                });

            });
        </script>
        <script src="cart.js" type="text/javascript"></script>
        <script src="/js/validation.js" type="text/javascript"></script>
    </head>
    <body class="cartBody">

        <!-- Navgivation -->
        <?php include '../incs/nav.php'; ?>

        <div class="scrollWaypoint"></div>

        <!-- Top Hero -->
        <div class="bgWrapper cartHeroBgWrapper">
            <div class="widthWrapper">
                <div class="tableWrapper tableHeight">
                    <div class="cellWrapper">
                        <span class="cartHeroLine1">Checkout</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bgWrapper checkoutBgWrapper">
            <div class="widthWrapper">
                <div class="tableWrapper tableHeight">
                    <div class="cellWrapper">

                        <div>
                            <div class="formValidateMessage error" style="display:none;">Please check the form below for errors.</div>
                            <div class="checkoutFormFieldsWrapper md-six lg-five">
                                <?php include 'incs/paym_options.php'; ?>
                                <div id="AddressDiv" class="guestCheckoutInputs" style="display:none;">
                                    <?php
                                    if ($logedIn) {
                                        include 'incs/user_info.php';
                                    } else {
                                        include 'incs/guest_info.php';
                                    }
                                    ?>

                                </div>
                            </div><!-- 
                            --><?php include 'incs/cart_overview.php'; ?>
                            <a class="continueButton hide" id="continueButton" href="#" onClick="">Continue</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include '../incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '../incs/footer-links.php'; ?>
    </body>
</html>
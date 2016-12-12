<!doctype html>
<?php
$page = "home";
$page2 = "cartCheckout";

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
        <script src="/js/address.js"></script>
        <script>
            var shipAddrExist = false;
            var billAddrExist = false;
            var genHeight = 0;
            var ccValid = false;

            $(document).ready(function () {
<?php if ($logedIn) { ?>
           //         setPrimShipAddr();
<?php } ?>
                $('#ccPaymentSelect').click(function () {

                    $('#ccBillInfo').slideDown();
                    $('.paypalMessage').slideUp();
                    document.getElementById('continueButton').innerHTML = "Review Order";
                    document.getElementById('continueButton').href = "javascript:chekoutSubmit('<?php echo $logedIn; ?>')";
                    setTimeout(function () {
                        $('#continueButton').removeClass("hide");
                    }, 400);
<?php if ($logedIn) { ?>
            //            setPrimBillAddr();
<?php } ?>


                });
                $('#paypalPaymentSelect').click(function () {
                    $('.paypalMessage').slideDown();
                    $('#ccBillInfo').slideUp();
                    document.getElementById('continueButton').innerHTML = "Continue to PayPal";
                    document.getElementById('continueButton').href = "javascript:checkoutPaypal('<?php echo $logedIn; ?>')";
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
<?php if ($logedIn) { ?>
                            setSame();
                            billAddrExist = true;
<?php } else { ?>
                            copyShipToBill();
<?php } ?>
                    } else {
<?php if ($logedIn) { ?>
                            removeAddrFromSession('Bil');
                            billAddrExist = false;
                            $("#usrInfoBillAddrs").show();
<?php } else { ?>
                            emptyBilAddr();
<?php } ?>
                    }
                });

            });
        </script>
        <script src="cart.js" type="text/javascript"></script>
        <script src="/js/validation.js" type="text/javascript"></script>
        <script src="/js/jquery.creditCardValidator.js"></script>
        <script>
            $(function () {
                $('#ccCardType input').validateCreditCard(function (result) {
                    var getCardType = (result.card_type == null ? '-' : result.card_type.name);
                    $("#ccCardType").removeAttr("class");
                    $('#ccCardType').addClass(getCardType);
                    if (result.valid) {
                        ccValid = true;
                        return $("#ccCardType label").addClass('valid');
                    } else {
                        ccValid = false;
                        return $("#ccCardType label").removeClass('valid');
                    }
                });
            });
        </script>
        <script>
         /*   $(window).on("load resize scroll", function (e) {
                var heights = $(".eqHeightJs01").map(function () {
                    return $(this).height();
                }).get(),
                        maxHeight = Math.max.apply(null, heights);
                genHeight = maxHeight;
                $(".eqHeightJs01").height(maxHeight);
            });*/
        </script>
    </head>
    <body class="cartBody">

        <!-- Navgivation -->
        <?php include '../incs/nav.php'; ?>


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

        <div class="bgWrapper checkoutBgWrapper">
            <div class="widthWrapper">
                <div class="tableWrapper tableHeight">
                    <div class="cellWrapper">

                        <div>
                            <?php include 'incs/cart_overview.php'; ?>
                            <!--<div class="formValidateMessage error" style="display:none;">Please check the form below for errors.</div>-->
                            <div class="checkoutFormFieldsWrapper sm-twelve">
                               
                                
                                <?php include 'incs/user_shipping.php'; ?>
                                
								<?php include 'incs/paym_options.php'; ?>

                                <?php include 'incs/user_billing.php'; ?>
                                                                
                                
                                <!--<form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
                                    <div style="" id="usrInfoShipAddrs">
                                        <?php // include 'incs/user_shp_addrs.php'; ?>
                                    </div>    
                                </form>-->
                                
                               <!-- <div id="AddressDiv" class="guestCheckoutInputs">
                                    <?php /*
                                    if ($logedIn) {
                                        include 'incs/user_info.php';
                                    } else {
                                        include 'incs/guest_info.php';
                                    }
                                    */?>

                                </div>-->
                            </div><!-- 
                            -->
                            <a class="continueButton hide" id="continueButton" href="#" onClick="">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include '../incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '../incs/footer-links.php'; ?>

		<script>
        //TOGGLE DIV DIV - USES DATA ID
        $(function() {
            $('.toggleDivBtn').on("click load resize scroll", function (e) {
                var heights = $(".eqHeightJs").map(function () {
                    return $(this).height();
                }).get(),
                        maxHeight = Math.max.apply(null, heights);
                genHeight = maxHeight;
                $(".eqHeightJs01").height(maxHeight);
            });
        });
        </script>
    </body>
</html>
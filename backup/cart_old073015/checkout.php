<!doctype html>
<?php
$page = "home";
$page2 = "cartCheckout";

$rootpath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootpath . "/classes/Cart.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
require_once $rootpath . "/classes/CreditCard.class.php";
include $rootpath . "/incs/check_login.php";

$cartExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}
$paymMeth = "";
//unset($_SESSION["Cart"]);
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Cart->count() > 0) {
        $cartExist = TRUE;
        $paymMeth = $Cart->getPaymMethod();
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
        <script src="js/cart.js" type="text/javascript"></script>
        <script src="/js/validation.js" type="text/javascript"></script>
        <script src="/js/jquery.creditCardValidator.js"></script>
    </head>
    <body>
        <div class="sdWrapper">
        <div class="sdContent">

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
                            <div class="formValidateMessage error marBottom30" style="display:none;" id="chkoutErr">Please check the form below for errors.</div>
                            <div class="checkoutFormFieldsWrapper sm-twelve">
                                <a name="ship" id="ship"></a>
                                <?php include 'incs/user_shipping.php'; ?>
                                <a name="paym" id="paym"></a>
                                <?php include 'incs/paym_options.php'; ?>
                                <a name="bill" id="bill"></a>
                                <?php include 'incs/user_billing.php'; ?>

                            </div><!-- 
                            -->
                            <a class="continueButton <?php if ($paymMeth==""){ echo "hide" ;} ?>" id="continueButton" href="#" onClick="">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <?php include '../incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '../incs/footer-links.php'; ?>
        <script>
            var loggedIn = '<?php echo $logedIn; ?>';
            //TOGGLE DIV DIV - USES DATA ID
            $(document).ready(function () {
                $('.toggleDivBtn').on("click load resize scroll", function (e) {


                    var heights = $(".eqHeightJs01").map(function () {
                        return $(this).height();


                    }).get(),
                            maxHeight = Math.max.apply(null, heights);
                    genHeight = maxHeight;
                    $(".eqHeightJs01").height(maxHeight);

                });
                <?php if (isset($paymMeth) && $paymMeth=="cc"){ ?>
                        $('#ccPaymentSelect').trigger('click');
                <?php } ?>
                <?php if (isset($paymMeth) && $paymMeth=="paypal"){ ?>
                        $('#paypalPaymentSelect').trigger('click');
                <?php } ?>    
            });
        </script>
        </div>
    </body>
</html>
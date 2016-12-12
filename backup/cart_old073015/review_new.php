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
        <script>
            $(window).on("load resize scroll", function (e) {
                var heights = $(".eqHeightJs_01").map(function () {
                    return $(this).height();
                }).get(),
                        maxHeight = Math.max.apply(null, heights);
                $(".eqHeightJs_01").height(maxHeight);
            });
        </script>
        <script src="/js/userInfo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="/js/jquery.creditCardValidator.js"></script>
		<script>
            $(function() {
				$('#ccCardType input').validateCreditCard(function(result) {
					
					var getCardType = (result.card_type == null ? '-' : result.card_type.name);				
					
					$("#ccCardType").removeAttr("class");
					$('#ccCardType').addClass(getCardType);
								
					if (result.valid) {
						return $("#ccCardType label").addClass('valid');
				  	} else {
						return $("#ccCardType label").removeClass('valid');
				  	}
					
				});
            });
        </script>
    </head>
    <body class="cartBody">

        <!-- Navgivation -->
        <?php include '../incs/nav.php'; ?>

        <?php include '../incs/review_new.php'; ?>

        <!-- Footer -->
        <?php include '../incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '../incs/footer-links.php'; ?>
        
    </body>
</html>
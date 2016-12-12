<!doctype html>
<?php
$page = "shop";
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Shop | Virgil James</title>

        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/animate.css" />
        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/shop-style.css" />
        <script src="/js/imagesloaded.pkgd.min.js"></script>
        <script src="/js/shop.js" type="text/javascript"></script>
    </head>
    <body>

        <!-- Navgivation -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>

        <!-- Landing -->
        <div class="bgWrapperLeaf h60vh">
            <div class="landingLeafWrapper shopLeafWrapper">

                <!-- Mens/Womens/Acc Backgrounds -->
                <div class="selItemBg selItemBg-1"></div>
                <div class="selItemBg selItemBg-2"></div>
                <div class="selItemBg selItemBg-3"></div>
                <div class="tableWrapper h100p">
                    <div class="cellWrapper">
                        <div class="widthWrapper">
                            <span class="heroCatchLine1">Luxury Awaits</span>
                            <span class="heroCatchLine2">Where will it take you?</span>
                        </div>

                        <div class="productSelectorBtnsWrapper">
                            <!-- Selection Buttons -->
                            <div class="sm-twelve md-auto lg-auto"><a class="borderBtn caps itemBtn-1 itemBtnInactive" href="/shop.php?type=mens" onClick="return false;">Mens</a></div><!-- 
                         --><div class="sm-twelve md-auto lg-auto"><a class="borderBtn caps itemBtn-2 itemBtnInactive" href="/shop.php?type=womens" onClick="return false;">Womens</a></div><!-- 
                         --><div class="sm-twelve md-auto lg-auto"><a class="borderBtn caps itemBtn-3 itemBtnInactive" href="/shop.php?type=accessories" onClick="return false;">Accessories</a></div>
                        </div>

                        <!-- Back Button -->
                        <div class="backBtnWrapper opacityHide">
                            <a href="/shop.php">
                                <div class="arrowWrapper">
                                    <div class="arrow-left"></div>
                                </div>
                                <span class="backBtnTitle">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="prodListDiv" >
            <?php include '/incs/feature-products.php'; ?>

        </div>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>

    </body>
</html>
<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product | Virgil James</title>

    <?php include '/incs/head-links.php'; ?>
    <link rel="stylesheet" href="/css/shop.css" />
    <link rel="stylesheet" href="/css/product.css" />
    <script src="/js/product.js" type="text/javascript"></script>

    <link rel="stylesheet" href="/css/owl/owl.carousel.css" />
    <link rel="stylesheet" href="/css/owl/owl.theme.ambcards.css" />
    <script src="/js/owl/owl.carousel.min.js"></script>

</head>
<body>
<div class="sdWrapper">
<div class="sdContent">
<?php include '/incs/nav.php'; ?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$PID = $_GET["pid"];
$Product = new Product();
$Product->initialize($PID);
//print_r($Product);
//exit();
?>

<!-- Product Hero -->
<div class="bgWrapperLeaf marBottom30">
    <div class="landingLeafWrapper productLeafWrapper leafShadow">
        <div class="tableWrapper">
            <div class="cellWrapper">
                <div class="widthWrapper">
                    <div class="col lg-eight">
                        <img src="/img/product/spinner_sprite_32-1-min.png" alt="" class="reel productImg"
                             data-image="/img/product/spinner_sprite_32-min.png"
                             data-frames="32"
                             data-footage="8"
                             data-responsive="true"
                             data-cursor="hand"
                             data-revolution="300"
                             data-brake="0.05"
                             data-opening="1" />
                    </div><div class="heroDetails col lg-four">
                        <span class="lineTitle1"><?php echo $Product->getLineName(); ?></span><div class="lineTitleSpace"></div><span class="lineTitle2">Line</span>
                        <span class="collectionTitle">&nbsp;&#124;&nbsp;<?php echo $Product->getCollectionName(); ?> Collection</span><br />
                        <h1 class="productTitle"><?php echo $Product->getStyleName(); ?></h1>
                        <div class="productMSRP">$<?php echo number_format((float) $Product->getVar("Price"), 2, '.', ''); ?></div>
                        <p class="productOverview"><?php echo $Product->getVar("ShortDescription"); ?></p>
                        <a href="#product_details" class="productDetailsA">
                            <div class="detailsCTA">
                                <span class="viewDetails">View Product Details</span>
                                <div class="arrow-right"></div>
                            </div>
                        </a>

                        <div class="purchaseVarsRow lg-twelve">
                            <div class="qtyWrapper2">
                                <div class="qtyLabel">Qty:</div><input class="qtyInput" type="number" name="itemQty" id="itemQty" onfocus="this.value = ''" value="1"/>
                            </div><div class="purchaseRow2">
                                <a class="buyButtonA" href="javascript:addToCart(<?php echo $PID; ?>)"><div class="buyButton">Add to Cart</div></a>
                            </div>
                        </div>


                    </div>
                    <div class="socialRow lg-twelve">
                        <div class="lg-eight"></div><!-- 
                        --><div class="productSocialWrapper lg-four">
                            <ul class="shareIcons">
                                <li><a href="https://twitter.com" target="_blank"><i class="icon-mail-squared"></i>Mail</a></li><!--
                                --><li><a href="https://facebook.com" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
                                --><li><a href="https://pinterest.com" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
                                --><li><a href="https://instagram.com" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="bgWrapper productDetailsBgWrapper">
    <div class="widthWrapper">
        <div class="cellWrapper">
            <div class="headingWrapper">
                <div class="headingDashes">
                    <h2 class="ital fw-300 size4">Gallery</h2>
                </div>
            </div>



        <div class="owl-carousel marBottom15">

            <div class="ambcardv2 leafCorners2 marBottom30">
                <div class="ambCardAvatar" style="background: url(/img/ambassadors/maya.bw.jpg) no-repeat center; background-size: cover;"></div>
                <div class="ambCardBannerWrapper">
                    <div class="ambCardBanner white">
                        <span class="caps size7 block">Maya</span>
                        <span class="ital size7">Los Angeles</span>
                    </div>
                </div>
                <a href="/ambassador.php" class="borderBtnBlack marginY30">Meet Maya</a>
            </div>

            <div class="ambcardv2 leafCorners2 marBottom30">
                <div class="ambCardAvatar" style="background: url(/img/ambassadors/lucia.bw.jpg) no-repeat center; background-size: cover;"></div>
                <div class="ambCardBannerWrapper">
                    <div class="ambCardBanner white">
                        <span class="caps size7 block">Lucia</span>
                        <span class="ital size7">Los Angeles</span>
                    </div>
                </div>
                <a href="/ambassador.php" class="borderBtnBlack marginY30">Meet Lucia</a>
            </div>

            <div class="ambcardv2 leafCorners2 marBottom30">
                <div class="ambCardAvatar" style="background: url(/img/ambassadors/raquel.bw.jpg) no-repeat center; background-size: cover;"></div>
                <div class="ambCardBannerWrapper">
                    <div class="ambCardBanner white">
                        <span class="caps size7 block">Raquel</span>
                        <span class="ital size7">Los Angeles</span>
                    </div>
                </div>
                <a href="/ambassador.php" class="borderBtnBlack marginY30">Meet Raquel</a>
            </div>

        </div>


<script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop:true,
    margin:60,
    autoplay:true,
    autoplayTimeout:2500,
    autoplaySpeed:750,
    responsive:{
        0:{
            items:1
        },
        640:{
            items:2
        },
        1000:{
            items:3
        }
    }
  });
});
</script>




            <div class="detailsPanel leafCorners1">
                <div class="productDetailsWaypoint" id="product_details"></div> 
                <h3>Details</h3>
                <div class="detailsP col lg-six leftCol">
                    <p>Natural Italian canvas beach bag with tan leather trim. Leather handles. Two canvas pockets on the exterior. Interior pocket with zipper. Water resistant lining. Leather base. Custom hardware in a hammered polished nickel finish. Made in USA.</p>
                </div><!-- 
             --><div class="detailsSpecs col lg-six rightCol">
                    <span class="detailsSpecsTitle">Dimensions:</span><br />
                    <span class="detailsSpec">Height / Width / Depth:<br />13.00in x 19.00in x 7.00in&nbsp;&nbsp;&#124;&nbsp;&nbsp;33.00in x 48.00in x 17.78in</span><br />
                    <span class="detailsSpecsTitle">Weight:</span><br />
                    <span class="detailsSpec">3.0 lbs&nbsp;&nbsp;&#124;&nbsp;&nbsp;1.0 kg</span><br />
                    <span class="detailsSpecsTitle">Primary Material(s):</span><br />
                    <span class="detailsSpec">Cotton canvas</span>
                </div>
                <div class="featurePaneWrapper leafCorners2">
                    <div class="featurePane col sm-twelve">
                        <div class="featureTitle lg-four">
                            <img src="\uploadedImages\Products\italian_canvas_icon.jpeg" alt="" height="68" /><br /><br />
                            <span class="featurePaneTitle">100% Italian Canvas</span>
                        </div><div class="lg-eight">
                            <p class="featureCopy featurePaneP">Our 100% cotton 2-ply canvas is made in Italy with a simple plain weave. It’s definitely not the everyday canvas you see at the beach or at the local grocery store. It is strong and light. It shapes and folds very nicely. This canvas is treated to resist water and stains.</p>
                        </div>
                    </div>
                    <div class="featurePane col sm-twelve">
                        <div class="featureTitle lg-four">
                            <img src="\uploadedImages\Products\usamade_icon.jpeg" alt="" height="68" /><br /><br />
                            <span class="featurePaneTitle">Made In USA</span>
                        </div><div class="lg-eight">
                            <p class="featureCopy featurePaneP">This product is made in Los Angeles, California by exceptionally experienced craftsman.  They use the highest quality, most authentic materials and components, which are sourced from around the world or made in the USA exclusively for Virgil James.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                <?php include '/incs/feature-products.php'; ?>
                <?php include '/incs/lightBox.php'; ?>
            </div>
            <?php include '/incs/footer.php'; ?>
            <!-- Common .js Includes -->
            <?php include '/incs/footer-links.php'; ?>
        </div>
    </body>
</html>
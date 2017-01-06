<!doctype html>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$seo_variable = "shop";
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/ProductList.class.php';
$page = "shop";
$type = strtolower($_GET["type"]);
if ($type==""){
    $type="all";    
}
$includeF = "";
$bgClass = "";
$pTitle="";
$AllUrlStr = "/shop.php?type=all";
$MenUrlStr = "/shop.php?type=men";
$WomenUrlStr = "/shop.php?type=women";
$AccUrlStr = "/shop.php?type=accessories";
$ListObj = new ProductList();
switch ($type) {
    case "all":
       // $AllUrlStr = "/shop.php";
        $List = $ListObj->getAllProducts();
        $pTitle="All Products";
        break;
    case "men":
        //$MenUrlStr = "/shop.php";
        $bgClass = "selItemBg-1";
        $List = $ListObj->getMensProducts();
        $pTitle="Men's Products";
        break;
    case "women":
        //$WomenUrlStr = "/shop.php";
        $bgClass = "selItemBg-2";
        $List = $ListObj->getWomensProducts();
        $pTitle="Women's Products";
        break;
    case "accessories":
        //$AccUrlStr = "/shop.php";
        $bgClass = "selItemBg-3";
        $List = $ListObj->getAccessoryProducts();
        $pTitle="Accessories";
        break;
    default :
        $List = $ListObj->getAllProducts();
        break;
}
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php    
       $meta_men = '<title>Virgil James Shop for Men | Canvas bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Canvas bags for men"/>
        <meta name="description" content="="Discover our luxury collection of men’s travel bags and accessories that include backpacks, satchels, overnight bags and document holders."/>';
       $meta_women = '<title>Virgil James Shop for Women | Leather bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for women, Canvas bags for women"/>
        <meta name="description" content="Discover our new collection of luxury leather handbags and accessories for women."/>';
       $meta_accessories = '<title>Virgil James Shop Accessories | Bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Leather bags for women, Canvas bags for men, Canvas bags for women, Leather accessories"/>
        <meta name="description" content="Shop our new collection of leather accessories for men and women"/>';
        $meta_shop = '  <title>Virgil James Shop | Bags, Luxury Handbags & Authentic Handbags Online Shop</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Leather bags for women, Canvas bags for men, Canvas bags for women"/>
        <meta name="description" content="Shop Virgil James luxury bags and accessories.  Available to buy online. Free shipping and free returns."/>';
            
        if (!(isset($type) && $type != "")) {
            
            echo $meta_shop;
        }
        
        elseif ($type == "men") {
            
            echo $meta_men;
        }
        
        elseif ($type == "women") {
            
            echo $meta_women;
        }
        
        else {
            // echo "all";
        }
        ?>

        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/index.css" />
        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/shop-style.css" />
        <script src="/js/imagesloaded.pkgd.min.js"></script>
    </head>
    <body>
    
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>




        <!-- new imported from collections -->
        <div class="shopPage-using-new-generic-170103 landingScreen-generic-170103">
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 noPadding">


                        <div class="landingHeight">
                            <div class="landingWidth">
                                <div class="imageFrame">
                                    <div class="table-cell">
                                        <div class="contentContainer">
                                            <div class="textBlockMain">
                                                <div class="titleContainer">
                                                    <div class="title">
                                                        <div class="part1">The Test</div>
                                                        <div class="part2">Of Time</div>
                                                    </div>
                                                </div>
                                                <div class="copy">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales lorem nulla, non finibus lacus interdum eu. Nam et ligula efficitur, volutpat tortor sed, pulvinar leo. Vestibulum condimentum nisl augue, ut mollis nunc tempus vel. In sed felis tellus.
                                                </div>
                                                <div class="boxes">
                                                    <a class="box <?php if ($type == "men") {echo "itemBtnActive";} else {echo "itemBtnInactive";}?>" href="/shop/men/">
                                                        <div class="title">
                                                            Men
                                                        </div>
                                                        <div class="subtitle">
                                                        </div>
                                                    </a>
                                                    <div class="vline"></div>
                                                    <div class="hline"></div>
                                                    <a class="box <?php if ($type == "women") {echo "itemBtnActive";} else {echo "itemBtnInactive";}?>" href="/shop/women/">
                                                        <div class="title">
                                                            Women
                                                        </div>
                                                        <div class="subtitle">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <img class="downArrow" id="scrollDownArrow" src="/img/arrow_down.svg">
                                </div> 
                            </div>
                            <div class='scroll-down-to'></div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="belowLandingFrame">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                                


                                <div class="sdWrapper">
                                    <div class="sdContent">
                                            

                                        <div id="prodListDiv" >
                                            <?php
                                            if ($type == "") {
                                                include '/incs/feature-products.php';
                                            } else {
                                                include '/incs/shop.php';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>



                        </div>
                    </div>
                </div>
            </div>


        </div>









        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>
        <script>
            $('#scrollDownArrow').click(function () {
                $('html, body').animate({
                    scrollTop: ($('.scroll-down-to').offset().top)
                },750);
            })
        </script>
        <script type="application/ld+json">
            <?php 
            foreach ($List as $Product) {
                include('json-ld.php'); 
                echo json_encode($payload);
            }
            ?>
        </script>
        <script>
            $('.flippy-01').click(function () {
                $('.index-slide').toggleClass('flippyshow');
            })

            $(document).on('click', '.flip-card-blur-bg-<?php echo $type ?>', function () {
                $('.index-slide').removeClass('flippyshow');
            });

            $(document).on('click', '.index-slide', function (e) {
                e.stopPropagation();
            });
        </script>
        <script>
            var target = $('.scroll-arrow-indicator');
            var targetHeight = $(window).height();

            $(document).scroll(function(e){
                var scrollPercent = (targetHeight - (2 * (window.scrollY))) / targetHeight;
                if(scrollPercent >= 0){
                    target.css('opacity', scrollPercent);
                }
            });
        </script>
        <script>
            var isMobile = {
                Android: function() {
                    return navigator.userAgent.match(/Android/i);
                },
                BlackBerry: function() {
                    return navigator.userAgent.match(/BlackBerry/i);
                },
                iOS: function() {
                    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                },
                Opera: function() {
                    return navigator.userAgent.match(/Opera Mini/i);
                },
                Windows: function() {
                    return navigator.userAgent.match(/IEMobile/i);
                },
                any: function() {
                    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                }
            };
            if( isMobile.any() ) {
                $(".bg-fixer, .flip-card-blur-bg").css("background-attachment","scroll");
            } else {
                $(".bg-fixer, .flip-card-blur-bg").css("background-attachment","fixed");
            };
        </script>
        <!-- hide header bottom border until scroll -->
        <script>
            // hide header bottom border until scroll
            var border = $('.bottomBorder');
            var windowHeight = $(window).height();
            border.css("opacity", 0);
            $(document).scroll(function(e){
                var scrollPercent = window.scrollY / windowHeight;
                if(scrollPercent >= .1){
                    border.css('opacity', scrollPercent * 2);
                }
            });
        </script>
    </body>
</html>
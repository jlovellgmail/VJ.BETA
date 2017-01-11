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
        

        <!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />


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




        <div class="shopPage landingScreen">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 noPadding">
                        <div class="landingHeight">
                            <div class="landingWidth">
                                <div class="imageFrame">
                                    <div class="table-cell">
                                        <div class="contentContainer">
                                            <div class="carouselContainer">
                                                <div class="carouselImageContainer">
                                                    <img id="carouselImage" class="active" src="/img/IMG_6948 - tote hero - transparent for postcard bg.png" />
                                                    <img id="carouselImage2" style="opacity: 0;" src="/img/carousel image - Drawstring - transparent.png" />
                                                </div>
                                                <div class="controls">
                                                    <div class="dot active"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                            <div class="textBlockMain">
                                                <div class="titleContainer">
                                                    <div class="title">
                                                        <div class="part1">Timeless</div>
                                                        <div class="part2">Style</div>
                                                    </div>
                                                </div>
                                                <div class="copy">
                                                    Our luxury is to create art, in the form of great products that stand the test of time and become recognized for their quality, engineered design, and classic style.  We define luxury not by price, but by the lasting experience our products provide.
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
                                                    
                                                    <div class="vline"></div>
                                                    <div class="hline"></div>


                                                    <!--
                                                    <a class="box <?php if ($type == "all") {echo "itemBtnActive";} else {echo "itemBtnInactive";}?>" href="/shop/">
                                                        <div class="title">
                                                            All
                                                        </div>
                                                        <div class="subtitle"></div>
                                                    </a>
                                                    -->
                                                    <div id="allButton" class="box <?php if ($type == "all") {echo "itemBtnActive";} else {echo "itemBtnInactive";}?>" href="/shop/">
                                                        <div class="title">
                                                            All
                                                        </div>
                                                        <div class="subtitle"></div>
                                                    </div>
                                                    <script>
                                                        $("#allButton").click(function(){
                                                            <?php
                                                                if($type == "all"){
                                                                    echo "scrollDownToContent();";
                                                                }
                                                                else {
                                                                    echo "window.location.href = '/shop/'";
                                                                }
                                                            ?>
                                                        });
                                                    </script>



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
            function scrollDownToContent(){
                $('html, body').animate({
                    scrollTop: ($('.scroll-down-to').offset().top)
                },750);
            }

            // this makes it fire on page load:
            /*
            $('#scrollDownArrow').click(scrollDownToContent());
            */

            $('#scrollDownArrow').click(function(){
                $('html, body').animate({
                    scrollTop: ($('.scroll-down-to').offset().top)
                },750);
            });
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
        <!-- for carousel: preload images -->
        <div style="position:fixed; left:4000px; top:4000px; opacity: 0; ">
            <img src="/img/IMG_6948 - tote hero - transparent for postcard bg.png">
            <img src="/img/carousel image - Drawstring - transparent.png">
            <img src="/img/carousel image - Clutch - transparent.png">

        </div>
        <!-- for carousel: change images -->
        <script>
            var images = [
                "/img/IMG_6948 - tote hero - transparent for postcard bg.png"
                ,"/img/carousel image - Drawstring - transparent.png"
                ,"/img/carousel image - Clutch - transparent.png"
            ];
            var i=0;
            var initialTimeout = 8000;
            var timeout = 8000;
            var delay = 600;
            function change(){
                if($("#carouselImage").hasClass("active")){
                    current = $("#carouselImage");
                    next = $("#carouselImage2");
                }
                else {
                    current = $("#carouselImage2");
                    next = $("#carouselImage");
                }
                i = ++i % images.length;
                function animate(){
                    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                    current.addClass("fadeout").one(animationEnd, function() {
                        $(this).removeClass("fadeout");
                        $(this).css("opacity", 0);
                    });
                    setTimeout(showNext, delay);
                    function showNext(){
                        current.removeClass("active");
                        next.addClass("active");
                        next.attr("src", images[i]);
                        next.addClass("fadein").one(animationEnd, function() {
                            $(this).removeClass("fadein");
                            $(this).css("opacity", 1);
                        });
                        $(".dot").removeClass("active");
                        $(".dot:nth-of-type("+ (i+1) +")").addClass("active");
                    }
                }
                animate();
                setTimeout(change, timeout);
            }
            $(window).load(function(){
                setTimeout(change, initialTimeout);
            });
        </script>

        

        <!-- JL -->
        <!-- temp: scroll down if we're on men or women page -->
        <?php
            if ($type == "men" || $type == "women"){
                echo "<script>console.log('type: $type');</script>";
                echo "<script>$(document).ready(function(){ console.log('ready'); scrollDownToContent() });</script>";
            }
        ?>


    </body>
</html>
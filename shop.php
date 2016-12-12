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
        <div class="sdWrapper">
            <div class="sdContent">

                <!-- Navgivation -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>
                    
                <!-- Landing -->
                <div class="landing-hero-wrapper bg-fixer h100vh <?php echo $bgClass; ?> index-slide shopLeafWrapper">

                        <div class='flip-card-blur-bg flip-card-blur-bg-<?php echo $type ?>'>
                        </div>
                            <div class="tableWrapper h100p" style='max-width: 1200px; margin: 0 auto;'>
                                <div class="cellWrapper">

                                    <!-- <div class='rel iB' style='background-color: rgba(0,0,0,0.5); padding: 20px 30px;'> -->
                                        <div class="rel block"><a style='padding-left: 15px; padding-right: 15px; margin: 10px 0' class="borderBtn borderBtnGrey caps itemBtn-0 <?php
                                            if ($type == "all") {
                                                echo "itemBtnActive";
                                            } else {
                                                echo "itemBtnInactive";
                                            }
                                            ?>" href="<?php echo $AllUrlStr; ?>" href="/shop/men/">All<i class="icon-down-dir shop-active-arrow"></i></a></div>
                                        <div class="rel block"><a style='padding-left: 15px; padding-right: 15px; margin: 10px 0' class="borderBtn borderBtnGrey caps itemBtn-1 <?php
                                            if ($type == "men") {
                                                echo "itemBtnActive";
                                            } else {
                                                echo "itemBtnInactive";
                                            }
                                            ?>" href="<?php echo $MenUrlStr; ?>" href="/shop/men/">Men<i class="icon-down-dir shop-active-arrow"></i></a></div>
                                        <div class="rel block"><a style='padding-left: 15px; padding-right: 15px; margin: 10px 0' class="borderBtn borderBtnGrey caps itemBtn-2 <?php
                                            if ($type == "women") {
                                                echo "itemBtnActive";
                                            } else {
                                                echo "itemBtnInactive";
                                            }
                                            ?>" href="<?php echo $WomenUrlStr; ?>" href="/shop/women/">Women<i class="icon-down-dir shop-active-arrow"></i></a></div>
                                        <!-- <div class="rel block"><a style='padding-left: 15px; padding-right: 15px; margin: 10px 0' class="borderBtn borderBtnGrey caps itemBtn-3 <?php
                                            if ($type == "accessories") {
                                                echo "itemBtnActive";
                                            } else {
                                                echo "itemBtnInactive";
                                            }
                                            ?>" href="<?php echo $AccUrlStr; ?>" href="/shop/accessories/">Accessories<i class="icon-down-dir shop-active-arrow"></i></a></div> -->
                                    <!-- </div> -->

                                    <!-- Back Button -->
                                    <!--
                                    <div class="shopBackBtnWrapper <?php
                                    if ($type == "") {
                                        echo "opacityHide";
                                    }
                                    ?>">
                                        <a href="/shop.php">
                                            <div class="arrowWrapper">
                                                <div class="arrow-left"></div>
                                            </div>
                                            <span class="backBtnTitle caps">Back to Overview</span>
                                        </a>
                                    </div>
                                    -->
                                    <?php if (isset($type) && $type != "") { ?>
                                        <!-- Back Button -->
                                        <!-- <div class="backBtnWrapper">
                                            <a href="/shop.php" class="aWhite caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>&nbsp;All Products</a>
                                        </div> -->
                                    <?php } ?>
                                </div>
                            </div>
                        <div class='flipcard-01 flipcard'>
                            <div class='aspect-dummy-two-thirds'></div>
                            <div class='aspect-img'>
                                <img class='postcard-stamp' src='/img/index/postcardstamps-santafe.png' alt='' />
                                <div class='card-divider'></div>
                                <div class='xs-twelve lg-six h100p'>
                                    <div class='card-left'>
                                        <?php if ($type == "men") {
                                                echo
                                                "<p>Hey Virgil,</p>
                                                <p>It’s so, so nice to see a well thought out collection of carry bags for men.  I can think of a dozen friends who would trip over themselves to buy one of your bags.  They’ll go crazy over the details.  Soft construction, matched leather panels, bronze hardware, hidden reinforcing (for a lifetime of use), water resistant lining, ridiculous carabiners …where does it end?   Please keep it up.</p>
                                                <p>Your biggest fan!</p>";
                                            } elseif ($type == "women") {
                                                echo
                                                "<p>Dear Virgil,</p>
                                                <p>Clearly, you know at least one way to a woman’s heart.  These bags are fantastic! With limited-edition availability, I feel special already. The Cross Body and Clutch are so elegant in a fun way.  I’ll admit, the Overnight may be my favorite for work and travel, but the Drawstring is made for me.  And do tell, what is all this noise about cashmere felt?!</p>
                                                <p>XOXO</p>";
                                            } elseif ($type == "accessories") {
                                                echo
                                                "<p>Hi Virgil,</p>
                                                <p>Ok, this only makes sense.  You make these incredible bags so why not apply your good taste and impeccable quality to related accessories.  Obviously, you’ve made no compromises on these everyday goodies.  They’re perfect gifts for that someone who seems to have everything.  I love the way you use zippers, and the carabiners are so elegant!  How did you ever get them made?</p>
                                                <p>Your best customer!</p>";
                                            } else {
                                                echo
                                                "<p>Hey Virgil,</p>
                                                <p>You’re making it way too easy to spend money!  I love all of the VJ styles.  The quality is over-the-top and selling online-only or direct through Ambassadors is sure to save me lots of $$.  But, honestly, it’s your return support and lifetime guarantee that make shopping with you so easy.  If it’s not right, I know you’ll handle everything!</p>
                                                <p>Your customer for life!</p>";
                                            }?>
                                    </div>
                                </div><div class='card-right xs-six h100p'>
                                    <div class='rel block h100p'>
                                        <div class='return-address'>
                                            <span class='postcard-address-01'>Virgil James</span>
                                            <span class='postcard-address-02'>214 N. Cedros Avenue</span>
                                            <span class='postcard-address-02'>Solana Beach, CA</span>
                                            <span class='postcard-address-03'>USA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='gps-lockup'>
                            <div class='lockup-topline'>
                                <img class='flippy-01 stampy-mc-stampface' src='/img/index/postcard-icon.png' alt='' />
                            </div>
                            <div class='lockup-bottomline'>
                                <span class="heroText caps size3 fw-300 spaceLetters">Luxury </span>
                                <span class="heroText caps size3 fw-600 spaceLetters">Awaits</span>
                            </div>
                        </div>
                        <div class='scroll-arrow-indicator index-scroll-1'><i class='icon-angle-down'></i></div>
                    </div>

                <div class='scroll-down-to'></div>

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
            <!-- Footer -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>
        </div>

        <script>
            $('.scroll-arrow-indicator').click(function () {
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

    </body>
</html>
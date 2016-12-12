<!doctype html>
<?php
$page = "collections";
$collection = $_GET["col"];
$line = $_GET["line"];
if (isset($_GET["type"]) && $_GET["type"] != ""){
    $type = $_GET["type"];
} else {
    $type="";
}



include_once('../incs/conn.php');
include '../classes/Collection.class.php';

$CollObj = new Collection();

$CollObj->initializeByName($collection);
$CollID = $CollObj->getVar("CID");

?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
       <!-- <title><?php// echo ucfirst($collection); ?> | Virgil James</title> -->
<?php    
        $meta_canvas = '<title>Virgil James Canvas Collection | Canvas bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Canvas bags, Canvas bags for men, Canvas bags for women"/>
        <meta name="description" content="The canvas bag collection is made using Italian canvas and a tan leather trim. Pieces include a laptop holder, toiletry kit and weekender bag."/>';
        $meta_ray = '<title>Virgil James Reykjavik Collection | Leather bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Leather bags for men, Leather bags for women"/>
        <meta name="description" content="Inspired by the city of Reykjavik, this luxury bag collection is made using black Italian leather and custom bronze hardware."/>';
        $meta_santa = '<title>Virgil James Santa Fe Collection | Bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Leather bags for men, Leather bags for women, Brown Leather bags"/>
        <meta name="description" content="Inspired by the city of Santa Fe, this luxury bag collection is made using brown Italian leather and custom bronze hardware. "/>';
        $meta_buenos = '<title>Virgil James Buenos Aires Collection | Bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Leather bags for men, Leather bags for women, Brown Leather bags"/>
        <meta name="description" content="Inspired by the city of Buenos Aires, this luxury bag collection is made using Italian leather and custom hardware. "/>';
        $meta_collections = '<title>Virgil James Collections | Bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Leather bags for women, Canvas bags for men, Canvas bags for women"/>
        <meta name="description" content="Discover our latest luxury bag collections in leather and canvas for men and women."/>';
            
        if ($collection == "canvas") {
            
            echo $meta_canvas;
        }
        
        elseif ($collection == "reykjavik") {
            
            echo $meta_ray;
        }
        
        elseif ($collection == "santa-fe") {
            
            echo $meta_santa;
        }
        
        elseif ($collection == "buenos-aires") {
            
            echo $meta_buenos;
        }
        
        else {
            
            echo $meta_collections;
        }
?>

        <?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/index.css" />
        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/collection/collection.css" />
        <link rel="stylesheet" href="/css/collection/<?php echo $collection ?>.css" />
        <script src="/js/imageMapResizer.min.js"></script>
        

        <script src="/js/vendor/modernizr.js"></script>
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <!-- Navigation -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>

                <!-- Landing -->
                <div class='landing-hero-wrapper index-slide h100vh'>
                    <div class='h100p bg-fixer <?php echo $collection ?>LeafWrapper'>
                        <div class='flip-card-blur-bg flip-card-blur-bg-<?php echo $collection ?>'></div>
                        <div class='flipcard-01 flipcard'>
                            <div class='aspect-dummy-two-thirds'></div>
                            <div class='aspect-img'>
                                <img class='postcard-stamp' src='/img/index/postcardstamps<?php
                                if ($collection == "reykjavik") {
                                    echo "-iceland";
                                } elseif ($collection == "santa-fe") {
                                    echo "-santafe";
                                } elseif ($collection == "buenos-aires") {
                                    echo "-buenosaires";
                                } elseif ($collection == "canvas") {
                                    echo ""; } ?>.png' alt='' />
                                <div class='card-divider'></div>
                                <div class='xs-twelve lg-six h100p'>
                                    <div class='card-left'>
                                        <p>Hi Virgil,</p>
                                        <p><?php if ($collection == "reykjavik") { echo
                                            "I completely understand why Reykjavik is the creative theme for your first collection.  What an amazing place!  True Viking heritage on an island drench in wonder.  Your custom bronze components and black calfskin leather introduce the physical beauty and strength of Iceland perfectly. No surprise that Reykjavik is so popular these days!";
                                        } else if ($collection == "santa-fe") { echo
                                            "How did you know?  Santa Fe is one of my favorite cities - it’s perfect for a CityLine Collection.  So much history, so much culture, and so much great food!  You’ve got to love the chilies.  Given the atmosphere, physical beauty, and native heritage, it’s not surprising that the city is such a huge arts center.  Totally inspiring choice for a Virgil James collection!";
                                        } else if ($collection == "buenos-aires") { echo
                                            "<< Buenos Aires copy goes here >>";
                                                }?>
                                        </p>
                                        <p>Your biggest fan!</p>
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
                        <!-- <div class="widthWrapper tableWrapper h100p">
                            <div class="cellWrapper">
                                <div class="heroText">
                                    <span class="caps fw-700 size45"><?php// echo strtoupper($line); ?></span><span class="caps fw-300 size45">Line</span>
                                    <h1 class="ital fw-400 size2"><?php //echo $CollObj->getVar("Name"); ?> Collection</h1>
                                </div>
                                <div class="backBtnWrapper">
                                    <a href="/collections.php" class="aWhite caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>All Collections</a>
                                </div><div class="productSelectorBtnsWrapper">
                                    <a class="borderBtn caps itemBtn-1 itemBtnInactive" href="http://www.virgiljames.net/collection/details.php?line=<?php echo $line; ?>&col=<?php echo $collection; ?>" >View Collection</a>
                                </div>
                            </div>
                        </div> -->
                        <div class='gps-lockup'>
                            <div class='lockup-topline'>
                                <img class='flippy-01 stampy-mc-stampface' src='/img/index/postcard-icon.png' alt='' />
                            </div>
                            <div class='lockup-bottomline'>
                                <span class="heroText caps size3 fw-300 spaceLetters"><?php echo $CollObj->getVar("Name"); ?> </span>
                                <span class="heroText caps size3 fw-600 spaceLetters">Collection</span>
                            </div>
                        </div>
                        <div class='scroll-arrow-indicator'><i class='icon-angle-down'></i></div>
                    </div>
                </div>

                <div class='scroll-down-to'></div>

                <!-- lineProducts loaded content via js goes here -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/collection/incs/' . $collection . '.php'; ?>

            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>

            <script src="/collection/js/details.js" type="text/javascript"></script>
            <!-- Gender Selection Scripts -->
            <script>
                var ColID = <?php echo $CollID; ?>;
                var colType = '<?php echo $type; ?>';
            </script>

            <script src="/js/imagesloaded.pkgd.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('map').imageMapResize();
                });
            </script>

            <script>
                $('.scroll-arrow-indicator').click(function () {
                    $('html, body').animate({
                        scrollTop: ($('.scroll-down-to').offset().top)
                    },750);
                })
            </script>

            <script>
                $('.flippy-01').click(function () {
                    $('.index-slide').toggleClass('flippyshow');
                })

                $(document).on('click', '.flip-card-blur-bg-<?php echo $collection ?>', function () {
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

        </div>
    </body>
</html>
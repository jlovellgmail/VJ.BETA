<!doctype html>
<?php 
$page = "home"; 
$seo_variable = "home";
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Virgil James | Hand Bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags"/>
		<meta name="description" content="Virgil James is a luxury bags and accessories company, focused on creating authentic, functional and high quality leather goods."/>
        <?php include '/incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/index.css" />
        <link rel="stylesheet" href="/css/animate.css" />
        <link rel="stylesheet" href="/css/preorder.css" />

        <link rel="stylesheet" href="/js/owl/dev/dist/assets/owl.carousel.css" />
        <!-- <link rel="stylesheet" href="/css/owl/owl.theme.vj.product.css" /> -->
        <script src="/js/owl/dev/dist/owl.carousel.js"></script>

    </head> 
    <body class='body'>


        <?php include '/incs/nav.php'; ?>


        <div class="preorderPage bg-whiter">
            <div class="landingFrame">
                <div class="mainFrame">
                    
                <div id="owl-demo" class="owl-carousel owl-theme">
                  <div class="item"><img src="/img/IMG_6948_tote_hero_whiter_bg_q7.jpg" alt=""></div>
                  <div class="item"><img src="/img/IMG_6948_tote_hero_whiter_bg_q7_test.jpg" alt=""></div>
                  <div class="item"><img src="/img/IMG_6948_tote_hero_whiter_bg_q7_test2.jpg" alt=""></div>
                </div>


                    <div class="backgroundContainer">

                        <script>
                            $(document).ready(function() {
                                console.log("yes");
                                $("#owl-demo").owlCarousel({`


                                    /*
                                    navigation: true // Show next and prev buttons
                                    ,slideSpeed: 300
                                    ,paginationSpeed: 400
                                    ,singleItem: true
                                    // "singleItem:true" is a shortcut for:
                                    // items : 1, 
                                    // itemsDesktop : false,
                                    // itemsDesktopSmall : false,
                                    // itemsTablet: false,
                                    // itemsMobile : false

                                    ,autoPlay: 3000
                                    ,stopOnHover: true
                                    */

                                    singleItem: true,
                                    // from product page
                                    startPosition: 2,
                                    loop: true,
                                    margin: 5,
                                    autoplay: true,
                                    // autoplayTimeout: 2500,
                                    // autoplaySpeed: 750,
                                    // autoplayHoverPause: true,
                                    dots: true,
                                    nav: true,
                                    dotsEach: 1



                                });
                            });
                        </script>

                    </div>



                    <div class="contentContainer">
                        <div class="preorderText">
                            <div class="headline">
                                Early Access
                            </div>
                            <div class="titleContainer">
                                <div class="title">
                                    <div class="part1">Cityline</div><div class="part2">Collections</div>
                                </div>
                            </div>
                            <div class="copy">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales lorem nulla, non finibus lacus interdum eu. Nam et ligula efficitur, volutpat tortor sed, pulvinar leo. Vestibulum condimentum nisl augue, ut mollis nunc tempus vel. In sed felis tellus.
                            </div>
                            <div class="boxes">
                                <a class="box" href="/collection/city/reykjavik/">
                                    <div class="title">
                                        Reykjavik
                                    </div>
                                    <div class="subtitle">
                                        Collection
                                    </div>
                                </a>
                                <div class="vline">
                                </div>
                                <a class="box" href="/collection/city/santa-fe/">
                                    <div class="title">
                                        Santa Fe
                                    </div>
                                    <div class="subtitle">
                                        Collection
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="imageWrapper">
                    </div>
                </div>
            </div>
        </div>


        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>


		<?php include('json-ld.php'); ?>
		<script type="application/ld+json"><?php echo json_encode($payload); ?></script>

    </body>
</html>
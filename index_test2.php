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

        <link href="/owl_new/owl.carousel.css" rel="stylesheet">
        <link href="/owl_new/owl.theme.css" rel="stylesheet">


    </head> 
    <body class='body'>


        <?php include '/incs/nav.php'; ?>


        <div class="preorderPage bg-whiter">
            <div class="landingFrame">
                <div class="mainFrame">






                    <div class="backgroundContainer2">


                        <div class="carouselContainer">
                            <div id="owl-demo" class="owl-carousel">
                              <div class="item"><img src="/img/IMG_6948_tote_hero_whiter_bg_q7.jpg" alt=""></div>
                              <div class="item"><img src="/img/IMG_6948_tote_hero_whiter_bg_q7_test.jpg" alt=""></div>
                              <div class="item"><img src="/img/IMG_6948_tote_hero_whiter_bg_q7_test2.jpg" alt=""></div>
                            </div>

                            <script src="/owl_new/owl.carousel.js"></script>
                            <!-- Demo -->
                            <style>
                            #owl-demo .item img{
                                display: block;
                                width: 100%;
                                height: auto;
                                /* 
                                mine: 
                                this is being overridden in css
                                so I think this can be removed
                                */
                                height: 100%;
                                max-height: 650px;
                                width: auto;
                            }
                            </style>


                            <script>
                            $(document).ready(function() {
                              $("#owl-demo").owlCarousel({

                              navigation : false,
                              slideSpeed : 300,
                              paginationSpeed : 400,
                              singleItem : true
                              ,loop: true
                              ,autoPlay : 3000

                              // "singleItem:true" is a shortcut for:
                              // items : 1, 
                              // itemsDesktop : false,
                              // itemsDesktopSmall : false,
                              // itemsTablet: false,
                              // itemsMobile : false

                              });
                            });

                            // JL
                            // try the fix that was tested in console
                            // the images are:
                            // width: 2392
                            // height: 2626
                            
                            $(window).load(function(){
                            //$(document).ready(function(){
                                var woverh = 2392 / 2626;
                                
                                //$(".carouselContainer").width($(".carouselContainer").height() * woverh);
                                $(".carouselContainer").width($(".owl-wrapper-outer").height() * woverh);

                                // console.log("woverh: " + woverh);
                                // console.log("height: " + $(".carouselContainer").height() );
                                // console.log("width set to: " + $(".carouselContainer").width() );

                                var handler = window.onresize;
                                //handler();
                                //or
                                handler.apply(window, [' On']);
                            });

                            
                            </script>

                        </div>




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
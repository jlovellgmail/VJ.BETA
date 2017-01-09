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
    </head> 
    <body>
        <?php include '/incs/nav.php'; ?>




        <div class="landingPage landingScreen-generic-170103">
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
                                            <div class="textContainer">
                                                <div class="preorderText">
                                                    <div class="headlineContainer">
                                                        <div class="headline">
                                                            <div class="part1 light">Engineered</div>
                                                            <div class="part2 heavy">Luxury</div>
                                                        </div>
                                                    </div>
                                                    <div class="copy">
                                                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales lorem nulla, non finibus lacus interdum eu. Nam et ligula efficitur, volutpat tortor sed, pulvinar leo. Vestibulum condimentum nisl augue, ut mollis nunc tempus vel. In sed felis tellus. -->
                                                        Products that reflect an exceptional standard of quality, authenticity, and everyday functionality.  Classic design, the best materials, and uncompromising craftsmanship provide a one-of-a-kind experience. Celebrate excellence with Virgil James!
                                                    </div>

                                                    <a class="box" href="/shop/">
                                                        <div class="title">
                                                            Shop Now
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
        </div>




        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>


        <?php include('json-ld.php'); ?>
        <script type="application/ld+json"><?php echo json_encode($payload); ?></script>


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


    </body>
</html>
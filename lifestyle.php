<!doctype html>
<?php 
$page = "lifestyle"; 
$seo_variable = "lifestyle";
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <title>Virgil James Lifestyle</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Virgil James"/>
        <meta name="description" content="With headquarters in Los Angeles, California, Virgil James is the place to shop for luxury bags and accessories."/>

        <?php include '/incs/head-links.php'; ?>
        <script src="/js/lifestyle.js"></script>
        <link rel="stylesheet" href="/css/ambassadors.css">
        <link rel="stylesheet" href="/css/lifestyle.css">
        <link rel="stylesheet" href="/css/index.css">

        <script src="/js/jquery-scroll/jquery.jscroll.min.js"></script>

    </head>
    <body>
        <?php include '/incs/nav.php'; ?>


        <div class="journalPage-using-new-generic-170103 landingScreen-generic-170103">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 noPadding">
                        <div class="landingHeight">
                            <div class="landingWidth">
                                <div class="imageFrame">
                                    <div class="overlay"></div>
                                    <div class="table-cell">
                                        <div class="contentContainer">
                                            <div class="textBlockMain">
                                                <div class="titleContainer">
                                                    <div class="title">
                                                        <div class="part1">Lifestyle</div>
                                                        <div class="part2">Journal</div>
                                                    </div>
                                                </div>
                                                <div class="copy">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales lorem nulla, non finibus lacus interdum eu. Nam et ligula efficitur, volutpat tortor sed, pulvinar leo. Vestibulum condimentum nisl augue, ut mollis nunc tempus vel. In sed felis tellus.
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
                            <div class="widthWrapper">
                                <?php include '/incs/lifestyle.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>


        <!-- <script src="/js/instafeed.min.js"></script> -->
        <script type="application/ld+json">
            <?php 
            //echo json_encode($payload);
            //$count = count($lifestyleEvents);
            //for($i = 0; $i < $count; $i++) {
            foreach ($lifestyleEvents as $Levent) {
                include('json-ld.php'); 
                echo json_encode($payload);
            }
            ?>
        </script>
        <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
        <script src="https://npmcdn.com/packery@2.0/dist/packery.pkgd.js"></script>
        <script>
            var $grid = $('.grid').imagesLoaded( function() {
                $grid.packery({
                  // options
                  columnWidth: '.packery-gallery-wrapper',
                  itemSelector: '.grid-item',
                  percentPosition: true
                });
            });
        </script>
        <script>
            $('.downArrow').click(function () {
                console.log("yes");
                $('html, body').animate({
                    scrollTop: ($('.scroll-down-to').offset().top)
                },750);
            })
        </script>
        <script>
            var target = $('.downArrow');
            var targetHeight = $(window).height();

            $(document).scroll(function(e){
                var scrollPercent = (targetHeight - (2 * (window.scrollY))) / targetHeight;
                if(scrollPercent >= 0){
                    target.css('opacity', scrollPercent);
                }
            });
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
        <!-- handle window aspect ratio for bg image -->
        <script>
            /*
            function getScreenAspect(){
                return $(window).width() / $(window).height();
            }
            function handleAspect(){
                var screenAspect = getScreenAspect();
                //console.log("yes: " + screenAspect);
                if(screenAspect < 1.4905193734542457){
                    $(".imageFrame").addClass("tallAspect");
                }
                else {
                    $(".imageFrame").removeClass("tallAspect");
                }
            }
            $(document).ready(handleAspect);
            $(window).resize(handleAspect);
            */
        </script>
    </body>
</html>
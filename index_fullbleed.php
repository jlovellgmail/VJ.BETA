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




        <div class="landingPage-framed-aspect postcardLandingScreen">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 noPadding">
                        <div class="landingFrame">
                            <div class="postcardFrame">




                                <img class="sizeHelper" src="/img/landing_page_postcard_bg_q9.jpg" height="100%">
                    



                                
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
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales lorem nulla, non finibus lacus interdum eu. Nam et ligula efficitur, volutpat tortor sed, pulvinar leo. Vestibulum condimentum nisl augue, ut mollis nunc tempus vel. In sed felis tellus.
                                            </div>

                                            <a class="box" href="/shop/">
                                                <div class="title">
                                                    Shop Now
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                
                                


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

                                <!--
                                <div class="imageWrapper">
                                </div>
                                -->




                            </div>
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
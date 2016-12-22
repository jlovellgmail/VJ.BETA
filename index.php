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
    <body class='body'>


        <?php include '/incs/nav.php'; ?>


        <div class="preorderPage">
            <div class="landingFrame">
                <div class="mainFrame">
                    

                    <div class="contentContainer">
                        <!-- carousel -->
                        <div class="imageContainer">
                            <div class="image">
                                <img id="carouselImage" src="/img/IMG_6948_tote_hero_whiter_bg_q7.jpg" />
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
                        <img src="/img/IMG_6948_tote_hero_whiter_bg_q7.jpg">
                        <img src="/img/IMG_6948_tote_hero_whiter_bg_q7_test.jpg">
                        <img src="/img/IMG_6948_tote_hero_whiter_bg_q7_test2.jpg">

                    </div>
                    <!-- for carousel: change images -->
                    <script>
                        var images = [
                            "/img/IMG_6948_tote_hero_whiter_bg_q7.jpg"
                            ,"/img/IMG_6948_tote_hero_whiter_bg_q7_test.jpg"
                            ,"/img/IMG_6948_tote_hero_whiter_bg_q7_test2.jpg"
                        ];
                        var i=1;
                        function change(){
                            var div = $("#carouselImage");
                            i = ++i % images.length;
                            console.log("i: " + i + "   ...images[i]: " + images[i]);
                            function animate(){
                                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                                div.addClass('animated fadeOut').one(animationEnd, function() {
                                    $(this).removeClass('animated fadeOut');
                                    $(".dot").removeClass("active");
                                    $(".dot:nth-of-type("+ (i+1) +")").addClass("active");
                                    div.attr("src", images[i]);
                                    div.addClass('animated fadeIn').one(animationEnd, function() {
                                        $(this).removeClass('animated fadeIn');
                                    });
                                });
                            }
                            animate();
                            setTimeout(change, 6000);
                        }
                        $(window).load(function(){
                            setTimeout(change, 6000);
                        });
                    </script>


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
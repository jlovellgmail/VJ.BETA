<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Product | Virgil James</title>

        <?php include '/incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/product.css" />

        <link rel="stylesheet" href="/js/slick/slick.css" />
        <link rel="stylesheet" href="/js/slick/slick-theme.css" />

        <script src="/js/vendor/modernizr.js"></script>

    </head>
    <body class="productBody">

        <!-- Navgivation -->
        <?php include '/incs/nav.php'; ?>

        <div class="scrollWaypoint"></div>

        <!-- Product Hero -->
        <div class="bgWrapper productBgWrapper"><!-- wallpaper goes here -->
            <div class="widthWrapper">
                <div class="tableWrapper tableHeightFinal">
                    <div class="cellWrapper">
                        <div class="col lg-eight">
                            <img src="/img/product/spinner_sprite_32-1-min.png" alt="" class="reel productImg"
                                 data-image="/img/product/spinner_sprite_32-min.png"
                                 data-frames="32"
                                 data-footage="8"
                                 data-responsive="true"
                                 data-cursor="hand"
                                 data-revolution="300"
                                 data-brake="0.05"
                                 data-opening="1" />
                        </div><!-- 
                        --><div class="heroDetails col lg-four">
                            <span class="lineTitle1">City</span><div class="lineTitleSpace"></div><span class="lineTitle2">Line</span><span class="collectionTitle">&nbsp;&#124;&nbsp;Santa Fe Collection</span><br />
                            <h1 class="productTitle">Men's Backpack</h1>
                            <div class="productMSRP">$1,750.00</div>
                            <p class="productOverview">This handcrafted leather backpack is cut from the highest quality Italian leathers and adorned in culturally inspired hardware designed by local&nbsp;artisans.</p>
                            <a href="#product_details" class="productDetailsA"><div class="detailsCTA">
                                    <span class="viewDetails">View Product Details</span><div class="arrow-right"></div>
                                </div></a>

                            <div class="purchaseVarsRow lg-twelve">
                                <div class="productDropdown sm-seven">
                                    <select id="zipperSelect">
                                        <option value="hide">Select Zipper Pull</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                </div><div class="qtyWrapper sm-five">
                                    <div class="qtyLabel">Qty:</div><input class="qtyInput" type="number" name="itemQty" onfocus="this.value = ''" value="1"/>
                                </div>
                            </div>
                            <div class="purchaseRow">
                                <a class="buyButtonA" href="/cart.php"><div class="buyButton">Buy Now</div></a>
                            </div>

<!-- 
                            <div class="purchaseVarsRow lg-twelve">
                                <div class="qtyWrapper2">
                                    <div class="qtyLabel">Qty:</div><input class="qtyInput" type="number" name="itemQty" onfocus="this.value = ''" value="1"/>
                                </div><div class="purchaseRow2">
                                    <a class="buyButtonA" href="/cart.php"><div class="buyButton">Buy Now</div></a>
                                </div>
                            </div>
 -->

                        </div>
                        <div class="socialRow lg-twelve">
                            <div class="lg-eight"></div><!-- 
                            --><div class="productSocialWrapper lg-four">
                                <ul class="shareIcons">
                                    <li><a href="https://twitter.com" target="_blank"><i class="icon-mail-squared"></i>Mail</a></li><!--
                                    --><li><a href="https://facebook.com" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
                                    --><li><a href="https://pinterest.com" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
                                    --><li><a href="https://instagram.com" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Statement Section -->
        <div class="bgWrapper productDetailsBgWrapper">
            <div class="widthWrapper">
                <div class="tableWrapper table62">
                    <div class="cellWrapper">
                        <h3>Gallery</h3>

                        <div class="productGallery">
                            <div><a class="slideLightBoxLink lightbox1" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_detail_1.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox2" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_detail_2.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox3" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_lifestyle.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox4" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_video_frame.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox1" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_detail_1.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox2" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_detail_2.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox3" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_lifestyle.jpg" alt="" /></a></div>
                            <div><a class="slideLightBoxLink lightbox4" href="#" onclick="return false;"><img class="slickerImg1" src="/img/product/product_video_frame.jpg" alt="" /></a></div>
                        </div>

                        <div class="detailsPanel">
                            <div class="productDetailsWaypoint" id="product_details"></div> 
                            <h3>Details</h3>
                            <div class="detailsP col lg-six leftCol">
                                <p>This handcrafted leather backpack is cut from the highest quality Italian leathers, adorned in culturally inspired hardware designed by local artisans, geometric contouring, premium Italian lining, and a secret device pocket allowing for easy access without grabbing or tugging. Organic textures protect your hardware from bumps and scratches on the go. Available in our Classic, Buernos Aires, Marrakech, Reykjavik &amp; Santa Fe Collections; compatible with iPad Air 1 &amp; 2, all iPad Minis and small laptops.</p>
                                <div class="policyIcons">
                                    <div class="lg-six"><img src="/img/product/warranty_icon.png" alt="" height="20" />&nbsp;&nbsp;<span>Product Warranty</span></div><!--
                                    --><div class="lg-six"><img src="/img/product/shipping_icon.png" alt="" height="20" />&nbsp;&nbsp;<span>Shipping &amp; Returns</span></div>
                                </div>
                            </div><!-- 
                            --><div class="detailsSpecs col lg-six rightCol">
                                <span class="detailsSpecsTitle">Dimensions:</span><br />
                                <span class="detailsSpec">Height / Width / Depth:<br />26in x 16in x 5in&nbsp;&nbsp;&#124;&nbsp;&nbsp;66cm x 41cm x 13cm</span><br />
                                <span class="detailsSpecsTitle">Weight:</span><br />
                                <span class="detailsSpec">4.56 lbs&nbsp;&nbsp;&#124;&nbsp;&nbsp;2.07 kg</span><br />
                                <span class="detailsSpecsTitle">Primary Material(s):</span><br />
                                <span class="detailsSpec">100% Italian Leather w/ Brass (or) Steel Hardware</span>
                            </div>
                            <div class="featurePaneWrapper">
                                <div class="featurePane col sm-twelve">
                                    <div class="featureTitle lg-four">
                                        <img src="/img/product/shipping_icon.png" alt="" height="20" /><br /><br />
                                        <span class="featurePaneTitle">Modicientirum net vitiante</span>
                                    </div><div class="lg-eight">
                                        <p class="featureCopy featurePaneP">Successful researchers can observe the results with a careful attention in the mood to analyze a phenomenon under the most diverse and different perspectives. Question themselves on assumptions that do not fit with the empirical observations.<br /><br />Realizing that serendipitous events can generate important research ideas, these researchers recognize and appreciate the unexpected, encouraging their assistants to observe and discuss unexpected events.</p>
                                    </div>
                                </div>

                                <div class="featurePane col sm-twelve">
                                    <div class="featureTitle lg-four">
                                        <img src="/img/product/shipping_icon.png" alt="" height="20" /><br /><br />
                                        <span class="featurePaneTitle">Modicientirum net vitiante</span>
                                    </div><div class="lg-eight">
                                        <p class="featureCopy featurePaneP">Successful researchers can observe the results with a careful attention in the mood to analyze a phenomenon under the most diverse and different perspectives. Question themselves on assumptions that do not fit with the empirical observations.<br /><br />Realizing that serendipitous events can generate important research ideas, these researchers recognize and appreciate the unexpected, encouraging their assistants to observe and discuss unexpected events.</p>
                                    </div>
                                </div>

                                <div class="featurePane col sm-twelve">
                                    <div class="featureTitle lg-four">
                                        <img src="/img/product/shipping_icon.png" alt="" height="20" /><br /><br />
                                        <span class="featurePaneTitle">Modicientirum net vitiante</span>
                                    </div><div class="lg-eight">
                                        <p class="featureCopy featurePaneP">Successful researchers can observe the results with a careful attention in the mood to analyze a phenomenon under the most diverse and different perspectives. Question themselves on assumptions that do not fit with the empirical observations.<br /><br />Realizing that serendipitous events can generate important research ideas, these researchers recognize and appreciate the unexpected, encouraging their assistants to observe and discuss unexpected events.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pile of Featured Products -->
        <div class="bgWrapper featuredProductsBg filterFeatured filterOn">
            <h2 class="genderTitle">Featured Products</h2>
            <div class="contentWrapper shopItemsWrapper">
                <a class="shopItem lg-four" href="/product.php">
                    <img src="img/product/canvas_black_backpack.png" alt="" />
                    <span class="shopItemPrice">$2,500.00</span>
                    <span class="shopItemTitle">Featured Backpack</span>
                    <span class="shopItemSubtitle">Classic Collection</span>
                </a><a class="shopItem lg-four" href="/product.php">
                    <img src="img/product/canvas_black_satchel.png" alt="" />
                    <span class="shopItemPrice">$2,500.00</span>
                    <span class="shopItemTitle">Featured Product 2</span>
                    <span class="shopItemSubtitle">Classic Collection</span>
                </a><a class="shopItem lg-four" href="/product.php">
                    <img src="img/product/canvas_black_weekender.png" alt="" />
                    <span class="shopItemPrice">$2,500.00</span>
                    <span class="shopItemTitle">Featured Product</span>
                    <span class="shopItemSubtitle">Classic Collection</span>
                </a><a class="shopItem lg-four" href="/product.php">
                    <img src="img/product/canvas_black_weekender.png" alt="" />
                    <span class="shopItemPrice">$2,500.00</span>
                    <span class="shopItemTitle">Featured Product</span>
                    <span class="shopItemSubtitle">Classic Collection</span>
                </a><a class="shopItem lg-four" href="/product.php">
                    <img src="img/product/canvas_black_satchel.png" alt="" />
                    <span class="shopItemPrice">$2,500.00</span>
                    <span class="shopItemTitle">Featured Product 2</span>
                    <span class="shopItemSubtitle">Classic Collection</span>
                </a><a class="shopItem lg-four" href="/product.php">
                    <img src="img/product/canvas_black_backpack.png" alt="" />
                    <span class="shopItemPrice">$2,500.00</span>
                    <span class="shopItemTitle">Featured Backpack</span>
                    <span class="shopItemSubtitle">Classic Collection</span>
                </a>
            </div>
        </div>

        <!-- Gallery LightBox / Modal Overlay -->
        <!-- <div class="modalOverlay hide">
                <div class="modalPanel">
                        <div class="widthWrapperModal">
                                <a class="modalClose" href="#" onclick="return false;">X</a>
                        </div>
                </div>
        </div> -->

        <!-- LightBox -->
        <?php include '/incs/lightBox.php'; ?>

        <!-- Footer -->
        <?php include '/incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '/incs/footer-links.php'; ?>

        <!-- Select Menu -->
        <script>
            $('select').each(function () {
                var $this = $(this), numberOfOptions = $(this).children('option').length;

                $this.addClass('select-hidden');
                $this.wrap('<div class="select"></div>');
                $this.after('<div class="select-styled"></div>');

                var $styledSelect = $this.next('div.select-styled');
                $styledSelect.text($this.children('option').eq(0).text());

                var $list = $('<ul />', {
                    'class': 'select-options'
                }).insertAfter($styledSelect);

                for (var i = 0; i < numberOfOptions; i++) {
                    $('<li />', {
                        text: $this.children('option').eq(i).text(),
                        rel: $this.children('option').eq(i).val()
                    }).appendTo($list);
                }

                var $listItems = $list.children('li');

                $styledSelect.click(function (e) {
                    e.stopPropagation();
                    $('div.select-styled.active').each(function () {
                        $(this).removeClass('active').next('ul.select-options').hide();
                    });
                    $(this).toggleClass('active').next('ul.select-options').toggle();
                });

                $listItems.click(function (e) {
                    e.stopPropagation();
                    $styledSelect.text($(this).text()).removeClass('active');
                    $this.val($(this).attr('rel'));
                    $list.hide();
                    //console.log($this.val());
                });

                $(document).click(function () {
                    $styledSelect.removeClass('active');
                    $list.hide();
                });

            });
        </script>

        <script type='text/javascript'>
            window.onload = function () {
                $.getScript("/js/jquery.reel.js");
            };
        </script>

        <script type="text/javascript" src="/js/slick/slick.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.productGallery').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    speed: 500,
                    arrows: true,
                    mobileFirst: true,
                    swipeToSlide: true,
                    responsive: [
                        {
                            breakpoint: 420,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4
                            }
                        }
                    ]
                });
            });
        </script>

        <!-- Gallery LightBox / Modal -->
        <script>
            $(document).on('click', '.slideLightBoxLink', function () {
                $('.lightBoxOverlay').removeClass('hide');
            });
            $(document).on('click', '.lightbox1', function () {
                $('.galleryImg1').removeClass('hide');
            });
            $(document).on('click', '.lightbox2', function () {
                $('.galleryImg2').removeClass('hide');
            });
            $(document).on('click', '.lightbox3', function () {
                $('.galleryImg3').removeClass('hide');
            });
            $(document).on('click', '.lightbox4', function () {
                $('.galleryImg4').removeClass('hide');
            });
            $(document).on('click', '.class1, .class2, .class3', function () {
                $('.classa').removeClass('classb');
            });
            $(document).on('click', '.modalClose, .lightBoxOverlay', function () {
                $('.lightBoxOverlay').addClass('hide');
                $('.galleryImg').addClass('hide');
            });
        </script>

    </body>
</html>
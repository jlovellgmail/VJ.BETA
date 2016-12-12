<!doctype html>
<?php $page = "collections"; ?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Canvas | Virgil James</title>
    <link rel="stylesheet" href="/css/animate.css" />

    <?php include '../incs/head-links.php'; ?>

    <link rel="stylesheet" href="/css/shop.css" />
    <link rel="stylesheet" href="/css/collection/collection.css" />
    <link rel="stylesheet" href="/css/collection/canvas.css" />

    <?php
    if ($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php") {
        print("
			<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/collection/animate-classic.css\" />
			<style>
				.hideBG {
					background-image: none;
					background-color: #fff;
				}
			</style>
		");
    }
    ?>
    <script src="/js/vendor/modernizr.js"></script>
</head>
<body>

    <!-- Navgivation -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>

    <div class="fullBG"></div>
    <div class="scrollWaypoint"></div>

    <!-- Top Hero -->
    <div class="bgWrapper productSelectorBgWrapper<?php
    if ($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php") {print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">

        <!-- Mens/Womens/Acc Backgrounds -->
        <div class="selItemBg"></div>
        <div class="contentWrapper">
            <div class="productSelectorTitle">
                <span class="productLineTitle">Classic</span><div class="lineTitleSpace">&nbsp;</div><span class="lineLine">Line</span><br />
                <h1 class="productCollectionTitle">Canvas Collection</h1>
            </div>
            <div class="productSelectorBtnsWrapper">
                <!-- Selection Buttons -->
                <a class="itemBtn itemBtn-1 itemBtnInactive" href="#" onClick="return false;">Mens</a>
                <a class="itemBtn itemBtn-2 itemBtnInactive" href="#" onClick="return false;">Womens</a>
                <a class="itemBtn itemBtn-3 itemBtnInactive" href="#" onClick="return false;">Accessories</a>
            </div>

            <!-- Back Button -->
            <div class="backBtnWrapper opacityHide heightHide">
                <a href="#" onClick="return false;">
                    <div class="arrowWrapper">
                        <div class="arrow-left"></div>
                    </div>
                    <span class="backBtnTitle">Back</span>
                </a>
            </div>
        </div>
    </div>

    <!-- lineProducts loaded content via js goes here -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/collection/incs/canvas.php'; ?>

    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>

    <!-- Common .js Includes -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>

    <!-- Gender Selection Scripts -->
    <script>

        //  Clicking any Gender Button
        $(document).on('click', '.itemBtn', function () {
            $(this).addClass('itemBtnActive');
            $(this).siblings('.itemBtn').removeClass('itemBtnActive');
            $(this).siblings('.itemBtn').addClass('itemBtnInactive');
            $('.backBtnWrapper').removeClass('opacityHide');
            $('.backBtnWrapper').removeClass('heightHide');
            $('.backBtnWrapper').addClass('opacityShow');
            $('.productBgWrapper').removeClass('lineProductsOpacity');
        });

        //	Clicking a Specific Gender Button
        $(document).on('click', '.itemBtn-1', function () {
            $('#lineProducts').load('/incs/mensProducts.php');
            $('.selItemBg').removeClass('selItemBg2');
            $('.selItemBg').removeClass('selItemBg3');
            $('.selItemBg').addClass('selItemBg1');
        });

        $(document).on('click', '.itemBtn-2', function () {
            $('#lineProducts').load('/incs/womensProducts.php');
            $('.selItemBg').removeClass('selItemBg1');
            $('.selItemBg').removeClass('selItemBg3');
            $('.selItemBg').addClass('selItemBg2');
            
        });

        $(document).on('click', '.itemBtn-3', function () {
            $('#lineProducts').load('/incs/accProducts.php');
            $('.selItemBg').removeClass('selItemBg1');
            $('.selItemBg').removeClass('selItemBg2');
            $('.selItemBg').addClass('selItemBg3');
        });

        //	Clicking the Back Button
        $(document).on('click', '.backBtnWrapper', function () {
            $('#lineProducts').load('/incs/whyCanvas.php');
            $('.selItemBg').removeClass('selItemBg1 selItemBg2 selItemBg3');
            $('.itemBtn').removeClass('itemBtnActive');
            $('.itemBtn').addClass('itemBtnInactive');
            $('.backBtnWrapper').removeClass('opacityShow');
            $('.backBtnWrapper').addClass('opacityHide');
            $('.backBtnWrapper').addClass('heightHide');
        });

    </script>

    <!-- Load & initialize WOW animations -->
    <script src="/js/dist/wow.min.js"></script>
    <script>
    	new WOW().init();
	</script>
	<script src="/js/imagesloaded.pkgd.min.js"></script>

    <!-- This script hides the transition background shortly after all page content is fully loaded -->
    <script>
        $(window).bind("load", function () {
            setTimeout(doSomething, 500);
            function doSomething() {
                $('.fullBG').addClass('hideBG');
            }
        });
    </script>

</body>
</html>

<!-- PHP if statements dictate whether or not the site will fade in page elements to create the smooth transition effect. -->
<!-- Curently, the page performs a smooth transition if coming from the collections page. -->
<!-- It also only loads the CSS file "classic-animate.css" if coming from the collections page, which adds the background image and sets initial opacities to 0. -->
<!-- Javascript at the bottom of the page removes the background image and adds white once the page is loaded and the transition is complete. -->
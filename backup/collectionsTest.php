<!doctype html>
<?php
$page = "collections";
include_once('/incs/conn.php');
?>

<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Collections | Virgil James</title>

        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/collections.css" />
        <script src="/js/vendor/modernizr.js"></script>
    </head>
    <body>

        <!-- Navgivation -->
        <?php include '/incs/nav.php'; ?>

        <div class="scrollWaypoint"></div>

       
        <?php include '/incs/collectionsTest.php'; ?>

        <!-- Footer -->
        <?php include '/incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '/incs/footer-links.php'; ?>

        <script>

            //ANY BUTTON
            $(document).on('click', 'collectionButton', function () {
                $('.collectionsHeroBgWrapper, .footerBgWrapper').addClass('hideViaHeight');
                $('.bgWrapper').addClass('bgWrapperNoStroke');
                $('.scrollWaypoint').addClass('scrollWaypointKill');
                $('.navBg').removeClass('navBgScroll');
                $('.navBurger').removeClass('navBurgerScroll');
                $('.navBurger').addClass('navBurgerTop');
                $('.menuItem').removeClass('gold');
                $('.logoSprite').removeClass('logoSpriteScroll');
                $('.logoSprite').addClass('logoSpriteTop');
            });

            // UNIVERSAL COLLECTION BUTTON
            $(document).on('click', '.collectionButton', function () {
                $('.lineTitleWrapper, .lineButtonsWrapper, .lineTagline').addClass('hideViaOpacity');
                $(this).parents('.collectionBgWrapper').addClass('expandHeight100VH');
                $(this).parents('.collectionBgWrapper').siblings('.collectionBgWrapper').addClass('hideViaHeight');
            });


            // Reset States for browsers that return to finished transition when hitting back from a collection page
            $(document).ready(function () {
                window.onunload = function(){}; // This forces browser to run javascript when arriving via the back button
                $('.collectionBgWrapper').removeClass('expandHeight100VH');
                $('.collectionBgWrapper').removeClass('hideViaHeight');
            });


        </script>

        <script>
            $(document).ready(function () {
                $('.collectionButton').click(function (event) {
                    event.preventDefault();
                    redirectLink = this.href;
                    setTimeout(function () {
                        redirectToLink(redirectLink);
                    }, 650);
                });
                function redirectToLink(url) {
                    window.location = url;
                }
            });
        </script>

    </body>
</html>
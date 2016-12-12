<!doctype html>
<?php $page = "cart"; ?>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Checkout | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/cart.css" />
        <link rel="stylesheet" href="/css/common_dev.css">
        <link rel="stylesheet" href="/css/forms.css">

        <script src="/js/vendor/modernizr.js"></script>

    </head>
    <body class="cartBody">

        <!-- Navgivation -->
        <?php include '../incs/nav.php'; ?>

        <div class="scrollWaypoint"></div>

        

        <!-- Top Hero -->
        <div class="bgWrapper">
            <div class="widthWrapper">
                <div class="tableWrapper table100">
                    <div class="cellWrapper">
                        <div class="signInWrapper lg-eight">

                        <!-- The content inside this content wrapper could theoretically be pasted into a modalContent div to be modalized -->

                            <h1>Sign In</h1>
                            <div class="signInColLeft lg-six">
                                <h2>Returning Customer</h2>
                                <form id="signInForm">
                                    <label for="userEmail">Email:</label>
                                    <input id="userEmail" type="text" />
                                    <label for="userPass">Password:</label>
                                    <input id="userPass" type="password" />
                                    <button class="fillBtn mobileElement" form="signInForm" href="#">Sign In</button>
                                </form>
                            </div><div class="signInColRight lg-six">
                                <h2>Guest Customer</h2>
                                <p>Checkout without signing. During Checkout you can create an account using the information you provide for this transaction.</p>
                                <a class="fillBtn mobileElement" href="#">Continue</a>
                            </div>
                            <div class="buttonsRow lg-twelve">
                                <div class="signInButtonWrapper lg-six">
                                    <button class="fillBtn desktopElement" form="signInForm" href="#">Sign In</button>
                                </div><div class="guestButtonWrapper lg-six">
                                    <a class="fillBtn desktopElement" href="#">Continue</a>
                                </div>
                            </div>

                        <!-- /modal code -->

                        </div>
                    </div>
                </div>
            </div>
        </div>        

        <!-- Top Hero -->
        <div class="bgWrapper">
            <div class="widthWrapper">
                <div class="tableWrapper table100">
                    <div class="cellWrapper">
                        <div class="signInWrapper lg-eight">

                        <!-- The content inside this content wrapper could theoretically be pasted into a modalContent div to be modalized -->

                            <h1 class="caps fw-700 gold">Sign In</h1>
                            <div class="leftLogin leftCol lg-six">
                                <h2 class="ital fw-400 gold">Returning Customer</h2>
                                <form id="signInForm" class="generalForm">
                                    <label for="userEmail">Email:</label>
                                    <input id="userEmail" type="text" />
                                    <label for="userPass">Password:</label>
                                    <input id="userPass" type="password" />
                                    <button class="fillBtn mobileElement" form="signInForm" href="#">Sign In</button>
                                </form>
                            </div><div class="rightLogin rightCol lg-six">
                                <h2 class="ital fw-400 gold">Guest Customer</h2>
                                <p>Checkout without signing. During Checkout you can create an account using the information you provide for this transaction.</p>
                                <a class="fillBtn mobileElement" href="#">Continue</a>
                            </div>
                            <div class="desktopElement lg-twelve">
                                <div class="signInButtonWrapper lg-six">
                                    <button class="fillBtn" form="signInForm" href="#">Sign In</button>
                                </div><div class="guestButtonWrapper rightCol lg-six">
                                    <a class="fillBtn" href="#">Continue</a>
                                </div>
                            </div>

                        <!-- /modal code -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include '../incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include '../incs/footer-links.php'; ?>
        <script src="cart.js" type="text/javascript"></script>
        <!-- <script src="/js/jquery.reel.js"></script> -->

    </body>
</html>
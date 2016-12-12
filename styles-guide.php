<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sandbox</title>


        <!-- JL -->
        <!-- switch to Jay's account -->
        <!--
        <script src="//use.typekit.net/fcs3ojc.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        -->
        <script src="https://use.typekit.net/zeq6fsn.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>



        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/common_dev.css">
        <link rel="stylesheet" href="/css/forms.css">

    </head>
    <body>

        <!-- Common .js Includes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <div class="bgWrapper" style="background-color: #bbb;">
            <div class="widthWrapper">
                <div class="tableWrapper" style="height: 600px;">
                    <div class="cellWrapper" style="color: #fff;">

                        <h1 class="caps fw-600 f-28">VJ Styles SandBox (.caps title)</h1>
                        <h2 class="ital fw-400 f-24">Example h-title with ".ital" class, and .fw-400 and .f-24</h2>
                        <p>Here's some vertically centered content.<br />
                            It has a declared height but will automatically grow as well.<br />
                            .bgWrapper is for full-width background images.<br />
                            .widthWrapper constrains body content to max 1200px width.<br />
                            tableWrapper/cellWrapper allow vertical centering. Height is set in .tableWrapper.</p>
                        <div class="line-separator" style="margin-bottom: 30px;"></div>
                        <div class="line-separator50p" style="margin-bottom: 30px;"></div>
                        <div class="line-separator67p" style="margin-bottom: 30px;"></div>
                        <div class="line-separator100p" style="margin-bottom: 30px;"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="bgWrapper">
            <div class="widthWrapper" style="padding-top: 8vh; padding-bottom: 8vh; background-color: #eee;">
                <a class="fillBtn" style="background-color: #bbb;" href="#">fillBtn A</a>
                <button class="fillBtn" style="background-color: #bbb;">fillBtn Button</button>
            </div>
            <div class="widthWrapper" style="padding-top: 8vh; padding-bottom: 8vh; background-color: #928b53;">
                <button class="borderBtn">borderBtn</button>
            </div>

        </div>

        <div class="bgWrapper">
            <div class="widthWrapper" style="padding-top: 8vh; padding-bottom: 8vh; background-color: #aaa;">
                <button class="borderBtn" onclick="openModal('modal1');">Check out the Modal</button>
                <button class="borderBtn" onclick="openModal('modal2');">Another One</button>
            </div>
        </div>

        <div class="modalOverlay hide">
            <div class="modalContainer">
                <div class="modalWindow">
                    <button class="modalClose">X</button>

                    <div class="modalContent modal1 hide">
                        <h6 class="modalTitle">Easy Modal.</h6>
                        <p>View source code to see how to add multiple modals for one page. All divs are re-used except for the copy container itself.</p>
                    </div>

                    <div class="modalContent modal2 hide">
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
                    </div>

                </div>
            </div>
        </div>

        <script> 
            function openModal(mID) {
                $('.modalOverlay').removeClass('hide');
                $('.' + mID).removeClass('hide');
            }

            $(document).on('click', '.modalOverlay, .modalClose, .navBg', function () {
                $('.modalContent').addClass('hide');
                $('.modalOverlay').addClass('hide');
            });

            $(document).on('click', '.modalWindow', function (e) {
                e.stopPropagation();
            });
        </script>



    </body>
</html>
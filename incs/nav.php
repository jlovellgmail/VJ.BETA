<?php
//include "/incs/session_detect.php"; 
$rootpath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootpath . "/classes/Cart.class.php";
require_once $rootpath . "/classes/Product.class.php";
if (!isset($_SESSION)) {
    session_start();
}
$UsrPriv = $_SESSION["UsrPriv"];
$login =  $_SESSION["login"];
$rootpath = $_SERVER['DOCUMENT_ROOT'];
?>

<div class="headerContainer">
    <div class="navWidthWrapper">
        <div class="headerHeightWrapper">
            <div class="logoContainer">
                <a class="logoLink" href="/index.php">
                    <img class="navLogo" src="/img/VJ_logo.svg" alt="Virgil James" />
                </a>
            </div>
            <div class="rightItemsContainer">
                <div class="textLinksContainer">
                    <a href="/index.php">Shop</a>
                    <a href="/about.php">About</a>
                    <a href="/lifestyle.php">Journal</a>
                </div>
                <div class="iconsContainer">
                    <div id="CartNavContainer" class="iconWrapper cartIconWrapper cartDropdownWrapper">
                        <?php include $rootpath.'/incs/navCart.php'; ?>
                    </div>
                    <a class="iconWrapper" href="/login.php">
                        <?php include $rootpath.'/incs/navUser.php'; ?>
                    </a>
                </div>
                <div class='burgerContainer'>
                    <i class="icon-menu visible"></i>
                    <i class="icon-cancel"></i>
                </div>
            </div>
        </div>
        <div class="dropdown">
            <div class="dropdownLinksContainer">
                <div class="textLinksContainer">
                    <a href="/index.php">Shop</a>
                    <a href="/about.php">About</a>
                    <a href="/lifestyle.php">Journal</a>
                </div>
            </div>
        </div>
        <script>
            jQuery(function($){
                $(".burgerContainer").click(function(){
                    $('.dropdown').toggleClass('visible');
                    $('.burgerContainer .icon-menu').toggleClass("visible");
                    $(".burgerContainer .icon-cancel").toggleClass("visible");
                });
            });
        </script>
        <script type="text/javascript">



            // Make header visible when page is not taller than window.
            // This is necessary on the Terms page where header disappears after scroll on "legal" tab, 
            // then you switch tabs and you can't scroll to make header reappear, so it's stuck in hidden
            MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
            var observer = new MutationObserver(function(mutations, observer) {
                var bodyHeight = $("body").height();
                var winHeight = $(window).height();
                if (bodyHeight <= winHeight ) {
                    // show the header if content is not taller than window
                    $(".headerContainer").removeClass("headerUp");
                }
            });
            observer.observe(document, {
              subtree: true,
              attributes: true
            });




            var lastScrollTop = 0;
            var delta = 5;
            var headerHeight = $(".headerContainer").outerHeight();
            var didScroll;
            // on scroll, let the interval function know the user has scrolled
            $(window).scroll(function(event){
                didScroll = true;
            });
            // run hasScrolled() and reset didScroll status
            setInterval(function() {
                if (didScroll) {
                    hasScrolled();
                    didScroll = false;
                }
            }, 250);
            function hasScrolled() {
                var st = $(this).scrollTop();
                if(Math.abs(lastScrollTop - st) <= delta){
                    return;
                }
                // If current position > last position AND scrolled past navbar...
                if (st > lastScrollTop && st > headerHeight){
                    // hide header
                    $(".headerContainer .dropdown").removeClass("visible");
                    setTimeout(function() {
                        $(".headerContainer").addClass("headerUp");
                    }, 200);
                    setTimeout(function() {
                        $('.burgerContainer .icon-menu').addClass("visible");
                        $(".burgerContainer .icon-cancel").removeClass("visible");
                    }, 400);
                } 
                else {
                    // show header
                    if(st + $(window).height() < $(document).height()) { 
                        $(".headerContainer").removeClass("headerUp");
                    }
                }
                lastScrollTop = st;
            }







        </script>
        <div class="bottomBorder">
        </div>
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
    </div>
</div>
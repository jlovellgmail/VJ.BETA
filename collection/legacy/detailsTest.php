<!doctype html>
<?php
$page = "collections";
$collection = $_GET["col"];
$line = $_GET["line"];

$type = $_GET['type'];
// hardcode but we need to identify it from DB
/*
  switch ($collection) {
  case "canvas":
  case "collection":
  case "k-johnson":
  case "reykjavik":
  case "santa-fe":
  echo "Your favorite color is red!";
  break;
  default:
  echo "Your favorite color is neither red, blue, or green!";
  } */
switch ($line) {
    case "city":
        $mens = TRUE;
        $women = TRUE;
        $accessories = TRUE;
        break;
    case "classic":
       $mens = TRUE;
        $women = TRUE;
        $accessories = TRUE;
        break;
    case "signature":
        $mens = TRUE;
        $women = FALSE;
        $accessories = FALSE;
        break;
    default:
        $mens = TRUE;
        $women = TRUE;
        $accessories = TRUE;
        break;
}
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Canvas | Virgil James</title>
        <link rel="stylesheet" href="/css/animate.css" />

        <?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/collection/collection.css" />
        <link rel="stylesheet" href="/css/collection/<?php echo $collection ?>.css" />

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
        if ($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php") {
            print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");
        }
        ?>">

            <!-- Mens/Womens/Acc Backgrounds -->
            <div class="selItemBg selItemBg-1" id="Bg1"></div>
            <div class="selItemBg selItemBg-2" id="Bg2"></div>
            <div class="selItemBg selItemBg-3" id="Bg3"></div>
                <div class="contentWrapper">
                    <div class="productSelectorTitle">
                        <span class="productLineTitle"><?php echo strtoupper($line); ?></span><div class="lineTitleSpace">&nbsp;</div><span class="lineLine">Line</span><br />
                        <h1 class="productCollectionTitle"><?php echo ucfirst($collection); ?> Collection</h1>
                    </div>
                    <div class="productSelectorBtnsWrapper">
                        <!-- Selection Buttons -->
                        <?php if ($mens) { ?>
                            <a class="itemBtn itemBtn-1 itemBtnInactive" href="/collection/detailsTest.php?col=canvas&line=classic&type=mens" onClick="return false;">Mens</a>
                        <?php } ?>
                        <?php if ($women) { ?>
                            <a class="itemBtn itemBtn-2 itemBtnInactive" href="/collection/detailsTest.php?col=canvas&line=classic&type=womens" onClick="return false;">Womens</a>
                        <?php } ?>
                        <?php if ($accessories) { ?>
                            <a class="itemBtn itemBtn-3 itemBtnInactive" href="/collection/detailsTest.php?col=canvas&line=classic&type=accessories" onClick="return false;">Accessories</a>
                        <?php } ?>
                    </div>

                    <!-- Back Button -->
                    <div class="backBtnWrapper opacityHide">
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/collection/incs/' . $collection . '.php'; ?>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>

        <!-- Common .js Includes -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>

        <!-- Gender Selection Scripts -->
        <script>
			var colType = '<?php echo $type; ?>';
			
			$( document ).ready(function() {
			    loadContent(colType);
			});
			
			function holdUp1() {
                $('#lineProducts').load('/incs/mensProducts.php?rnd='+Math.random()*11);
            }
			function holdUp2() {
                $('#lineProducts').load('/incs/womensProducts.php?rnd='+Math.random()*11);
            }
			function holdUp3() {
                $('#lineProducts').load('/incs/accProducts.php?rnd='+Math.random()*11);
            }
			function holdUp4() {
                $('#lineProducts').load('/incs/<?php echo $collection ?>.php?rnd='+Math.random()*11);
            }
					
			function loadContent(colType)
			{
				if (colType == 'mens')
				{
					$('.itemBtn-1').addClass('itemBtnActive');
	                $('.itemBtn-1').removeClass('itemBtnInactive');
	                $('.itemBtn-1').siblings('.itemBtn').removeClass('itemBtnActive');
	                $('.itemBtn-1').siblings('.itemBtn').addClass('itemBtnInactive');
	                $('.backBtnWrapper').removeClass('opacityHide');
	                $('.backBtnWrapper').addClass('opacityShow');
	                $('.copyPanel').fadeOut();
					
					setTimeout(holdUp1, 750);
	                    
	                $('.selItemBg-1').addClass('selItemBgShow');
	                $('.selItemBg-2, .selItemBg-3').removeClass('selItemBgShow');				
				}
				else if (colType == 'womens')
				{
					$('.itemBtn-2').addClass('itemBtnActive');
	                $('.itemBtn-2').removeClass('itemBtnInactive');
	                $('.itemBtn-2').siblings('.itemBtn').removeClass('itemBtnActive');
	                $('.itemBtn-2').siblings('.itemBtn').addClass('itemBtnInactive');
	                $('.backBtnWrapper').removeClass('opacityHide');
	                $('.backBtnWrapper').addClass('opacityShow');
	                $('.copyPanel').fadeOut();
					
					setTimeout(holdUp2, 750);
	                    
	                $('.selItemBg-2').addClass('selItemBgShow');
	                $('.selItemBg-1, .selItemBg-3').removeClass('selItemBgShow');
				}
				else if (colType == 'accessories')
				{
					$('.itemBtn-3').addClass('itemBtnActive');
	                $('.itemBtn-3').removeClass('itemBtnInactive');
	                $('.itemBtn-3').siblings('.itemBtn').removeClass('itemBtnActive');
	                $('.itemBtn-3').siblings('.itemBtn').addClass('itemBtnInactive');
	                $('.backBtnWrapper').removeClass('opacityHide');
	                $('.backBtnWrapper').addClass('opacityShow');
	                $('.copyPanel').fadeOut();
					
					setTimeout(holdUp3, 750);
	                    
	                $('.selItemBg-3').addClass('selItemBgShow');
	                $('.selItemBg-1, .selItemBg-2').removeClass('selItemBgShow');
				}
				/*else if (colType == "")
				{
					$('.copyPanel').fadeOut();
	                setTimeout(holdUp4, 750);
	                    
	                $('.selItemBg').removeClass('selItemBgShow');
	                $('.itemBtn').removeClass('itemBtnActive');
	                $('.itemBtn').addClass('itemBtnInactive');
	                $('.backBtnWrapper').removeClass('opacityShow');
	                $('.backBtnWrapper').addClass('opacityHide');
				}*/
			}
			
			window.onpopstate = function(event) {
				//$("#loading").show();
				//console.log("pathname: "+location.pathname);
				var tmpPath = location.href;
				var tmpPathArr = tmpPath.split("type=");
				loadContent(tmpPathArr[1]);
			};
		
            //  Clicking any Gender Button
            $(document).on('click', '.itemBtn', function () {
                $(this).addClass('itemBtnActive');
                $(this).removeClass('itemBtnInactive');
                $(this).siblings('.itemBtn').removeClass('itemBtnActive');
                $(this).siblings('.itemBtn').addClass('itemBtnInactive');
                $('.backBtnWrapper').removeClass('opacityHide');
                $('.backBtnWrapper').addClass('opacityShow');
                $('.copyPanel').fadeOut();
            });

            //  Clicking a Specific Gender Button
            $(document).on('click', '.itemBtn-1', function () {
                setTimeout(holdUp1, 750);

                $('.selItemBg-1').addClass('selItemBgShow');
                $('.selItemBg-2, .selItemBg-3').removeClass('selItemBgShow');
				history.pushState('', 'Mens', '/collection/detailsTest.php?col=canvas&line=classic&type=mens');
				//e.preventDefault();
            });

            $(document).on('click', '.itemBtn-2', function () {
                setTimeout(holdUp2, 750);

                $('.selItemBg-2').addClass('selItemBgShow');
                $('.selItemBg-1, .selItemBg-3').removeClass('selItemBgShow');
				history.pushState('', 'Mens', '/collection/detailsTest.php?col=canvas&line=classic&type=womens');
				//e.preventDefault();
            });

            $(document).on('click', '.itemBtn-3', function () {
                setTimeout(holdUp3, 750);

                $('.selItemBg-3').addClass('selItemBgShow');
                $('.selItemBg-1, .selItemBg-2').removeClass('selItemBgShow');
				history.pushState('', 'Mens', '/collection/detailsTest.php?col=canvas&line=classic&type=accessories');
				//e.preventDefault();
            });

            $(document).on('click', '.itemBtnInactive', function () {
                $(this).siblings('.itemBtn').addClass('itemBtnInactive');
            });

            //  Clicking the Back Button
            $(document).on('click', '.backBtnWrapper', function () {
                $('.copyPanel').fadeOut();
                setTimeout(holdUp4, 750);

                $('.selItemBg').removeClass('selItemBgShow');
                $('.itemBtn').removeClass('itemBtnActive');
                $('.itemBtn').addClass('itemBtnInactive');
                $('.backBtnWrapper').removeClass('opacityShow');
                $('.backBtnWrapper').addClass('opacityHide');
            });

        </script>

        <!-- Load & initialize WOW animations -->
        <script src="/js/dist/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>

        <script src="/js/imagesloaded.pkgd.min.js"></script>

        <!-- This script hides the transition background 1 second after all page content is fully loaded -->
        <script>
            $(window).bind("load", function () {
                setTimeout(doSomething, 800);
                function doSomething() {
                    $('.fullBG').addClass('hideBG');
                }
            });
        </script>

        <script>
            // $.ajax({
            // type: 'GET',
            // url: '/incs/mensProducts.php',
            // data: {},
            // success: function (result) {
            // $('#lineProducts').html(result);
            // }
            // });
        </script>

    </body>
</html>

<!-- Basic PHP if statements dictate whether or not the site will fade in page elements to create the smooth transition effect. -->
<!-- Curently, the page performs a smooth transition if coming from the collections page. -->
<!-- It also only loads the CSS file "classic-animate.css" if coming from the collections page, which adds the background image and sets initial opacities to 0. -->
<!-- Javascript at the bottom of the page removes the background image and adds white once the page is loaded and the transition is complete. -->
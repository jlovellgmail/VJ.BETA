<!doctype html>
<?php $page = "collections"; ?>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Canvas | Virgil James</title>
	<link rel="stylesheet" href="/css/animate.css" />

	<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/head-links.php'; ?>

	<link rel="stylesheet" href="/css/shop.css" />
	<link rel="stylesheet" href="/css/collection/collection.css" />
	<link rel="stylesheet" href="/css/collection/k-johnson.css" />
	
	<?php
		if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php") {
			print("
				<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/collection/animate-signature.css\" />
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
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/nav.php'; ?>

<div class="fullBG"></div>
<div class="scrollWaypoint"></div>

<!-- Top Hero -->
<div class="bgWrapper productSelectorBgWrapper<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">

	<!-- All Products Background -->
	<div class="selItemBg selItemBg-kJohnson selBgInactive"></div>

	<div class="contentWrapper">
		<div class="productSelectorTitle<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">
			<span class="productLineTitle">Siganture</span><div class="lineTitleSpace">&nbsp;</div><span class="lineLine">Line</span><br />
			<h1 class="productCollectionTitle">Kenneth Johnson Collection</h1>
		</div>
		<div class="productSelectorBtnsWrapper">
			<!-- Selection Buttons -->
			<a class="itemBtn itemBtn-1 itemBtnInactive<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>" href="#" onClick="return false;">All Products</a>
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

		<!-- All Products Selector Titles -->
		<!-- selItemTitle: shop.css, position, font, opacity transition -->
		<!-- opacityHide: opacity: 0, opacity transition -->
		<span class="selItemTitle selItemTitle-1 opacityHide">All Products</span>

	</div>
</div>

<!-- Men's Product Panel -->
<div class="bgWrapper productBgWrapper filterAll filterOff">
	<h2 class="genderTitle">All Products</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_backpack.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Backpack</span>
			<span class="shopItemSubtitle">Kenneth Johnson Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_satchel.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Product 2</span>
			<span class="shopItemSubtitle">Kenneth Johnson Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_weekender.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 3</span>
			<span class="shopItemSubtitle">Kenneth Johnson Collection</span>
		</a>
	</div>
</div>

<!-- Collection Details -->
<div class="bgWrapper collectionIntroBgWrapper<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">
	<div class="contentWrapper landingInfo filterOn">
		<h2 class="<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print("wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">Who’s Kenneth Johnson?</h2>
		<p class="eight collectionIntroP<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">Kenneth Johnson is an exceptionally talented jewelry designer, renown for his contemporary interpretation of Native American themes and culture. After 25 years, he’s busier than ever, creating custom pieces for collectors around the world. Kenneth works with an array of metals – using stamp work, engraving, and faceted gemstones to achieve his distinctive creations. As a leading Native American (Muscogee/Seminole) artist, who now makes his home in Santa Fe, New Mexico, Virgil James is extremely fortunate to collaborate with&nbsp;this&nbsp;talent.</p>
		<div class="highlightsWrapper<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">
			<img class="highlightOne six" src="/img/collections/collection/canvas_collection_highlight_photo-1.jpg" alt="" /><!--
		 --><img class="highlightTwo six" src="/img/collections/collection/canvas_collection_highlight_photo-2.jpg" alt="" /><!--
		 --><img class="highlightThree six" src="/img/collections/collection/canvas_collection_highlight_photo-3.jpg" alt="" /><!--
		 --><img class="highlightFour six" src="/img/collections/collection/canvas_collection_highlight_photo-4.jpg" alt="" />
			<div class="highlightsBadgeWrapper six">
				<div class="highLightsBadge">
					<span>Collection Highlights</span>
				</div>
			</div>
		</div>
		<div class="detailsPanel">
			<div class="detailsPanelText four">
				<h4>Connected to Heritage</h4>
				<h5>Influenced by Native America.</h5>
				<p>As an artist and jewelry designer, Kenneth Johnson’s work is strongly influenced by his heritage. He is known for using Native American symbols, and a variety of metals – copper, gold, silver, and platinum – to present a contemporary view of his culture. The influence of the Southwest and traditional Indian themes can be seen in this elegant collaboration.</p>
			</div><!-- 
		 --><div class="detailsPanelImage1 eight"></div>
		</div>
		<div class="detailsPanel">
			<div class="detailsPanelImage2 eight"></div><!-- 
		 --><div class="detailsPanelText four">
				<h4>Exceptional Quality</h4>
				<h5>Incredible art deserves the best.</h5>
				<p>The Kenneth Johnson Collection was created without compromise. From the use of premium deer leather, to the unique custom metalwork, this Signature Collection uses the finest available materials and multi-generational craftsmanship. The care given to the design and assembly of this Collection, and its limited availability, will immediately define it as art.</p>
			</div>
		</div>
		<div class="detailsPanel">
			<div class="detailsPanelText four">
				<h4>Limited Availability</h4>
				<h5>Rare in quality and numbers.</h5>
				<p>Our collaboration with Kenneth Johnson is very special. Only 50 items of each design will be made and offered for sale. Each will be numbered and signed by the artist. These unique products, assembled with components made by the artist, are sure to become more valuable with time.</p>
			</div><!-- 
		 --><div class="detailsPanelImage3 eight"></div>
		</div>
	</div>
</div>

<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/footer.php'; ?>

<!-- Common .js Includes -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/footer-links.php'; ?>

<!-- 'All Products' Button Script -->
<script>

	//	Clicking an Inactive Gender Button
	$(document).on('click', '.itemBtnInactive', function() {
		$('.backBtnWrapper').removeClass('opacityHide');
		$('.backBtnWrapper').removeClass('heightHide');
		$('.backBtnWrapper').addClass('opacityShow');
		$('.landingInfo').removeClass('filterOn');
		$('.landingInfo').addClass('filterOff');
	});

	//	Clicking an Active Gender Button, or the back button
	$(document).on('click', '.itemBtnActive, .backBtnWrapper', function() {			//	Go back to landing state when clicking on active gender's button
		$('.backBtnWrapper').removeClass('opacityShow');
		$('.backBtnWrapper').addClass('opacityHide');
		$('.backBtnWrapper').addClass('heightHide');
		$('.landingInfo').removeClass('filterOff');
		$('.landingInfo').addClass('filterOn');
	});

	//	Clicking a Specific Gender Button
	$(document).on('click', '.itemBtn-1', function() {								//	Toggle "active" state for the selected button and background
		$('.selItemBg-kJohnson').toggleClass('selBgActive');						//	Change background
		$('.selItemBg-kJohnson').toggleClass('selBgInactive');
		$('.itemBtn-1').toggleClass('itemBtnActive');								//	Tint selected gender button
		$('.itemBtn-1').toggleClass('itemBtnInactive');
	});

		$(document).on('click', '.itemBtn-1.itemBtnInactive', function() {
		$('.filterAll').removeClass('filterOff');									//	Show
		$('.filterAll').addClass('filterOn');
	});

	$(document).on('click', '.itemBtn-1.itemBtnActive', function() {
		$('.filterAll').removeClass('filterOn');									//	Hide
		$('.filterAll').addClass('filterOff');
	});

	$(document).on('click', '.backBtnWrapper', function() {
		$('.filterAll').removeClass('filterOn');
		$('.filterAll').addClass('filterOff');
		$('.selItemBg-kJohnson').removeClass('selBgActive');
		$('.selItemBg-kJohnson').addClass('selBgInactive');
		$('.itemBtn-1').removeClass('itemBtnActive');
		$('.itemBtn-1').addClass('itemBtnInactive');
	});
	
</script>

<!-- Load & initialize WOW animations -->
<script src="/js/dist/wow.min.js"></script>
<script>
	new WOW().init();
</script>

<!-- This script hides the transition background 1 second after all page content is fully loaded -->
<script>
	$(window).bind("load", function() {
		setTimeout(doSomething, 800);
		function doSomething() {
			$('.fullBG').addClass('hideBG');
		}
	});
</script>

<!-- Other JS plugins can be included here -->

</body>
</html>
<!doctype html>
<?php $page = "collections"; ?>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Santa Fe | Virgil James</title>
	<link rel="stylesheet" href="/css/animate.css" />

	<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/head-links.php'; ?>

	<link rel="stylesheet" href="/css/shop.css" />
	<link rel="stylesheet" href="/css/collection/collection.css" />
	<link rel="stylesheet" href="/css/collection/santa-fe.css" />
	
	<?php
		if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php") {
			print("
				<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/collection/animate-city.css\" />
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

	<!-- Mens/Womens/Acc Backgrounds -->
	<div class="selItemBg selItemBg-santafe1 selBgInactive"></div>
	<div class="selItemBg selItemBg-santafe2 selBgInactive"></div>
	<div class="selItemBg selItemBg-santafe3 selBgInactive"></div>

	<div class="contentWrapper">
		<div class="productSelectorTitle<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">
			<span class="productLineTitle">City</span><div class="lineTitleSpace">&nbsp;</div><span class="lineLine">Line</span><br />
			<h1 class="productCollectionTitle">Santa Fe Collection</h1>
		</div>
		<div class="productSelectorBtnsWrapper">
			<!-- Selection Buttons -->
			<a class="itemBtn itemBtn-1 itemBtnInactive<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>" href="#" onClick="return false;">Mens</a>
			<a class="itemBtn itemBtn-2 itemBtnInactive<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>" href="#" onClick="return false;">Womens</a>
			<a class="itemBtn itemBtn-3 itemBtnInactive<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>" href="#" onClick="return false;">Accessories</a>
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

		<!-- Mens/Womens/Acc Gender Selector Titles -->
		<!-- selItemTitle: shop.css, position, font, opacity transition -->
		<!-- opacityHide: opacity: 0, opacity transition -->
		<span class="selItemTitle selItemTitle-1 opacityHide">Mens</span>
		<span class="selItemTitle selItemTitle-2 opacityHide">Womens</span>
		<span class="selItemTitle selItemTitle-3 opacityHide">Accessories</span>
	</div>
</div>

<!-- Men's Product Panel -->
<div class="bgWrapper productBgWrapper filterMens filterOff">
	<h2 class="genderTitle">All Products</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_backpack.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Backpack</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_satchel.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Product 2</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_weekender.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 3</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a>
	</div>
</div>

<!-- Women's Product Panel -->
<div class="bgWrapper productBgWrapper filterWomens filterOff">
	<h2 class="genderTitle">All Products</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_overnight.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 1</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_tote.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Womens Tote</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/felt_blue_overnight.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 3</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a>
	</div>
</div>

<!-- Accessories Product Panel -->
<div class="bgWrapper productBgWrapper filterAcc filterOff">
	<h2 class="genderTitle">All Products</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_bracelet.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Acc Product 1</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 2</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a><a class="shopItem four" href="/product.php">
			<img src="/img/product/canvas_black_earrings.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Acc Product 3</span>
			<span class="shopItemSubtitle">City Collection</span>
		</a>
	</div>
</div>

<!-- Collection Details -->
<div class="bgWrapper collectionIntroBgWrapper<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">
	<div class="contentWrapper landingInfo filterOn">
		<h2 class="<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print("wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">Culture, Food and Art in the American Southwest</h2>
		<p class="eight collectionIntroP<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">More than just a city of superlatives, and one Top 10 accolade after another, Santa Fe is a city at peace. It’s an art center, a cultural crossroads, a gateway, a lifestyle, and, ultimately, an unforgettable trip. Even the most experienced travelers leave Santa Fe lighter, happier, and ready for more.</p>
		<div class="highlightsWrapper<?php if($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php"){print(" wow fadeIn\" data-wow-delay=\".1s\" data-wow-duration=\"0.65s");}?>">
			<img class="highlightOne six" src="/img/collections/collection/santafe_collection_highlight_photo-1.jpg" alt="" /><!-- 
		 --><img class="highlightTwo six" src="/img/collections/collection/santafe_collection_highlight_photo-2.jpg" alt="" /><!-- 
		 --><img class="highlightThree six" src="/img/collections/collection/santafe_collection_highlight_photo-3.jpg" alt="" /><!-- 
		 --><img class="highlightFour six" src="/img/collections/collection/santafe_collection_highlight_photo-4.jpg" alt="" />
			<div class="highlightsBadgeWrapper six">
				<div class="highLightsBadge">
					<span>Collection Highlights</span>
				</div>
			</div>
		</div>
		<div class="detailsPanel">
			<div class="detailsPanelText four">
				<h4>LOCAL INFLUENCE</h4>
				<h5>Celebrating unique Santa Fe.</h5>
				<p>Santa Fe is the second oldest city in the US. It is the original cultural melting pot in America. Out of this, in the middle of breath-taking wilderness and beauty, comes an incredible heritage of artistic creativity. It’s impossible not to be influenced, as seen by our choice of leather and the design of our custom bronze hardware. The special beaded zipper pull - utilizing 100% sterling silver beads and local turquoise - celebrates native heritage of Santa Fe.</p>
			</div><!-- 
		 --><div class="detailsPanelImage1 eight"></div>
		</div>
		<div class="detailsPanel">
			<div class="detailsPanelImage2 eight"></div><!-- 
		 --><div class="detailsPanelText four">
				<h4>Exceptional Quality</h4>
				<h5>We build without compromise.</h5>
				<p>Our Santa Fe Collection is without compromise. From premium tan calf-leather, to surprisingly thoughtful details and custom-made bronze hardware, Santa Fe products use the finest available materials, hand-built by 3rd generation craftsman. The care given to assembly will remind you of art, rather than something designed for everyday use. Decades from now, we fully expect to hear how pleased and amazed you are with the incredible quality of your Santa Fe purchase.</p>
			</div>
		</div>
		<div class="detailsPanel">
			<div class="detailsPanelText four">
				<h4>Function + Style</h4>
				<h5>It's all in the details.</h5>
				<p>It’s all in the details. Santa Fe bags and accessories reflect a timeless, classic style, with just enough edge to be unique, but always functional. Every cut, every corner, every angle was considered. The height of a handle, the size of a pocket, the ease of a zipper, the water repellency of the lining, even the thread used for hand-stitched reinforcements justifies our obsession with utility and style. Alone, neither is sufficient but, together, they create lasting beauty.</p>
			</div><!-- 
		 --><div class="detailsPanelImage3 eight"></div>
		</div>
	</div>
</div>

<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/footer.php'; ?>

<!-- Common .js Includes -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/footer-links.php'; ?>

<!-- Gender Selection Scripts -->
<script>

	//	Clicking an Inactive Gender Button
	$(document).on('click', '.itemBtnInactive', function() {			//	Hide landing title when clicking on a gender
		// $('.heroCatchLine1').removeClass('opacityShow');
		// $('.heroCatchLine1').addClass('opacityHide');
		// $('.productSelectorTitle').addClass('pstBump');

		$('.backBtnWrapper').removeClass('opacityHide');
		$('.backBtnWrapper').removeClass('heightHide');
		$('.backBtnWrapper').addClass('opacityShow');
		$('.landingInfo').removeClass('filterOn');
		$('.landingInfo').addClass('filterOff');
		console.log('landingTitle hidden');
	});

	//	Clicking an Active Gender Button, or the back button
	$(document).on('click', '.itemBtnActive, .backBtnWrapper', function() {				//	Go back to landing state when clicking on active gender's button
		// $('.selItemTitle').removeClass('opacityShow');
		// $('.selItemTitle').addClass('opacityHide');
		// $('.heroCatchLine1').removeClass('opacityHide');
		// $('.heroCatchLine1').addClass('opacityShow');
		// $('.productSelectorTitle').removeClass('pstBump');

		$('.backBtnWrapper').removeClass('opacityShow');
		$('.backBtnWrapper').addClass('opacityHide');
		$('.backBtnWrapper').addClass('heightHide');
		$('.landingInfo').removeClass('filterOff');
		$('.landingInfo').addClass('filterOn');
		console.log('landingTitle shown');
	});

	//	Clicking a Specific Gender Button
	$(document).on('click', '.itemBtn-1', function() {
		//make the other buttons inactive and hide their titles:
		$('.selItemBg-santafe2').removeClass('selBgActive');
		$('.selItemBg-santafe3').removeClass('selBgActive');
		$('.selItemBg-santafe2').addClass('selBgInactive');
		$('.selItemBg-santafe3').addClass('selBgInactive');
		$('.selItemTitle-2').addClass('opacityHide');
		$('.selItemTitle-3').addClass('opacityHide');
		$('.itemBtn-2').removeClass('itemBtnActive');
		$('.itemBtn-3').removeClass('itemBtnActive');
		$('.itemBtn-2').addClass('itemBtnInactive');
		$('.itemBtn-3').addClass('itemBtnInactive');

		//toggle "active" state for the selected button and background
		$('.selItemBg-santafe1').toggleClass('selBgActive');
		$('.selItemBg-santafe1').toggleClass('selBgInactive');
		$('.itemBtn-1').toggleClass('itemBtnActive');
		$('.itemBtn-1').toggleClass('itemBtnInactive');
	});

	$(document).on('click', '.itemBtn-1.itemBtnInactive', function() {
		//show mens stuff
		// $('.selItemTitle-1').removeClass('opacityHide');
		// $('.selItemTitle-1').addClass('opacityShow');
		$('.filterMens').removeClass('filterOff');						//	Show products
		$('.filterMens').addClass('filterOn');
		//hide all else
		$('.selItemTitle-2').removeClass('opacityShow');
		$('.selItemTitle-2').addClass('opacityHide');
		$('.selItemTitle-3').removeClass('opacityShow');
		$('.selItemTitle-3').addClass('opacityHide');
		$('.filterWomens').removeClass('filterOn');						//	Hide other products
		$('.filterWomens').addClass('filterOff');
		$('.filterAcc').removeClass('filterOn');
		$('.filterAcc').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-1.itemBtnActive', function() {
		//hide mens stuff
		$('.filterMens').removeClass('filterOn');
		$('.filterMens').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-2', function() {
		$('.selItemBg-santafe1').removeClass('selBgActive');
		$('.selItemBg-santafe3').removeClass('selBgActive');
		$('.selItemBg-santafe1').addClass('selBgInactive');
		$('.selItemBg-santafe3').addClass('selBgInactive');
		$('.selItemTitle-1').addClass('hideTitle');
		$('.selItemTitle-3').addClass('hideTitle');
		$('.itemBtn-1').removeClass('itemBtnActive');
		$('.itemBtn-3').removeClass('itemBtnActive');
		$('.itemBtn-2').toggleClass('itemBtnActive');
		$('.itemBtn-2').toggleClass('itemBtnInactive');

		$('.selItemBg-santafe2').toggleClass('selBgInactive');
		$('.selItemBg-santafe2').toggleClass('selBgActive');
		$('.itemBtn-1').addClass('itemBtnInactive');
		$('.itemBtn-3').addClass('itemBtnInactive');
	});


	$(document).on('click', '.itemBtn-2.itemBtnInactive', function() {
		//show womens stuff
		// $('.selItemTitle-2').removeClass('opacityHide');
		// $('.selItemTitle-2').addClass('opacityShow');
		$('.filterWomens').removeClass('filterOff');
		$('.filterWomens').addClass('filterOn');
		//hide all else
		$('.selItemTitle-1').removeClass('opacityShow');
		$('.selItemTitle-1').addClass('opacityHide');
		$('.selItemTitle-3').removeClass('opacityShow');
		$('.selItemTitle-3').addClass('opacityHide');
		$('.filterMens').removeClass('filterOn');
		$('.filterMens').addClass('filterOff');
		$('.filterAcc').removeClass('filterOn');
		$('.filterAcc').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-2.itemBtnActive', function() {
		//hide womens stuff
		$('.filterWomens').removeClass('filterOn');
		$('.filterWomens').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-3', function() {
		$('.selItemBg-santafe1').removeClass('selBgActive');
		$('.selItemBg-santafe2').removeClass('selBgActive');
		$('.selItemBg-santafe1').addClass('selBgInactive');
		$('.selItemBg-santafe2').addClass('selBgInactive');
		$('.selItemTitle-1').addClass('opacityHide');
		$('.selItemTitle-2').addClass('opacityHide');
		$('.itemBtn-1').removeClass('itemBtnActive');
		$('.itemBtn-2').removeClass('itemBtnActive');
		$('.itemBtn-1').addClass('itemBtnInactive');
		$('.itemBtn-2').addClass('itemBtnInactive');

		$('.selItemBg-santafe3').toggleClass('selBgInactive');
		$('.selItemBg-santafe3').toggleClass('selBgActive');
		$('.itemBtn-3').toggleClass('itemBtnActive');
		$('.itemBtn-3').toggleClass('itemBtnInactive');
	});

	$(document).on('click', '.itemBtn-3.itemBtnInactive', function() {
		//show acc stuff
		// $('.selItemTitle-3').removeClass('opacityHide');
		// $('.selItemTitle-3').addClass('opacityShow');
		$('.filterAcc').removeClass('filterOff');
		$('.filterAcc').addClass('filterOn');
		//hide all else
		$('.selItemTitle-1').removeClass('opacityShow');
		$('.selItemTitle-1').addClass('opacityHide');
		$('.selItemTitle-2').removeClass('opacityShow');
		$('.selItemTitle-2').addClass('opacityHide');
		$('.filterMens').removeClass('filterOn');
		$('.filterMens').addClass('filterOff');
		$('.filterWomens').removeClass('filterOn');
		$('.filterWomens').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-3.itemBtnActive', function() {
		//hide acc stuff
		$('.filterAcc').removeClass('filterOn');
		$('.filterAcc').addClass('filterOff');
	});

	$(document).on('click', '.backBtnWrapper', function() {
		$('.filterMens, .filterWomens, .filterAcc').removeClass('filterOn');
		$('.filterMens, .filterWomens, .filterAcc').addClass('filterOff');
		$('.selItemBg-santafe1, .selItemBg-santafe2, .selItemBg-santafe3').removeClass('selBgActive');
		$('.selItemBg-santafe1, .selItemBg-santafe2, .selItemBg-santafe3').addClass('selBgInactive');
		$('.itemBtn-1, .itemBtn-2, .itemBtn-3').removeClass('itemBtnActive');
		$('.itemBtn-1, .itemBtn-2, .itemBtn-3').addClass('itemBtnInactive');
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
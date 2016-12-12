<!doctype html>
<?php $page = "shop"; ?>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Shop | Virgil James</title>

	<?php include '/incs/head-links.php'; ?>

	<link rel="stylesheet" href="/css/shop.css" />
	<link rel="stylesheet" href="/css/shop-style.css" />
	<script src="/js/vendor/modernizr.js"></script>
</head>
<body>

<!-- Navgivation -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/nav.php'; ?>

<div class="scrollWaypoint"></div>

<!-- Top Hero / Product Selector Panel (filter takeover also goes in / over here) -->
<div class="bgWrapper productSelectorBgWrapper">

	<!-- Mens/Womens/Acc Backgrounds -->
	<div class="selItemBg selItemBg-1 selBgInactive"></div>
	<div class="selItemBg selItemBg-2 selBgInactive"></div>
	<div class="selItemBg selItemBg-3 selBgInactive"></div>
	
	<!-- Filter Background -->
	<div class="selItemBg filterBg selBgInactive"></div>

	<div class="contentWrapper">
		<div class="productSelectorTitle">
			<span class="heroCatchLine1">Luxury Awaits</span>
			<span class="heroCatchLine2">Where will it take you?</span>
		</div>
		<div class="productSelectorBtnsWrapper">
			<!-- Selection Buttons -->
			<a class="itemBtn itemBtn-1 itemBtnInactive" href="#" onClick="return false;">Mens</a>
			<a class="itemBtn itemBtn-2 itemBtnInactive" href="#" onClick="return false;">Womens</a>
			<a class="itemBtn itemBtn-3 itemBtnInactive" href="#" onClick="return false;">Accessories</a>
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

<!-- Pile of Featured Products -->
<div class="bgWrapper productBgWrapper filterFeatured filterOn">
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
		</a>
	</div>
</div>

<!-- Pile of Mens Products -->
<div class="bgWrapper productBgWrapper filterMens filterOff">
	<h2 class="genderTitle">All Mens</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_backpack.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Backpack</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_satchel.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Product 2</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_weekender.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 3</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/felt_blue_backpack.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Backpack</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/felt_blue_satchel.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 5</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/felt_blue_weekender.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 6</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/kjohnson_darkbrown_backpack.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Mens Backpack</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/kjohnson_darkbrown_satchel.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 8</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/kjohnson_darkbrown_weekender.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 9</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a>
	</div>
</div>

<!-- Pile of Womens Products -->
<div class="bgWrapper productBgWrapper filterWomens filterOff">
	<h2 class="genderTitle">All Womens</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_overnight.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 1</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_tote.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Womens Tote</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/felt_blue_overnight.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 3</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/felt_blue_tote.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Womens Tote</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/kjohnson_darkbrown_overnight.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 5</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/kjohnson_darkbrown_tote.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Womens Tote</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/marrakech_red_overnight.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 7</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/marrakech_red_tote.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Womens Tote</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/reykjavik_purple_tote.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Womens Tote</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a>
	</div>
</div>

<!-- Pile of Accessories -->
<div class="bgWrapper productBgWrapper filterAcc filterOff">
	<h2 class="genderTitle">All Accessories</h2>
	<div class="contentWrapper shopItemsWrapper">
		<a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_bracelet.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Acc Product 1</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 2</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_earrings.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Acc Product 3</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/canvas_black_wallet.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 4</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/felt_blue_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 5</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/kjohnson_darkbrown_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 6</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/marrakech_red_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Acc Product 7</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/reykjavik_purple_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Product 8</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a><a class="shopItem lg-four" href="/product.php">
			<img src="img/product/santafe_lightbrown_clutch.png" alt="" />
			<span class="shopItemPrice">$2,500.00</span>
			<span class="shopItemTitle">Acc Product 9</span>
			<span class="shopItemSubtitle">Classic Collection</span>
		</a>
	</div>
</div>

<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/footer.php'; ?>

<!-- Common .js Includes -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/incs/footer-links.php'; ?>

<!-- Gender Selection Scripts -->
<script>

	//	Clicking an Inactive Gender Button
	$(document).on('click', '.itemBtnInactive', function() {
		$('.productSelectorTitle').removeClass('opacityShow');
		$('.productSelectorTitle').addClass('opacityHide');
		$('.backBtnWrapper').removeClass('opacityHide');
		$('.backBtnWrapper').addClass('opacityShow');
		$('.filterFeatured').removeClass('filterOn');
		$('.filterFeatured').addClass('filterOff');
	});

	//	Clicking an Active Gender Button, or the back button
	$(document).on('click', '.itemBtnActive, .backBtnWrapper', function() {
		$('.productSelectorTitle').removeClass('opacityHide');
		$('.productSelectorTitle').addClass('opacityShow');
		$('.heroCatchLine2').removeClass('opacityHide');
		$('.heroCatchLine2').addClass('opacityShow');
		$('.filterFeatured').removeClass('filterOff');
		$('.filterFeatured').addClass('filterOn');
		$('.filterMens, .filterWomens, .filterAcc').removeClass('filterOn');
		$('.filterMens, .filterWomens, .filterAcc').addClass('filterOff');
		$('.backBtnWrapper').addClass('opacityHide');
		$('.backBtnWrapper').removeClass('opacityShow');
	});

	//	Clicking the Back button only
	$(document).on('click', '.backBtnWrapper', function() {
		$('.selItemBg-1, .selItemBg-2, .selItemBg-3').removeClass('selBgActive');
		$('.selItemBg-1, .selItemBg-2, .selItemBg-3').addClass('selBgInactive');
		$('.itemBtn-1, .itemBtn-2, .itemBtn-3').removeClass('itemBtnActive');
		$('.itemBtn-1, .itemBtn-2, .itemBtn-3').addClass('itemBtnInactive');
	});

	//	Clicking a Specific Gender Button
	$(document).on('click', '.itemBtn-1', function() {
		//make the other buttons inactive and hide their titles:
		$('.selItemBg-2').removeClass('selBgActive');
		$('.selItemBg-3').removeClass('selBgActive');
		$('.selItemBg-2').addClass('selBgInactive');
		$('.selItemBg-3').addClass('selBgInactive');
		$('.itemBtn-2').removeClass('itemBtnActive');
		$('.itemBtn-3').removeClass('itemBtnActive');
		$('.itemBtn-2').addClass('itemBtnInactive');
		$('.itemBtn-3').addClass('itemBtnInactive');

		//toggle "active" state for the selected button and background
		$('.selItemBg-1').toggleClass('selBgActive');
		$('.selItemBg-1').toggleClass('selBgInactive');
		$('.itemBtn-1').toggleClass('itemBtnActive');
		$('.itemBtn-1').toggleClass('itemBtnInactive');
	});

	$(document).on('click', '.itemBtn-1.itemBtnInactive', function() {
		//show mens stuff
		$('.filterMens').removeClass('filterOff');
		$('.filterMens').addClass('filterOn');
		//hide all else
		$('.filterAcc').removeClass('filterOn');
		$('.filterAcc').addClass('filterOff');
		$('.filterWomens').removeClass('filterOn');
		$('.filterWomens').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-1.itemBtnActive', function() {
		//hide mens stuff
		$('.filterMens').removeClass('filterOn');
		$('.filterMens').addClass('filterOff');
	});

	$(document).on('click', '.itemBtn-2', function() {
		$('.selItemBg-1').removeClass('selBgActive');
		$('.selItemBg-3').removeClass('selBgActive');
		$('.selItemBg-1').addClass('selBgInactive');
		$('.selItemBg-3').addClass('selBgInactive');
		$('.itemBtn-1').removeClass('itemBtnActive');
		$('.itemBtn-3').removeClass('itemBtnActive');
		$('.itemBtn-1').addClass('itemBtnInactive');
		$('.itemBtn-3').addClass('itemBtnInactive');

		$('.selItemBg-2').toggleClass('selBgInactive');
		$('.selItemBg-2').toggleClass('selBgActive');
		$('.itemBtn-2').toggleClass('itemBtnActive');
		$('.itemBtn-2').toggleClass('itemBtnInactive');
	});

	$(document).on('click', '.itemBtn-2.itemBtnInactive', function() {
		//show womens stuff
		$('.filterWomens').removeClass('filterOff');
		$('.filterWomens').addClass('filterOn');
		//hide all else
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

	$(document).on('click', '.itemBtn-3.itemBtnInactive', function() {
		//show acc stuff
		$('.filterAcc').removeClass('filterOff');
		$('.filterAcc').addClass('filterOn');
		//hide all else
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

	$(document).on('click', '.itemBtn-3', function() {
		$('.selItemBg-1').removeClass('selBgActive');
		$('.selItemBg-2').removeClass('selBgActive');
		$('.selItemBg-1').addClass('selBgInactive');
		$('.selItemBg-2').addClass('selBgInactive');
		$('.itemBtn-1').removeClass('itemBtnActive');
		$('.itemBtn-2').removeClass('itemBtnActive');
		$('.itemBtn-1').addClass('itemBtnInactive');
		$('.itemBtn-2').addClass('itemBtnInactive');

		$('.selItemBg-3').toggleClass('selBgInactive');
		$('.selItemBg-3').toggleClass('selBgActive');
		$('.itemBtn-3').toggleClass('itemBtnActive');
		$('.itemBtn-3').toggleClass('itemBtnInactive');
	});
	
</script>
<!-- Other JS plugins can be included here -->

</body>
</html>
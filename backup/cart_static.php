<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Cart | Virgil James</title>

	<?php include '/incs/head-links.php'; ?>
	<link rel="stylesheet" href="/css/cart.css" />

	<script src="/js/vendor/modernizr.js"></script>

</head>
<body class="cartBody">

<!-- Navgivation -->
<?php include '/incs/nav.php'; ?>

<div class="scrollWaypoint"></div>

<!-- Top Hero -->
<div class="bgWrapper cartHeroBgWrapper">
	<div class="widthWrapper">
		<div class="tableWrapper tableHeight">
			<div class="cellWrapper">
				<span class="cartHeroLine1">Shopping Cart</span>
			</div>
		</div>
	</div>
</div>

<div class="bgWrapper cartBgWrapper">
	<div class="widthWrapper">
		<div class="tableWrapper tableHeight">
			<div class="cellWrapper">
				<h2>Overview</h2>
				<div class="cartTableWrapper">
					<div class="titleRow">
						<div class="itemTitle sm-five lg-two">Item</div><!--
					 --><div class="qtyTitle sm-three lg-two">Qty</div><!--
					 --><div class="productTitle sm-zero lg-six">Product Description</div><!--
					 --><div class="priceTitle sm-four lg-two">Price</div>
					</div>
					<div class="updateTotalOverlayWrapper">
						<div class="updateTotalOverlay"></div>

						<div class="cartItemsRow">
								<div class="cartItemItem sm-five lg-two">
	                                <img class="cartProductImage" src="/uploadedImages/Products/Canvas_toiletry_kit.jpeg" alt="" />
	                                <span class="productNameMobile">Canvas Toiletry Kit</span>
	                                <span class="produtNumber">SKU: 0000000</span>
	                            </div><!--
								 --><div class="cartItemQty sm-three lg-two">
	                                <input class="qtyInput" type="number" name="itemQty_10006" id="itemQty_10006"  value="1"/>
	                                <a href="#" onclick="return false;" class="removeLinkMobile">Remove</a>
	                            </div><!--
								 --><div class="cartItemProduct  sm-zero lg-six">
	                                <span class="productName">Canvas Toiletry Kit</span>
	                                <span class="shippingInfo">Shipping Included</span>
	                                <a href="javascript:removeProduct(10006)"  class="removeLink">Remove</a>
	                            </div><!--
							 --><div class="cartItemPrice sm-four lg-two">$529.00</div>
						</div>
						<div class="cartItemsRow">
								<div class="cartItemItem sm-five lg-two">
	                                <img class="cartProductImage" src="/uploadedImages/Products/Canvas_toiletry_kit.jpeg" alt="" />
	                                <span class="productNameMobile">Canvas Toiletry Kit</span>
	                                <span class="produtNumber">SKU: 0000000</span>
	                            </div><!--
								 --><div class="cartItemQty sm-three lg-two">
	                                <input class="qtyInput" type="number" name="itemQty_10006" id="itemQty_10006"  value="1"/>
	                                <a href="#" onclick="return false;" class="removeLinkMobile">Remove</a>
	                            </div><!--
								 --><div class="cartItemProduct  sm-zero lg-six">
	                                <span class="productName">Canvas Toiletry Kit</span>
	                                <span class="shippingInfo">Shipping Included</span>
	                                <a href="javascript:removeProduct(10006)"  class="removeLink">Remove</a>
	                            </div><!--
							 --><div class="cartItemPrice sm-four lg-two">$529.00</div>
						</div>

					<div class="totalRow">
						<div class="subtotalSpacer sm-eight lg-ten">Subtotal&nbsp;&nbsp;&nbsp;</div><!--
					 --><div class="subtotalPrice sm-four lg-two">$1058.00</div>
					</div>

					</div>

				</div>

				<div class="bottomRowButtonsWrapper">

					<div class="couponFieldWrapper sm-twelve lg-four">
						<form class="couponForm" action="whatever.php">
							<input class="couponField" type="text" name="coupon_code" placeholder="Enter Coupon Code" />
						</form>
					</div><!-- 
				 --><div class="couponButtonWrapper sm-twelve lg-six">
						<a class="couponApplyButton" href="#" onclick="return false;">Apply Coupon</a><!-- 
					 --><a class="updateCartButton" href="javascript:updateCart();">Update Cart</a>
					</div><!-- 
				 --><div class="checkoutButtonWrapper sm-twelve lg-two">
						<a class="checkoutButton" href="/shipping.php">Checkout</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Footer -->
<?php include '/incs/footer.php'; ?>

<!-- Common .js Includes -->
<?php include '/incs/footer-links.php'; ?>
<!-- <script src="/js/jquery.reel.js"></script> -->

</body>
</html>
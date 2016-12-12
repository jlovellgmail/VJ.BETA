<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Order Received | Virgil James</title>

	<?php include '/incs/head-links.php'; ?>
	<link rel="stylesheet" href="/css/receipt.css" />

</head>
<body class="cartBody">

<!-- Navgivation -->
<?php include '/incs/nav.php'; ?>

<!-- Top Hero -->
<div class="bgWrapper cartHeroBgWrapper">
	<div class="widthWrapper">
		<div class="tableWrapper tableHeight">
			<div class="cellWrapper">
				<span class="cartHeroLine1">My Cart</span>
			</div>
		</div>
	</div>
</div>

<div class="bgWrapper cartBgWrapper">
	<div class="widthWrapper">
		<div class="tableWrapper tableHeight">
			<div class="cellWrapper">
				<h2>Order Received</h2>
				<div class="cartTableWrapper">
					<div class="titleRow">
						<div class="itemTitle sm-five lg-two">Item</div><!--
					 --><div class="qtyTitle sm-three lg-two">Qty</div><!--
					 --><div class="productTitle sm-zero lg-six">Product Description</div><!--
					 --><div class="priceTitle sm-four lg-two">Price</div>
					</div>
					<div class="belowTopRowWrapper lg-twelve">
						<div class="cartItemsRow">
							<div class="cartItemItem sm-five lg-two">
								<img class="cartProductImage" src="/img/product/cart-product-img-min.png" alt="" />
						 		<span class="productNameMobile">Reykjavik Collection Mens Backpack</span>
								<span class="produtNumber">SKU: 0000000</span>
							</div><!--
						 --><div class="cartItemQty sm-three lg-two">1</div><!--
						 --><div class="cartItemProduct  sm-zero lg-six">
						 		<span class="productName">Reykjavik Collection Mens Backpack</span>
						 	</div><!--
						 --><div class="cartItemPrice sm-four lg-two">$2,500.00</div>
						</div>
						<div class="totalRow">
							<div class="orderInfoWrapper lg-seven leftCol">
								<div class="orderInfo lg-twelve">
									<h3>Order #0000001</h3>
									<div class="shippingTo lg-six">
										<span class="titleShipBill">Shipping To:</span>
										<span>James Scherr</span>
										<span>212 N. Cedros Ave</span>
										<span>Solana Beach, CA 92075</span>
									</div><!-- 
								 --><div class="billingTo lg-six">
										<span class="titleShipBill">Billing To:</span>
										<span>James Scherr</span>
										<span>212 N. Cedros Ave</span>
										<span>Solana Beach, CA 92075</span>
										<span>Visa Ending in -5515</span>
									</div>
								</div>
							</div><!-- 
						 --><div class="totalInfoWrapper lg-five rightCol">
								<div class="totalInfo lg-twelve">
									<div class="totalInfoRow1">
										<div class="sm-eight">Subtotal</div><!-- 
									 --><div class="sm-four rightAlign">$2,500.00</div>
									</div>
									<div class="totalInfoRow2">
										<div class="lg-twelve">Shipping Included</div><!-- 
									 --><div class="couponText sm-eight">Coupon Code #000000</div><!-- 
									 --><div class="couponText sm-four rightAlign">-$100.00</div>
									</div>
									<div class="totalInfoRow3">
										<div class="sm-eight">Total</div><!-- 
									 --><div class="sm-four rightAlign">$2,400.00</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="bottomRowButtonsWrapper">
					<div class="checkoutButtonWrapper lg-twelve">
					 	<a class="checkoutButton" href="#" onClick="return false;">Print</a>
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

</body>
</html>
<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Confirm Order | Virgil James</title>

	<?php include '/incs/head-links.php'; ?>
	<link rel="stylesheet" href="/css/review.css" />

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
				<h2>Confirm Order</h2>
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
						 		<span class="shippingInfo">Shipping Included</span>
						 	</div><!--
						 --><div class="cartItemPrice sm-four lg-two">$2,500.00</div>
						</div>
						<div class="totalRow">
							<div class="orderInfoWrapper lg-seven leftCol">
								<h3>Purchase Agreements</h3>
								<div class="orderInfo lg-twelve">
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</p>
								</div>
								<input type="checkbox" name="agreement" value="userAgree" /><span>&nbsp;I have read and accept the above terms and conditions.</span>
							</div><!-- 
						 --><div class="totalInfoWrapper lg-five rightCol">
								<div class="totalInfo lg-twelve">
									<h3>Payment Details</h3>
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
					 	<a class="checkoutButton" href="receipt.php">Place Order</a>
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
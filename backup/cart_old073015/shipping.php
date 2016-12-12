<!doctype html>
<?php $page = "home"; ?>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shipping | Virgil James</title>

    <?php include '../incs/head-links.php'; ?>
    <link rel="stylesheet" href="/css/common_dev.css" />
    <link rel="stylesheet" href="/css/cart.css" />
    <link rel="stylesheet" href="/css/forms.css" />
    <script src="/js/vendor/modernizr.js"></script>
</head>
<body class="cartBody">

    <!-- Navgivation -->
    <?php include '../incs/nav.php'; ?>

    <div class="scrollWaypoint"></div>

    <!-- Top Hero -->
    <div class="bgWrapper cartHeroBgWrapper">
        <div class="widthWrapper">
            <div class="tableWrapper tableHeight">
                <div class="cellWrapper">
                    <span class="cartHeroLine1">Checkout</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bgWrapper checkoutBgWrapper">
        <div class="widthWrapper">
            <div class="tableWrapper tableHeight">
	            <div class="cellWrapper">
                    <div class="divRestack">
                        <div class="formValidateMessage error" style="display:none;">Please check the form below for errors.</div>
                        <div class="checkoutFormFieldsWrapper md-six lg-five">
                            <h3>Select Payment Method:</h3>
                            <div class="radialWrapper sm-six">
                                <input id="ccPaymentSelect" type="radio" name="group1" value="cc" />&nbsp;
                                <img class="ccImg" src="/img/cart/amex-min.png" alt="American Express" />
                                <img class="ccImg" src="/img/cart/mastercard-min.png" alt="MaterCard" />
                                <img class="ccImg" src="/img/cart/visa-min.png" alt="Visa" />
                            </div><!-- 
                         --><div class="radialWrapper sm-six">
                                <input id="paypalPaymentSelect" type="radio" name="group1" value="paypal" />&nbsp;
                                <img class="ccImg" src="/img/cart/paypal-min.png" alt="Paypal" />
                            </div>
                            <div class="paypalMessage" style="display:none;">
                            	<span>You will be redirected to PayPal on the next page to enter your shipping and billing information.</span>
                            </div>
                            
                            <div class="guestCheckoutInputs" style="display:none;">
                                <h2>Shipping Information</h2>
			                    <form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
                                <!--SAVED ADDRESSES AREA-->
                                    <div style="display:none;">
                                        <div class="generalFormInput textRight"><a href="javascript:void(0)" class="textBtn modalCall modalCall2">+ Add Shipping Address</a></div>
                                        <div class="row clearfix">
                                            <div class="lg-twelve">
                                                <div class="formWell formWellSelectable active">
                                                    <input type="radio" id="formSelectableRadio_01" name="selectableRadio" checked="checked">
                                                    <label for="formSelectableRadio_01">
                                                    <h3>Primary Shipping</h3>
                                                    <ul>
                                                        <li>User Name</li>
                                                        <li>214 N. Cedros Ave</li>
                                                        <li>214 Apartment B</li>
                                                        <li>Solana Beach, CA 92075</li>
                                                        <li>United States</li>
                                                    </ul>
                                                    <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                                                    </label>
                                                </div>
                                            </div><div class="lg-twelve">
                                                <div class="formWell formWellSelectable">
                                                    <input type="radio" id="formSelectableRadio_02" name="selectableRadio" >
                                                    <label for="formSelectableRadio_02">
                                                    <h3>Shipping #2</h3>
                                                    <ul>
                                                        <li>User Name</li>
                                                        <li>214 N. Cedros Ave</li>
                                                        <li>Solana Beach, CA 92075</li>
                                                        <li>United States</li>
                                                    </ul>
                                                    <a href="#" class="modalCall formWellLink">edit</a>
                                                    </label>
                                                </div>
                                            </div><div class="lg-twelve">
                                                <div class="formWell formWellSelectable">
                                                    <input type="radio" id="formSelectableRadio_03" name="selectableRadio" >
                                                    <label for="formSelectableRadio_03">
                                                    <h3>Shipping #3</h3>
                                                    <ul>
                                                        <li>User Name</li>
                                                        <li>214 N. Cedros Ave</li>
                                                        <li>Solana Beach, CA 92075</li>
                                                        <li>United States</li>
                                                    </ul>
                                                    <a href="#" class="modalCall formWellLink">edit</a>
                                                    </label>
                                                </div>
                                            </div><div class="lg-twelve">
                                                <div class="formWell formWellSelectable">
                                                    <input type="radio" id="formSelectableRadio_04" name="selectableRadio" >
                                                    <label for="formSelectableRadio_04">
                                                    <h3>Shipping #4</h3>
                                                    <ul>
                                                        <li>User Name</li>
                                                        <li>214 N. Cedros Ave</li>
                                                        <li>Solana Beach, CA 92075</li>
                                                        <li>United States</li>
                                                    </ul>
                                                    <a href="#" class="modalCall formWellLink">edit</a>
                                                    </label>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                <!--SAVED ADDRESSES AREA-->
	
                                <!--ADDRESS FORM-->
                                    <label for="fNameShipField">First Name:</label>
	                                <input id="fNameShipField" type="text" name="FName" />
	                                <label for="lNameShipField">Last Name:</label>
	                                <input id="lNameShipField" type="text" name="LName" />
	                                <label for="eMailShipField">Email Address:</label>
	                                <input id="eMailShipField" type="email" name="eMail" />
                                    <label for="address1ShipField">Address Line 1:</label>
	                                <input id="address1ShipField" type="text" name="Addr1" />
	                                <label for="address2ShipField">Address Line 2:</label>
	                                <input id="address2ShipField" type="text" name="Addr2" />
	                                <label for="cityShipField">City:</label>
	                                <input id="cityShipField" type="text" name="City" />
	                                <label for="stateShipField">State / Province:</label>
	                                <input id="stateShipField" type="text" name="State" />
	                                <label for="postalCodeShipField">Postal Code:</label>
	                                <input id="postalCodeShipField" type="text" name="Postal" />
	                                <label for="countryShipSelect">Country:</label>
	                                <select id="countryShipSelect" name="Country">
	                                    <option value="">Select Country...</option>
	                                    <option value="US">United States of America</option>
	                                </select>
	                                <label for="telShipField">Telephone:</label>
	                                <input id="telShipField" type="text" name="Phone" />
	                                <label for="shipNotesField">Shipping Notes:</label>
	                                <textarea id="shipNotesField" name="Notes" cols="20"></textarea>
                                </form>
                                <h2>Payment</h2>
                                <h3>Billing Address</h3>
			                    <form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
	                                <label for="fNameBillField">First Name:</label>
	                                <input id="fNameBillField" type="text" name="FName" />
	                                <label for="lNameBillField">Last Name:</label>
	                                <input id="lNameBillField" type="text" name="LName" />
	                                <label for="eMailBillField">Email Address:</label>
	                                <input id="eMailBillField" type="email" name="eMail" />
	                                <label for="address1BillField">Address Line 1:</label>
	                                <input id="address1BillField" type="text" name="Addr1" />
	                                <label for="address2BillField">Address Line 2:</label>
	                                <input id="address2BillField" type="text" name="Addr2" />
	                                <label for="cityBillField">City:</label>
	                                <input id="cityBillField" type="text" name="City" />
	                                <label for="stateBillField">State / Province:</label>
	                                <input id="stateBillField" type="text" name="State" />
	                                <label for="postalCodeBillField">Postal Code:</label>
	                                <input id="postalCodeBillField" type="text" name="Postal" />
	                                <label for="countryBillSelect">Country:</label>
	                                <select id="countryBillSelect" name="Country">
	                                    <option value="">Select Country...</option>
                                        <option value="US">United States of America</option>
	                                </select>
                                </form>
                                <!--GUEST USERS-->

                                <h3>Credit Card Information</h3>
			                    <form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
	                                <label for="cardName">Cardholder Name:</label>
	                                <input id="cardName" type="text" name="first_name" />
	                                <label for="ccType">Credit Card Type:</label>
	                                <select id="ccType">
	                                    <option>Select Card Type</option>
	                                    <option value="1">Visa</option>
	                                    <option value="2">Mastercard</option>
	                                    <option value="3">American Express</option>
	                                </select>
	                                <label for="ccNumber">Credit Card Number:</label>
	                                <input id="ccNumber" type="text" name="last_name" />
	                                <label for="ccXMonth">Expiration Date:</label>
	                                <select id="ccXMonth">
	                                    <option>Month</option>
	                                    <option value="1">January</option>
	                                    <option value="2">February</option>
	                                    <option value="3">March</option>
	                                    <option value="4">April</option>
	                                    <option value="5">May</option>
	                                    <option value="6">June</option>
	                                    <option value="7">July</option>
	                                    <option value="8">August</option>
	                                    <option value="9">September</option>
	                                    <option value="10">October</option>
	                                    <option value="11">Nobember</option>
	                                    <option value="12">December</option>
	                                </select><!-- 
	                             --><select class="ccXYear">
	                                    <option>Year</option>
	                                    <option value="1">2015</option>
	                                    <option value="2">2016</option>
	                                    <option value="3">2017</option>
	                                    <option value="4">2018</option>
	                                    <option value="5">2019</option>
	                                    <option value="6">2020</option>
	                                    <option value="7">2021</option>
	                                    <option value="8">2022</option>
	                                    <option value="9">2023</option>
	                                    <option value="10">2024</option>
	                                    <option value="11">2025</option>
	                                    <option value="12">2026</option>
	                                    <option value="13">2027</option>
	                                    <option value="14">2028</option>
	                                    <option value="15">2029</option>
	                                    <option value="16">2030</option>
	                                    <option value="17">2031</option>
	                                    <option value="18">2032</option>
	                                    <option value="19">2033</option>
	                                    <option value="20">2034</option>
	                                    <option value="21">2035</option>
	                                </select>
	                                <label for="ccCode">Card Security Code:</label>
	                                <input id="ccCode" type="text" name="ccCode" />
                                </form>
                            </div>
                        </div><!-- 

                     --><div class="checkoutRightColWrapper md-six lg-seven">
                            <div class="cartBrief">
                                <h3>2 items in your cart</h3>
                                <button class="textBtn toggleLink toggleHidden" id="showCart">
                                    Show Cart
                                </button>
                            </div>
                            <div class="overviewTableWrapper">

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
                                </div>

                                <div class="rowsPadding">
                                    <div class="subTotalRow">
                                        <div class="sm-eight"><span>Subtotal</span></div><!--
                                     --><div class="sm-four"><span>$5,000.00</span></div>
                                    </div>

                                    <div class="shippingRow">
                                        <div class="sm-eight"><span>Shipping Included</span></div><!--
                                     --><div class="sm-four"></div>
                                    </div>

                                    <div class="couponRow">
                                        <div class="sm-eight"><span>Coupon Code #0000000</span></div><!--
                                     --><div class="sm-four"><span>-$100.00</span></div>
                                    </div>

                                    <div class="totalRow">
                                        <div class="sm-eight"><span>Total</span></div><!--
                                     --><div class="sm-four"><span>$2,400.00</span></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <a class="continueButton" id="continueButton" href="#">Continue</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modalOverlay modalForm hide">
        <div class="modalContainer">
            <div class="modalWindow">
                <button class="modalClose">X</button>
                <div class="modalContent modal1 hide">
                    <h6 class="modalTitle">Update Primary Shipping Address</h6>
                    <form class="generalForm">
                        <label>First Name</label>
                        <input type="text" id="FName" name=" " value="User">
                        <label>Last Name</label>
                        <input type="text" id="LName" name=" " value="Name">
                        <label>Address 1</label>
                        <input type="text" id="FName" name=" " value="214 N. Cedros Ave">
                        <label>Address 2</label>
                        <input type="text" id="LName" name=" " value="#54">
                        <label>City</label>
                        <input type="text" id="LName" name=" " value="San Diego">
                        <label>State</label>
                        <input type="text" id="LName" name=" " value="CA">
                        <label>Country</label>
                        <select>
                            <option selected>United States of America</option>
                        </select>
                        <div class="generalFormInput">
                            <input type="checkbox" id="setPrimary"/>
                                <label class="inline" for="setPrimary">Set as primary address</label>
                            <div class="fltR"><a href="#"><em>Delete Address</em></a></div>
                        </div>
                        <div class="generalFormSubmit textCenter">
                            <button type="button" onClick="validateUserInfo();" class="fillBtn">Save</button>
                        </div>
                    </form>
                </div>
                <div class="modalContent modal2 hide">
                    <h6 class="modalTitle">Add Shipping Address</h6>
                    <form class="generalForm">
                        <label>First Name</label>
                        <input type="text" id="FName" name=" " value=" ">
                        <label>Last Name</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>Address 1</label>
                        <input type="text" id="FName" name=" " value=" ">
                        <label>Address 2</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>City</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>State</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>Country</label>
                        <select>
                            <option selected>United States of America</option>
                        </select>
                        <div class="generalFormSubmit textCenter">
                            <button type="button" onClick="validateUserInfo();" class="fillBtn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<!-- Footer -->
<?php include '../incs/footer.php'; ?>

<!-- Common .js Includes -->
<?php include '../incs/footer-links.php'; ?>

<script>
$(document).ready(function(){
    $("#showCart").click(function(){
        $(".overviewTableWrapper").slideToggle();
            if($(this).hasClass("toggleHidden")){
                $(this).removeClass("toggleHidden");
                $(this).addClass("toggleShown");
            } else {
                $(this).removeClass("toggleShown");
                $(this).addClass("toggleHidden");
            }   
    });
});
</script>

<script>
$(document).ready(function(){
	$('#ccPaymentSelect').click(function(){
		$('.guestCheckoutInputs').slideDown();
		$('.paypalMessage').slideUp();
		document.getElementById('continueButton').innerHTML = 'Review Order';
		document.getElementById('continueButton').href = 'review.php';
	});
	$('#paypalPaymentSelect').click(function(){
		$('.paypalMessage').slideDown();
		$('.guestCheckoutInputs').slideUp();
		document.getElementById('continueButton').innerHTML = 'Continue to PayPal';
		document.getElementById('continueButton').href = 'https://paypal.com';
	});
});	
</script>

<script> // Modal js
	$(document).on('click', '.modalCall', function() {
		$('.modalOverlay').removeClass('hide')
	});
	$(document).on('click', '.modalCall1', function() {
		$('.modal1').removeClass('hide')
	});
	$(document).on('click', '.modalCall2', function() {
		$('.modal2').removeClass('hide')
	});
	$(document).on('click', '.modalOverlay, .modalClose, .navBg', function() {
		$('.modal1').addClass('hide');
		$('.modal2').addClass('hide');
		$('.modalOverlay').addClass('hide')
	});
	$(document).on('click', '.modalWindow', function() {
		stopPropagation();
	});
</script>
<script src="/js/validation.js" type="text/javascript"></script>
</body>
</html>
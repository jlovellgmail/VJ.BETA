<div class="row cartBorderBottom">
    <h2 class="caps black">Shipping Info</h2>
    <div class="clearfix marTop15">
        First Name<br>
        Last Name<br>
        123 N. Address Lane<br>
        City, State 00000<br><br>
    </div>    
    <form class="generalForm clearfix">
        <label class="contrastGrey"><em>Shipping Notes</em></label>
        <textarea></textarea>
    </form>
</div>

<!--CC INFO-->
<div class="row cartBorderBottom">
	<h2 class="caps black marTop30 marBottom15">Payment Info</h2>
	<div class="sm-twelve lg-six leftCol">
    	<h4 class="caps black">Billing Address</h4>
        <div class="clearfix marTop15">
            First Name<br>
            Last Name<br>
            123 N. Address Lane<br>
            City, State 00000<br><br>
        </div>    
    </div><!--
    --><div class="sm-twelve lg-six rightCol">
    	<h4 class="caps black">Payment Method</h4>
        <div class="clearfix">
            <div class="marTop15 col v-top"><img src="/img/cart/visa-min.png" alt="Visa" width="44"></div><!--
            --><div class="marTop15 col posRel">
                <div class="inlineTextField"><span><b>Cardholder:</b></span> First Name Last Name</div>
                <div class="inlineTextField"><span><b>Card Type:</b></span> Ending in 1111</div>
                <div class="inlineTextField"><span><b>Card Expires:</b></span> September, 2016</div>
            </div>
		</div>
    </div>
</div>
<!--CC INFO-->

<!--PAYPALINFO-->
<!--<div class="row cartBorderBottom">
	<h2 class="caps black marTop30 marBottom15">Payment Info</h2>
	<div class="sm-twelve lg-six leftCol">
    	<h4 class="caps black">Billing Address</h4>
        <div class="clearfix marTop15">
			Fred Fredericks<br />
            fred@mcgoodwin.com<br><br />
			<em>Additional info on file with PayPal</em>
        </div>    
    </div><div class="sm-twelve lg-six rightCol">
    	<h4 class="caps black">Payment Method</h4>
        <div class="clearfix">
            <div class="marTop15 col v-top"><img src="/img/cart/paypal-min.png" alt="Visa" width="44"></div><div class="marTop15 col posRel rightCol">
                Fred Fredericks<br />
                fred@mcgoodwin.com<br />
                PayPal Transaction ID: #000001<br /><br />
                <em>Additional infor on file with PayPal.</em>
            </div>
		</div>
    </div>
</div>-->
<!--PAYPALINFO-->

<!--CUSTOMER SERVICE GUEST-->
	<?php // include '/incs/guestCustomerAccount.php'; ?>
<!--CUSTOMER SERVICE GUEST-->


<!--CUSTOMER SERVICE NEW-->
	<?php include '/incs/newCustomerAccount.php'; ?>
<!--CUSTOMER SERVICE NEW-->

<div class="row marTop30">
    <div class="sm-twelve sm-twelve lg-nine">
        <input type="checkbox" style="margin-right:8px;"/> I have read and accept the <a class="underline" href="#">shipping and returns</a> policy.
    </div><!--
    --><div class="sm-twelve sm-twelve lg-three textRight">
        <a class="fillBtn" href="#"><b>Continue</b></a>
    </div>
</div>
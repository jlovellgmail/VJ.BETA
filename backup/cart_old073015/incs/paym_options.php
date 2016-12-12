<?php 

?>

<br />
<h2>Select Payment Method</h2>
<br />
<div class="radialWrapper sm-six lg-three">
    <input id="ccPaymentSelect" class="radial" type="radio" name="group1" value="cc" <?php if ($paymMeth=="cc"){echo " checked";}?> />&nbsp;
    <img class="ccImg" src="/img/cart/amex-min.png" alt="American Express" />
    <img class="ccImg" src="/img/cart/mastercard-min.png" alt="MaterCard" />
    <img class="ccImg" src="/img/cart/visa-min.png" alt="Visa" />
</div><!-- 
--><div class="radialWrapper sm-six lg-three">
    <input id="paypalPaymentSelect" class="radial" type="radio" name="group1" value="paypal" <?php if ($paymMeth=="paypal"){echo " checked";}?> />&nbsp;
    <img class="ccImg" src="/img/cart/paypal-min.png" alt="Paypal" />
</div>
<div class="paypalMessage" style="display:none;">
    <span>You will be redirected to PayPal on the next page to enter your billing information.</span>
</div>
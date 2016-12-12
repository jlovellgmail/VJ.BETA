<div class="checkoutFormFieldsWrapper sm-twelve">                                

    <h2 class="caps black">Payment Method</h2>
    <br />
    <div class="radialWrapper sm-six lg-three">
        <input id="ccPaymentSelect" class="radial" type="radio" name="group1" value="cc" />&nbsp;
        <img class="ccImg" src="/img/cart/amex-min.png" alt="American Express" />
        <img class="ccImg" src="/img/cart/mastercard-min.png" alt="MaterCard" />
        <img class="ccImg" src="/img/cart/visa-min.png" alt="Visa" />
    </div><!-- 
    --><div class="radialWrapper sm-six lg-three">
        <input id="paypalPaymentSelect" class="radial" type="radio" name="group1" value="paypal" />&nbsp;
        <img class="ccImg" src="/img/cart/paypal-min.png" alt="Paypal" />
    </div>
    <div class="paypalMessage" style="display:none;">
        <div class="well">You will be redirected to PayPal on the next page to enter your billing information.</div>
        <div class="row marTop30">
            <div class="sm-twelve">
                <a class="caps black underline" href="#"><b>Back To Summary</b></a>
            </div><!--
            --><div class="sm-twelve textRight">
                <a class="fillBtn" href="#"><b>Continue</b></a>
            </div>
        </div>
    </div>
            
    <div style="display:none;" id="ccBillInfo">
        <div class="row">
            <div class="sm-twelve"><!--
        <div class="formValidateMessage error">Your card was declined. Please try again.</div>   
        <div class="formValidateMessage error">Your card has expired. Please try again.</div>   
        <div class="formValidateMessage error">Your security code is invalid. Please try again.</div> -->
        <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartcc" name="cartcc">     
            <div class="row">
                <div class="sm-twelve lg-six leftCol">
                    <label for="cardName">Cardholder Name:</label>
                    <input id="CCName" type="text" name="CCName" value="">
                </div><!--
                --><div class="sm-twelve lg-six rightCol">
                    <div id="ccCardType" class="">
                        <label for="ccNumber">Credit Card Number:</label>
                        <input id="CCNumber" type="text" name="CCNumber" value="">
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="sm-twelve lg-six leftCol">
                    <label for="ccXMonth">Exp. Month:</label>
                    <select id="CCXMonth" name="CCXMonth">
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">Nobember</option>
                        <option value="12">December</option>
                    </select></div><!--
                --><div class="sm-twelve lg-three centerCol"><label>Exp. Year:</label>
                    <select name="CCXYear" id="CCXYear">
                        <option value="xx">Year</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                    </select></div><!--
                --><div class="sm-twelve lg-three rightCol">
                    <label for="ccCode">Security Code:</label>
                    <input id="CCCode" type="text" name="CCCode">
                </div>
            </div>
        </form>
        <script>
        //Function to validate the credit card
            $(function () {
                $('#ccCardType input').validateCreditCard(function (result) {
                    var getCardType = (result.card_type == null ? '-' : result.card_type.name);
                    $("#ccCardType").removeAttr("class");
                    $('#ccCardType').addClass(getCardType);
                    if (result.valid) {
                        ccValid = true;
                        return $("#ccCardType label").addClass('valid');
                    } else {
                        ccValid = false;
                        return $("#ccCardType label").removeClass('valid');
                    }
                },{accept:['visa','mastercard','amex']});
            });
        </script></div>
        </div>	
        <?php include '/incs/cartAddressBook.php'; ?>
        <?php // include '/incs/cartAddressForm.php'; ?>
    </div>
                            
</div>
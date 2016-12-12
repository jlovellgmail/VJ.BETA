<?php 
if ($cartExist && $paymMeth=="cc"){
    $CCObj = $Cart->getCreditCard();
    $CCName = $CCObj->getVar("CCName");
    $CCNo = $CCObj->getVar("CCNumber");
    
}

?>
<!--
<div class="formValidateMessage error">Your card was declined. Please try again.</div>   
<div class="formValidateMessage error">Your card has expired. Please try again.</div>   
<div class="formValidateMessage error">Your security code is invalid. Please try again.</div> -->
<?php 
    if (isset( $_SESSION["CCError"])&&  $_SESSION["CCError"]!=""){
        echo "<div class='formValidateMessage error'>". $_SESSION["CCError"]."</div>" ;
        unset($_SESSION["CCError"]);
    }
?>
<form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartcc" name="cartcc" >     
    <div class="row">
        <div class="sm-twelve">
            <label for="cardName">Cardholder Name:</label>
            <input id="CCName" type="text" name="CCName" value="<?php echo $CCName; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="sm-twelve">
            <div id="ccCardType">
                <label for="ccNumber">Credit Card Number:</label>
                <input id="CCNumber" type="text" name="CCNumber" value="" />
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
                <?php for ($i = date("Y"); $i <= date("Y") + 10; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select></div><!--
        --><div class="sm-twelve lg-three rightCol">
            <label for="ccCode">Security Code:</label>
            <input id="CCCode" type="text" name="CCCode" />
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
</script>
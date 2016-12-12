var ccValid = false;


$(document).on('blur', '.qtyInput', function () {
    $(".updateTotalOverlay").show();
    var itmID = $(this).attr('id');
    var itmVal = $(this).val();
    var PID = itmID.split("_")[1];
    var SCPID = itmID.split("_")[2];
    $.ajax({
        type: 'POST',
        url: '/cart/updateQty.php?rnd=' + Math.random() * 11 + "&pid=" + PID + "&qty=" + itmVal + "&scpid=" + SCPID,
        data: {},
        error: function (xhr, status, error) {
            //alert(status);
            //alert(xhr.responseText);
        },
        success: function (result) {
            window.location = "/cart/";
        }
    });

});

function changeCountry(addrType){
    if (addrType=="Shp"){
        //alert("/cart/incs/state_input.php?AddrFrmType="+addrType+"&SCountry="+$("#countryShipSelect").val());
        $("#SStateAJAXRes").load("/cart/incs/state_input.php?AddrFrmType="+addrType+"&SCountry="+$("#countryShipSelect").val());
    }else if (addrType=="Bil"){
        $("#BStateAJAXRes").load("/cart/incs/state_input.php?AddrFrmType="+addrType+"&BCountry="+$("#countryBillSelect").val());
    }
   
}

function printOrd(ordID){
    window.open("/cart/print_receipt.php?OrdID="+ordID);
}

function removeProduct(pid, scpid) {
    if (confirm("Are you sure you want to delete this product?")) {
        window.location = "removeProduct.php?pid=" + pid + "&scpid=" + scpid;
    }
}

function cartLogin() {

    if ($('#email').val() == "") {
        alert("Please provide an email address.");
        $('#email').focus();
        return;
    }
    if ($('#passwd').val() == "") {
        alert("Please provide a valid password");
        $('#passwd').focus();
        return;
    }
    $("#signInFormCart").submit();
}

function reviewLogin() {

    if ($('#reviewModalEmail').val() == "") {
        alert("Please provide an email address.");
        $('#reviewModalEmail').focus();
        return;
    }
    if ($('#reviewModalPassw').val() == "") {
        alert("Please provide a valid password");
        $('#reviewModalPassw').focus();
        return;
    }
    $("#signInFormReview").submit();
}


function copyShipToBill() {
    $('#fNameBillField').val($('#fNameShipField').val());
    $('#lNameBillField').val($('#lNameShipField').val());
    $('#address1BillField').val($('#address1ShipField').val());
    $('#address2BillField').val($('#address2ShipField').val());
    $('#cityBillField').val($('#cityShipField').val());
    $('#stateBillField').val($('#stateShipField').val());
    $('#postalCodeBillField').val($('#postalCodeShipField').val());
    var country = $('#countryShipSelect option:selected').val();
    $('#countryBillSelect option[value=' + country + ']').attr('selected', 'selected');

}

function emptyBilAddr() {
    $('#fNameBillField').val("");
    $('#lNameBillField').val("");
    $('#address1BillField').val("");
    $('#address2BillField').val("");
    $('#cityBillField').val("");
    $('#stateBillField').val("");
    $('#postalCodeBillField').val("");
    var country = "xx";
    $('#countryBillSelect option[value=' + country + ']').attr('selected', 'selected');
    $('[name=formSelectableRadioBil_]').prop('checked', false);
}

function emptyShipAddr() {
    $('#fNameShipField').val("");
    $('#lNameShipField').val("");
    $('#address1ShipField').val("");
    $('#address2ShipField').val("");
    $('#cityShipField').val("");
    $('#stateShipField').val("");
    $('#postalCodeShipField').val("");
    $('#eMailShipField').val("");
    $('#telShipField').val("");
    var country = "xx";
    $('#countryShipSelect option[value=' + country + ']').prop('selected', true);
    $('[name=formSelectableRadioShp_]').prop('checked', false);
}

function useSavedAddr(AddrID, Type) {
    if (Type == "Shp") {
        $("#shipAddrFormDet").load("/cart/incs/ship_addr_form.php?AddrID=" + AddrID);
    }
    if (Type == "Bil") {
        $("#billAddrFormDet").load("/cart/incs/bill_addr_form.php?AddrID=" + AddrID);
    }
}


function ShipAddrErrExist() {
    var errorExist = false;
    $(".formError").removeClass("formError");
    if ($('#fNameShipField').val() == "") {
        $('#fNameShipField').addClass("formError");
        $('#fNameShipField').focus();
        errorExist = true;
    }
    if ($('#lNameShipField').val() == "") {
        $('#lNameShipField').addClass("formError");
        $('#lNameShipField').focus();
        errorExist = true;
    }
    /*if ($('#eMailShipField').val() == "") {
     $('#eMailShipField').addClass("formError");
     $('eMailShipField').focus();
     errorExist = true;
     }*/
    if ($('#address1ShipField').val() == "") {
        $('#address1ShipField').addClass("formError");
        $('#address1ShipField').focus();
        errorExist = true;
    }
    if ($('#cityShipField').val() == "") {
        $('#cityShipField').addClass("formError");
        $('#cityShipField').focus();
        errorExist = true;
    }
    if ($('#stateShipField').val() == "") {
        $('#stateShipField').addClass("formError");
        $('#stateShipField').focus();
        errorExist = true;
    }
    if ($('#postalCodeShipField').val() == "") {
        $('#postalCodeShipField').addClass("formError");
        $('#postalCodeShipField').focus();
        errorExist = true;
    }
    if ($('#countryShipSelect').val() == "xx") {
        $('#countryShipSelect').addClass("formError");
        $('#countryShipSelect').focus();
        errorExist = true;
    }
    if ($('#telShipField').val() == "") {
        $('#telShipField').addClass("formError");
        $('#telShipField').focus();
        errorExist = true;
    }
    if (errorExist) {
        $(".formValidateMessage").show();
        $(document).scrollTop('#chkoutErr');
    }
    else {
        // $("#cartship").submit();
    }
    return errorExist;
}

function BillAddrErrExist() {
    var errorExist = false;
    //$(".formError").removeClass("formError");
    if ($('#fNameBillField').val() == "") {
        $('#fNameBillField').addClass("formError");
        $('#fNameBillField').focus();
        errorExist = true;

    }
    if ($('#lNameBillField').val() == "") {
        $('#lNameBillField').addClass("formError");
        $('#lNameBillField').focus();
        errorExist = true;
    }
    if ($('#eMailBillField').val() == "") {
        $('#eMailBillField').addClass("formError");
        $('eMailBillField').focus();
        errorExist = true;
    }
    if ($('#address1BillField').val() == "") {
        $('#address1BillField').addClass("formError");
        $('#address1BillField').focus();
        errorExist = true;
    }
    if ($('#cityBillField').val() == "") {
        $('#cityBillField').addClass("formError");
        $('#cityBillField').focus();
        errorExist = true;
    }
    if ($('#stateBillField').val() == "") {
        $('#stateBillField').addClass("formError");
        $('#stateBillField').focus();
        errorExist = true;
    }
    if ($('#postalCodeBillField').val() == "") {
        $('#postalCodeBillField').addClass("formError");
        $('#postalCodeSBillField').focus();
        errorExist = true;
    }
    if ($('#countryBillSelect').val() == "xx") {
        $('#countryBillSelect').addClass("formError");
        $('#countryBillSelect').focus();
        errorExist = true;
    }
    if (errorExist) {
        $(".formValidateMessage").show();
    }
    else {
        // $("#cartship").submit();
    }
    return errorExist;
}

function creditCardErrExist() {
    var errorExist = false;
    if ($('#CCName').val() == "") {
        $('#CCName').addClass("formError");
        $('#CCName').focus();
        errorExist = true;
    }
    if ($('#CCType').val() == "") {
        $('#CCType').addClass("formError");
        $('#CCType').focus();
        errorExist = true;
    }
    if ($('#CCNumber').val() == "") {
        $('#CCNumber').addClass("formError");
        $('#CCNumber').focus();
        errorExist = true;
    }
    if ($('#CCXMonth').val() == "") {
        $('#CCXMonth').addClass("formError");
        $('#CCXMonth').focus();
        errorExist = true;
    }
    if ($('#CCXYear').val() == "xx") {
        $('#CCXYear').addClass("formError");
        $('#CCXYear').focus();
        errorExist = true;
    }
    if ($('#CCCode').val() == "") {
        $('#CCCode').addClass("formError");
        $('#CCCode').focus();
        errorExist = true;
    }
    if (!errorExist) {
        var usrDate = new Date($('#CCXMonth').val() + "/28/" + $('#CCXYear').val());
        var now = new Date();
        if (usrDate < now) {
            alert("Your credit card is expired!!");
            errorExist = true;
        }
    }
    if (errorExist) {
        $(".formValidateMessage").show();
        ccValid = false;
    }
    else {
        // $("#cartship").submit();
    }
    return errorExist;
}

function chekoutCC(loggedIn) {
    $(".formError").removeClass("formError");
    //Not Logged IN --- alert("No");
    if (!ShipAddrErrExist() && !BillAddrErrExist() && !creditCardErrExist()) {
        if (ccValid) {
            var cardData = $("#cartcc").serialize();
            $.ajax({
                type: 'POST',
                url: 'addCCToCart.php?rnd=' + Math.random() * 11,
                data: cardData,
                error: function (xhr, status, error) {
                    alert(status);
                    alert(xhr.responseText);
                },
                success: function (result) {
                    var shipData = $("#cartship").serialize();
                    $.ajax({//Post data to add Ship to Cart
                        type: 'POST',
                        url: 'addAddrToCart.php?Type=Shp&rnd=' + Math.random() * 11,
                        data: shipData,
                        error: function (xhr, status, error) {
                            alert(status);
                            alert(xhr.responseText);
                        },
                        success: function (result) {
                            //If Ship posted correctly post again same data for billing
                            var billData = $("#cartbill").serialize();
                            $.ajax({
                                type: 'POST',
                                url: 'addAddrToCart.php?Type=Bil&rnd=' + Math.random() * 11,
                                data: billData,
                                error: function (xhr, status, error) {
                                    alert(status);
                                    alert(xhr.responseText);
                                },
                                success: function (result) {
                                    window.location = "review.php"

                                }
                            }); // AJAX Post for Billing
                        }//success shipping
                    });//Ajax Post for Shipping
                }//success for credit card
            }); //AJAX Post for credit card
        }//cc valid
        else {
            alert("Please enter a valid credit card");
        }
    }//if No error exist

}//function close

function checkoutPaypal(loggedIn) {
    if (loggedIn) {

    } else {

    }
    if (!ShipAddrErrExist()) {
        var shipData = $("#cartship").serialize();
        $.ajax({//Post data to add Ship to Cart
            type: 'POST',
            url: 'addAddrToCart.php?Type=Shp&rnd=' + Math.random() * 11,
            data: shipData,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                //If Ship posted correctly post again same data for billing
                window.location = "paypal_trans.php";

            }
        });//Ajax Post for Shipping

    }


}

function completeOrd(paymMethod, loggedIn) {
    if ($('#termAndCont').prop('checked')) {

        var shipNotes = $("#shipNotesField").val();
        $.ajax({
            type: 'POST',
            url: 'addNotesToCart.php?rnd=' + Math.random() * 11,
            data: "shipNote=" + shipNotes,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                if (loggedIn == "") {
                    var email = $("#eMailShipField").val();
                    if (email == "") {
                        alert("You must enter an email to continue");
                        return false;
                    }
                    if (!validateEmail(email)) {
                        alert("Please enter a valid email to continue");
                        return false;
                    }
                    $.ajax({//Post data to add Ship to Cart
                        type: 'POST',
                        url: '/incs/check_email.php?rnd=' + Math.random() * 11,
                        data: "email=" + email,
                        error: function (xhr, status, error) {
                            alert(status);
                            alert(xhr.responseText);
                        },
                        success: function (result) {
                            if (result != "") {
                                if (result == "Email Exist") {
                                    $("#reviewModalEmail").val(email);
                                    openModal('modalReviewCheckout');
                                }
                                return false;
                            }
                            else {
                                $.ajax({
                                    type: 'POST',
                                    url: 'addEmailToCart.php?rnd=' + Math.random() * 11,
                                    data: "email=" + email,
                                    error: function (xhr, status, error) {
                                        alert(status);
                                        alert(xhr.responseText);
                                        return false;
                                    },
                                    success: function (result) {
                                        placeOrd(paymMethod);
                                    }
                                });//Ajax Post for Email
                            }

                        }
                    });//Ajax Post for Shipping Notes

                } else {
                    placeOrd(paymMethod);
                }

            }
        });//Ajax Post for Shipping
    } else {
        alert("You must accept shipping and returns policy to continue");
        return;
    }
}

function placeOrd(paymMethod) {
    if (paymMethod == "paypal") {
        document.location = "/cart/paypal_trans.php?action=process";
    } else {
        document.location = "/cart/cc_processing.php";
    }
}


function cartReg() {
    var errorExist = false;
    $(".formError").removeClass("formError");
    var email = $("#cartRegEmail").val();
    if (email == "") {
        $('#cartRegEmail').addClass("formError");
        $('#cartRegEmail').focus();
        errorExist = true;
    }
    var passwd = $("#Passwd").val();
    if (passwd == "") {
        $('#Passwd').addClass("formError");
        $('#Passwd').focus();
        errorExist = true;
    }
    var Cpasswd = $("#Conf_Passwd").val();
    if (Cpasswd == "") {
        $('#Conf_Passwd').addClass("formError");
        $('#Conf_Passwd').focus();
        errorExist = true;
    }
    if (errorExist) {
        return;
    }
    if (!validateEmail(email)) {
        alert("Please enter a valid email to continue");
        return;
    }
    if (passwd != Cpasswd) {
        alert("Password and confirm password do not match");
        return;
    }
    $.ajax({
        type: 'POST',
        url: 'order_registration_action.php?rnd=' + Math.random() * 11,
        data: "Email=" + email+"&Password="+passwd,
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            return false;
        },
        success: function (result) {
            if (result==""){
                document.location="/regConf.php";
            }else {
                alert(result);
            }
        }
    });//Ajax Post for Email

}

$(document).ready(function () {
    $('#ccPaymentSelect').click(function () {
        $('#ccBillInfo').slideDown();
        $('.paypalMessage').slideUp();
        document.getElementById('continueButton').innerHTML = "Review Order";
        document.getElementById('continueButton').href = "javascript:chekoutCC('" + loggedIn + "')";
        setTimeout(function () {
            $('#continueButton').removeClass("hide");
        }, 400);
    });
    $('#paypalPaymentSelect').click(function () {
        $('.paypalMessage').slideDown();
        $('#ccBillInfo').slideUp();
        document.getElementById('continueButton').innerHTML = "Continue to PayPal";
        document.getElementById('continueButton').href = "javascript:checkoutPaypal('" + loggedIn + "')";
        setTimeout(function () {
            $('#continueButton').removeClass("hide");
        }, 400);
    });

    $("input[type=text]").click(function () {
        $(this).removeClass("formError");
    });
    $("input[type=email]").click(function () {
        $(this).removeClass("formError");
    });
    $("select").change(function () {
        $(this).removeClass("formError");
    });

    $("#sameAddr").change(function () {
        if (this.checked) {
            copyShipToBill()
        } else {
            emptyBilAddr()
        }
    });
});


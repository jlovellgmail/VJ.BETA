

function removeProduct(pid) {
    if (confirm("Are you sure you want to delete this product?")) {
        window.location = "removeProduct.php?pid=" + pid;
    }
}

//Not used - Kept here for refernece.
function updateCart() {
    //alert("hi");
    var allInputs = $('[type=number]');
    data = ""
    allInputs.each(function () {
        var name = $(this).attr('name');
        var val = $(this).val();
        data += name + "=" + val + "&"
    });
    $.ajax({
        type: 'POST',
        url: '/cart/updateProduct.php?rnd=' + Math.random() * 11,
        data: {allInput: data},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            window.location = "/cart/";
            //alert(result);
            //$('#usg_rpt_results').html(result);
            //$('#chkAll').click();
        }
    });

}

$(document).on('blur', '.qtyInput', function () {
    $(".updateTotalOverlay").show();
    var itmID = $(this).attr('id');
    var itmVal = $(this).val();
    var PID = itmID.split("_")[1];
    $.ajax({
        type: 'POST',
        url: '/cart/updateQty.php?rnd=' + Math.random() * 11 + "&pid=" + PID + "&qty=" + itmVal,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            window.location = "/cart/";
        }
    });

});


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

function chekoutSubmit(loggedIn) {
    $(".formError").removeClass("formError");
    if (loggedIn) {
        if (shipAddrExist && billAddrExist) {
            if (!creditCardErrExist()) {
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
                            //alert(result);
                            window.location = "review.php";
                        }
                    }); //AJAX Post for credit card
                }
                else {
                    alert("Please enter a valid credit card");
                }
            }
        } else {
            alert("Please select shipping and billing address")
        }
    } else {
        // If no error exist on Shipping Address 
        if (!guestShipAddrErrExist()) {
            if ($('#sameAddr').prop('checked')) {//If Ship same as Bill address
                if (!creditCardErrExist()) { // If credit card info correct
                    postGuestData('same');
                }
            } else {
                if (!guestBillAddrErrExist()) {
                    if (!creditCardErrExist()) {
                        postGuestData('diff');
                    }
                }
            }

        }

    }
}


function checkoutPaypal(loggedIn) {
    if (loggedIn) {
        if (shipAddrExist) {
            window.location = "paypal_trans.php";
        }
    } else {
        if (!guestShipAddrErrExist()) {
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

}

function updGuestData(Type) {
    if (Type == "Shp") {
        var postUrl = 'addAddrToCart.php?Type=Shp&rnd=' + Math.random() * 11
    } else {
        var postUrl = 'addAddrToCart.php?Type=Bil&rnd=' + Math.random() * 11
    }
    if (!guestModalAddrErrExist(Type)) {
        var AddrData = $("#AddrFrm").serialize();
        $.ajax({//Post data to add Ship to Cart
            type: 'POST',
            url: postUrl,
            data: AddrData,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                //If Ship posted correctly post again same data for billing
                window.location = "/cart/review.php";

            }
        });//Ajax Post for Shipping
    }

}

function postGuestData(billFlag) {
    var shipData = $("#cartship").serialize();
    if (billFlag == "same") {
        var billData = shipData;
    }
    else {
        var billData = $("#cartbill").serialize();
    }
    var cardData = $("#cartcc").serialize();
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
            $.ajax({
                type: 'POST',
                url: 'addAddrToCart.php?Type=Bil&rnd=' + Math.random() * 11,
                data: billData,
                error: function (xhr, status, error) {
                    alert(status);
                    alert(xhr.responseText);
                },
                success: function (result) {
                    //If Ship,Bill posted correctly post again data for credit card

                    $.ajax({
                        type: 'POST',
                        url: 'addCCToCart.php?rnd=' + Math.random() * 11,
                        data: cardData,
                        error: function (xhr, status, error) {
                            alert(status);
                            alert(xhr.responseText);
                        },
                        success: function (result) {
                            //alert(result);
                            window.location = "review.php";
                        }
                    }); //AJAX Post for credit card
                }
            }); // AJAX Post for Billing
        }
    });//Ajax Post for Shipping
}

function guestShipAddrErrExist() {
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
    if ($('#eMailShipField').val() == "") {
        $('#eMailShipField').addClass("formError");
        $('eMailShipField').focus();
        errorExist = true;
    }
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
    if ($('#eMailShipField').val() == "") {
        $('#eMailShipField').addClass("formError");
        $('#eMailShipField').focus();
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

function guestBillAddrErrExist() {
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
    if ($('#CCXYear').val() == "") {
        $('#CCXYear').addClass("formError");
        $('#CCXYear').focus();
        errorExist = true;
    }
    if ($('#CCCode').val() == "") {
        $('#CCCode').addClass("formError");
        $('#CCCode').focus();
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
}

function setSame() {
    var selRBtnID = $('input[name=selectableRadioShip]:checked').attr('id');
    var selRBtnIDArr = selRBtnID.split("_");
    var selID = selRBtnIDArr[1];
    $("#usrInfoBillAddrs").hide();
    addAddrToSession(selID, 'Bil');
    billAddrExist = true;
}

function updGuestModal(Type)
{
    $('#addrModal').load('/cart/incs/guestAddrModal.php?Type=' + Type);
    $('#addrModal').toggleClass('hide', false);
    $('#modalOverlay').toggleClass('hide', false);
}


function guestModalAddrErrExist(Type) {
    var errorExist = false;
    $(".formError").removeClass("formError");
    if ($('#FName').val() == "") {
        $('#FName').addClass("formError");
        $('#FName').focus();
        errorExist = true;

    }
    if ($('#LName').val() == "") {
        $('#LName').addClass("formError");
        $('#LName').focus();
        errorExist = true;
    }
    if (Type == "Shp") {
        if ($('#Email').val() == "") {
            $('#Email').addClass("formError");
            $('Email').focus();
            errorExist = true;
        }
    }
    if ($('#Addr1').val() == "") {
        $('#Addr1').addClass("formError");
        $('#Addr1').focus();
        errorExist = true;
    }
    if ($('#City').val() == "") {
        $('#City').addClass("formError");
        $('#City').focus();
        errorExist = true;
    }
    if ($('#State').val() == "") {
        $('#State').addClass("formError");
        $('#State').focus();
        errorExist = true;
    }
    if ($('#Postal').val() == "") {
        $('#Postal').addClass("formError");
        $('#Postal').focus();
        errorExist = true;
    }
    if ($('#Country').val() == "xx") {
        $('#Country').addClass("formError");
        $('#Country').focus();
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

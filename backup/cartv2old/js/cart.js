var ccValid = false;
$(document).on('blur', '.qtyInput', function () {
    $(".updateTotalOverlay").show();
    var itmID = $(this).attr('id');
    var itmVal = $(this).val();
    var PID = itmID.split("_")[1];
    var SCPID = itmID.split("_")[2];
    $.ajax({
        type: 'POST',
        url: 'updateQty.php?rnd=' + Math.random() * 11 + "&pid=" + PID + "&qty=" + itmVal + "&scpid=" + SCPID,
        data: {},
        error: function (xhr, status, error) {
            //alert(status);
            //alert(xhr.responseText);
        },
        success: function (result) {
            window.location = "index.php";
        }
    });
});
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

function changeCountry(addrType) {

    if (addrType == "Shp") {
        $("#SStateAJAXRes").load("/cart/incs/state_input.php?AddrFrmType=" + addrType + "&Country=" + $("#countrySelect").val());
    } else if (addrType == "Bil") {
        $("#SStateAJAXRes").load("/cart/incs/state_input.php?AddrFrmType=" + addrType + "&Country=" + $("#countrySelect").val());
    }

}

function changeCountryOnNew(addrType) {

    if (addrType == "Shp") {
        $("#SStateAJAXResOnNew").load("/cart/incs/state_input.php?AddrFrmType=" + addrType + "&Country=" + $("#countrySelectOnNew").val());
    } else if (addrType == "Bil") {
        $("#SStateAJAXResOnNew").load("/cart/incs/state_input.php?AddrFrmType=" + addrType + "&Country=" + $("#countrySelectOnNew").val());
    }

}


function AddrValidation() {
    var errorExist = false;
    $(".formError").removeClass("formError");
    if ($('#fNameField').val() == "") {
        $('#fNameField').addClass("formError");
        $('#fNameField').focus();
        errorExist = true;
    }
    if ($('#lNameField').val() == "") {
        $('#lNameField').addClass("formError");
        $('#lNameField').focus();
        errorExist = true;
    }
    if ($('#address1Field').val() == "") {
        $('#address1Field').addClass("formError");
        $('#address1Field').focus();
        errorExist = true;
    }
    if ($('#cityField').val() == "") {
        $('#cityField').addClass("formError");
        $('#cityField').focus();
        errorExist = true;
    }
    if ($('#stateField').val() == "") {
        $('#stateField').addClass("formError");
        $('#stateField').focus();
        errorExist = true;
    }
    if ($('#postalCodeField').val() == "") {
        $('#postalCodeField').addClass("formError");
        $('#postalCodeField').focus();
        errorExist = true;
    }
    if ($('#countrySelect').val() == "xx") {
        $('#countrySelect').addClass("formError");
        $('#countrySelect').focus();
        errorExist = true;
    }
    var selType = $("#addrType").val();
    if (selType == "Shp") {
        if ($('#telField').val() == "") {
            $('#telField').addClass("formError");
            $('#telField').focus();
            errorExist = true;
        }
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

function updAddr() {
    if (!AddrValidation()) {
        $("#cartEditaddr").submit();
    }
}

function addAddr() {
    if (!AddrValidation()) {
        $("#cartaddr").submit();
    }
}

function useSelectedAddr() {
    var selID = $('input[name=chooseAnotherAddress]:checked').val();
    var selType = $("#addrType").val();
    if (selID > 0) {
        document.location.href = "addAddr_Action.php?AddrID=" + selID + "&action=selAddr&AddrType=" + selType;
    } else {
        alert("Please select an address to continue.");
    }
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

function checkoutPaypal() {

    window.location = "paypal_trans.php";
}

function chekoutCC() {

    if (showSaved == '1') {
        creditCardErrExist();
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
                    // alert(result);
                    window.location.href = "summary.php";
                }
            });
        }
    } else {
        if (!AddrValidation()) {
            creditCardErrExist();
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
                        $("#cartaddr").submit();
                    }
                });
            }
        }
    }
}

function completeOrd(paymMethod) {
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
            success: function (resultNotes) {

                if (usrMode == "guest" || usrMode == "new") {////
                    var email = $("#emailReview").val();
                    if (email == "") {
                        alert("You must enter an email to continue");
                        return false;
                    }
                    if (!validateEmail(email)) {
                        alert("Please enter a valid email to continue");
                        return false;
                    }
                    $.ajax({//Post data check if email exist
                        type: 'POST',
                        url: '/incs/check_email.php?rnd=' + Math.random() * 11,
                        data: "email=" + email,
                        error: function (xhr, status, error) {
                            alert(status);
                            alert(xhr.responseText);
                        },
                        success: function (result) {

                            if (result == "Email Exist") {

                                $("#reviewModalEmail").val(email);
                                openModal('modalReviewCheckout');
                                return;
                            } else if (result == "") {
                                if (usrMode == "guest") {
                                    $.ajax({// AJAX post for email
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
                                } else if (usrMode == "new") {
                                    var psw = $("#psw").val();
                                    var confpsw = $("#confpsw").val();
                                    if (psw=="" || confpsw==""){
                                        alert("Enter a password to continue.")
                                        return;
                                    }
                                    if (psw != confpsw) {
                                        alert("Passwords do not match.")
                                        return;
                                    }
                                    $.ajax({// AJAX post to create a new user
                                        type: 'POST',
                                        url: 'addNewUserToCart.php?rnd=' + Math.random() * 11,
                                        data: "email=" + email + "&psw=" + psw,
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



                        }
                    });


                } else {////
                    placeOrd(paymMethod);
                }
                //////////
            }
        });
    } else {
        alert("You must accept shipping and returns policy to continue");
        return;
    }
}

function reviewLogin(paymMethod) {

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
    var formData =  $("#signInFormReview").serialize();
   
    $.ajax({// AJAX post to create a new user
        type: 'POST',
        url: '/login_action_cart.php?rnd=' + Math.random() * 11,
        data: formData,
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            return;
        },
        success: function (result) {
            if (result==""){
                placeOrd(paymMethod);
            }else {
                $("#summaryLoginErrDiv").html(result);
            }
        }
    });//Ajax Post for Email

}


function placeOrd(paymMethod) {
    $("#completeOrdDiv").hide();
    $("#processingDiv").show();
    if (paymMethod == "paypal") {
        document.location = "paypal_trans.php?action=process";
    } else {
        document.location = "cc_processing.php";
    }
}

function printOrd(ordID) {
    window.open("print_receipt.php?OrdID=" + ordID);
}


$(document).ready(function () {
    $("input[type=text]").click(function () {
        $(this).removeClass("formError");
    });
    $("input[type=email]").click(function () {
        $(this).removeClass("formError");
    });
    $("select").change(function () {
        $(this).removeClass("formError");
    });
    $('#ccPaymentSelect').click(function () {
        $('#ccBillInfo').slideDown();
        $('.paypalMessage').slideUp();
        document.getElementById('continueAddrBtn').innerHTML = "Review Order";
        document.getElementById('continueAddrBtn').href = "javascript:chekoutCC()";
        setTimeout(function () {
            $('#continueAddrBtn').removeClass("hide");
        }, 400);
    });
    $('#paypalPaymentSelect').click(function () {
        $('.paypalMessage').slideDown();
        $('#ccBillInfo').slideUp();
        document.getElementById('continueButton').innerHTML = "Continue to PayPal";
        document.getElementById('continueButton').href = "javascript:checkoutPaypal()";
        setTimeout(function () {
            $('#continueButton').removeClass("hide");
        }, 400);
    });
});


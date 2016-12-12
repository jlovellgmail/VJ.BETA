// JavaScript Document
function validateLoginForm() {

    if ($('#email').val() == "") {
        alert("Please provide an email address.");
        $('#email').focus();
        return false;
    }
    else if (!validateEmail($('#email').val())) {
        alert("Please provide a valid email address.");
        $('#email').focus();
        return false;
    }
    else if ($('#passwd').val() == "") {
        alert("Please provide a valid password");
        $('#passwd').focus();
        return false;
    }
    else
    {
        $('#loginForm').submit();
    }
}
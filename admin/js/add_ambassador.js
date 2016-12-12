// JavaScript Document
function validateAddAmbassador() {
    if ($('#FName').val() == "") {
        alert("Please provide a first name.");
        $('#FName').focus();
        return;
    }

    if ($('#LName').val() == "") {
        alert("Please provide a last name.");
        $('#LName').focus();
        return;
    }

    if (!validateEmail($('#Email').val())) {
        alert("Please provide a valid email address.");
        $('#Email').focus();
        return;
    }

    if ($('#Password').val() == "") {
        alert("Please provide a valid password.");
        $('#Password').focus();
        return;
    }

    if ($('#Password_Conf').val() == "") {
        alert("Please provide a valid password.");
        $('#Password_Conf').focus();
        return;
    }

    if ($('#Password_Conf').val() !== $('#Password').val()) {
        alert("Passwords do not match.");
        $('#Password_Conf').focus();
        return;
    }

    if ($('#Location').val() == "0") {
        alert("Please select location.");
        $('#Location').focus();
        return;
	}
	
	if ($('#Role').val() == "0") {
        alert("Please select role.");
        $('#Role').focus();
        return;
	}
	
	$('#addAmbassadorFrm').submit();
}

function delAmbassador(AID)
{
    if (confirm("Are you sure you want to delete this user?"))
    {
        window.location.href = "/admin/delAmbassador_action.php?AID=" + AID;
    }
}
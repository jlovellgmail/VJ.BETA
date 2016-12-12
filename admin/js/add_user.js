// JavaScript Document
function validateAddUser() {
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
    
	 if ($('#UsrPriv').val() == 80 && $('#Location').val() == 0)
	 {
	 	  alert("Please choose ambassador location.");
        $('#Location').focus();
        return;
	 }

    if ($('#Password_Conf').val() !== $('#Password').val()) {
        alert("Passwords do not match.");
        $('#Password_Conf').focus();
        return;
    }
    else
    {
        $('#addUsrFrm').submit();
    }
}

function updateLocation()
{
	var userPriv = $('#UsrPriv').val();
	if (userPriv == 80)
	{
		$('#locationDiv').show();
	}
	else
	{
		$('#locationDiv').hide();
	}
}

function delUser(UsrID)
{
    if (confirm("Are you sure you want to delete this user?"))
    {
        window.location.href = "delUser_action.php?UsrID=" + UsrID;
    }
}

function updatePassword(UsrID)
{
	if ($('#updatePass').val() == "") {
        alert("Please provide a valid password.");
        $('#updatePass').focus();
        return;
    }

    if ($('#Conf_updatePass').val() == "") {
        alert("Please provide a valid password.");
        $('#Conf_updatePass').focus();
        return;
    }

    if ($('#Conf_updatePass').val() !== $('#updatePass').val()) {
        alert("Passwords do not match.");
        $('#Conf_updatePass').focus();
        return;
    }
	else
	{
		Passwd = $('#updatePass').val();
		Conf_Passwd = $('#Conf_updatePass').val();
		$.ajax({
	        type: 'POST',
	        url: '/admin/changePass_action.php?UsrID=' + UsrID,
	        data: {Passwd:Passwd, Conf_Passwd:Conf_Passwd},
	        error: function (xhr, status, error) {
	            alert(status);
	            alert(xhr.responseText);
	        },
	        success: function (result) {
				if (result != "")
				{
					alert(result);
				}
				else
				{
					alert("The new password is saved.");
					$("#updatePwModal").modal("hide");
				}
	        }
	    });
	}
}
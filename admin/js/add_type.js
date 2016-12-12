// JavaScript Document
function validateAddType() {
    if ($('#SID').val() == "0") {
        alert("Please select a style for this type.");
        $('#SID').focus();
        return;
    }	
	 else if ($('#TypeName').val() == "") {
        alert("Please provide a type name.");
        $('#TypeName').focus();
        return;
    }

    $('#addTypeFrm').submit();
}

function delType(TID)
{
	/*$.ajax({
        type: 'GET',
        url: 'chkTypeProducts.php?TID=' + TID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            if (result == "True")
			{
				alert("Type cannot be deleted. \nThis type is connected to one or more products.");
			}
			else
			{*/
				if (confirm("Are you sure you want to delete this type?"))
			    {
			        window.location.href = "delType_action.php?TID=" + TID;
			    }
			/*}
        }
    });   */ 
}
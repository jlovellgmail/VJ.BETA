// JavaScript Document
function validateAddStyle() {
    if ($('#Name').val() == "") {
        alert("Please provide a style name.");
        $('#Name').focus();
        return;
    }

    $('#addStyleFrm').submit();
}

function delStyle(SID)
{
	$.ajax({
        type: 'GET',
        url: 'chkStyleProducts.php?SID=' + SID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            if (result == "True")
			{
				alert("Style cannot be deleted. \nThis style is connected to one or more products.");
			}
			else
			{
				if (confirm("Are you sure you want to delete this style?"))
			    {
			        window.location.href = "delStyle_action.php?SID=" + SID;
			    }
			}
        }
    }); 
}
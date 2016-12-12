// JavaScript Document
function validateAddColor() {
    if ($('#ColorName').val() == "") {
        alert("Please provide a color name.");
        $('#ColorName').focus();
        return;
    }

    $('#addColorFrm').submit();
}

function delColor(CID)
{
	/*$.ajax({
        type: 'GET',
        url: 'chkColorProducts.php?CID=' + CID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            if (result == "True")
			{
				alert("Color cannot be deleted. \nThis color is connected to one or more products.");
			}
			else
			{*/
				if (confirm("Are you sure you want to delete this color?"))
			    {
			        window.location.href = "delColor_action.php?CID=" + CID;
			    }
			/*}
        }
    }); */
}
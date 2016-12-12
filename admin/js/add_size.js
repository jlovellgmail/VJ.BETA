// JavaScript Document
function validateAddSize() {
    if ($('#Size').val() == "") {
        alert("Please provide a size.");
        $('#Size').focus();
        return;
    }

    $('#addSizeFrm').submit();
}

function delSize(SID)
{
	/*$.ajax({
        type: 'GET',
        url: 'chkSizeProducts.php?SID=' + SID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            if (result == "True")
			{
				alert("Size cannot be deleted. \nThis size is connected to one or more products.");
			}
			else
			{*/
				if (confirm("Are you sure you want to delete this size?"))
			    {
			        window.location.href = "delSize_action.php?SID=" + SID;
			    }
			/*}
        }
    }); */
}
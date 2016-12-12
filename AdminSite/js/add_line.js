// JavaScript Document
function validateAddLine() {
    if ($('#Name').val() == "") {
        alert("Please provide a line name.");
        $('#Name').focus();
        return;
    }	
	else if ($('#Tagline').val() == "") {
        alert("Please provide a tagline.");
        $('#Tagline').focus();
        return;
    }

    $('#addLineFrm').submit();
}

function delLine(LID)
{
	$.ajax({
        type: 'GET',
        url: '/chkLinecollections.php?LID=' + LID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            if (result == "True")
			{
				alert("Line cannot be deleted. \nThis line is connected to one or more collections.");
			}
			else
			{
				if (confirm("Are you sure you want to delete this line?"))
			    {
			        window.location.href = "/delLine_action.php?LID=" + LID;
			    }
			}
        }
    });    
}

function delLineImage(LID)
{
	if (confirm("Are you sure you want to delete this image?"))
	{
		$.ajax({
	        type: 'GET',
	        url: '/delLineImg.php?LID=' + LID,
	        data: {},
	        error: function (xhr, status, error) {
	            alert(status);
	            alert(xhr.responseText);
	            $("#ViewBtnDiv").html("VIEW MORE");
	        },
	        success: function (result) {
	            $('#img_ImgUrl').hide();		
	            $('#ImgRemoveDiv').hide();
	        }
	    });
	}
}
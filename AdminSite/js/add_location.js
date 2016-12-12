function validateAddLocation()
{
	if ($('#Location').val() == "") {
        alert("Please provide a location.");
        $('#Location').focus();
        return;
    }
	
	$('#LocationFrm').submit();
}

function delLocation(LocID)
{
	if (confirm("Are you sure you want to delete this Location?"))
	{
		$.ajax({
	        type: 'GET',
	        url: '/delLocation_action.php?LocID=' + LocID,
	        data: {},
	        error: function (xhr, status, error) {
	            alert(status);
	            alert(xhr.responseText);
	        },
	        success: function (result) {
				window.location.href = "/ambassador_locations.php";
	        }
	    });
	}
}